<?php

namespace App\Http\Controllers\Api\V1;

use App\Enums\TransactionType;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Http\Resources\TransactionResource;
use App\Models\DataPlan;
use App\Services\ApiRequestService;
use App\Services\PaystackApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserTransactionController extends Controller
{

    public function __construct(protected ApiRequestService $apiRequestService, protected PaystackApiService $paystackApiService)
    {
        $this->apiRequestService = $apiRequestService;
        $this->paystackApiService = $paystackApiService;
    }




    public function  buy_data(Request $request)
    {
        $request->validate([
            'plan_id' => ['required', 'max:20', 'exists:data_plans,id'],
            'phone_number' => ['required', 'string', 'max:15'],
            'network' => ['string', 'max:15'],
            'pin' => ['required', 'string', 'min:4'],
        ]);


        if (!Hash::check($request->pin, $request->user()->pin)) {
            return response()->json([
                'message' => 'Invalid PIN.',
            ], 400);
        }

        if (!in_array($request->network, ['mtn', 'glo', 'airtel', '9mobile'])) {
            return response()->json([
                'message' => 'Invalid network.',
            ], 400);
        }

        //get the plan from the database
        $plan = DataPlan::find($request->plan_id);

        if (!$plan) {
            return response()->json([
                'message' => 'Invalid plan.',
            ], 400);
        }

        //check if the plan is active
        if ($plan->status != 'active') {
            return response()->json([
                'message' => 'Plan is not active.',
            ], 400);
        }

        //check if the plan is for the selected network
        if ($plan->network != $request->network) {
            return response()->json([
                'message' => 'Plan is not for the selected network.',
            ], 400);
        }


        //check if user has enough balance
        if ($request->user()->balance() < $plan->price) {
            return response()->json([
                'message' => 'Insufficient balance.',
            ], 400);
        }


        $categoryId =  $plan->subcategory_id;

        $response =   $this->apiRequestService->post('purchase/data', [
            'plan_id' => $plan->plan_id,
            'phonenumber' => $request->phone_number,
            'subcategory_id' => $categoryId,
        ]);

        if ($response['success'] == false) {
            if (isset($response['message']) && $response['message'] == 'Insufficient Balance for this transaction') {
                return response()->json([
                    'message' => 'Service not available at the moment.',
                ], 400);
            }
            return response()->json([
                'message' => $response['message'] ?? 'Failed to purchase airtime.',
                'custom' => 'Here is a custom message',
            ], 500);
        }


        if ($response->ok() && isset($response['success']) &&  $response['success'] == true) {
            $dataPrice = $plan->price;
            $transaction = Transaction::create([
                'user_id' => $request->user()->id,
                'amount' => $dataPrice,
                'type' => TransactionType::BUYDATA->value,
                'description' => 'Data purchase',
                'reference' => $response['transaction_reference'],
                'status' => 'completed',
                'meta' => [
                    'plan_id' => $request->plan_id,
                    'phone_number' => $request->phone_number,
                    'amount' => $dataPrice,
                    'network' => $request->network ? $request->network : 'mtn',
                    'plan_name' => $plan->title,
                    'response' => $response['data'],
                ],
            ]);

            return response()->json([
                'message' => 'User authenticated successfully.',
                'transaction' =>  new TransactionResource($transaction->fresh()),

            ], 200);
        } else {
            return response()->json([
                'message' => $response['message'] ?? 'Failed to purchase data.',
                'custom' => 'Here is a custom message',
            ], 500);
        }
    }


    public function buy_airtime(Request $request)
    {
        $request->validate([
            'amount' => ['required', 'integer'],
            'phone_number' => ['required', 'string', 'max:15'],
            'network' => ['required', 'string', 'max:15'],
            'pin' => ['required', 'string', 'min:4', 'max:10'],
        ]);


        if (!Hash::check($request->pin, $request->user()->pin)) {
            return response()->json([
                'message' => 'Invalid PIN.',
            ], 400);
        }

        if (!in_array($request->network, ['mtn', 'glo', 'airtel', '9mobile'])) {
            return response()->json([
                'message' => 'Invalid network.',
            ], 400);
        }
        //apply 2% discount on the amount
        $discount = 0.02 * $request->amount;
        $airtimePrice = $request->amount - $discount;



        //check if user has enough balance
        if ($request->user()->balance() < $airtimePrice) {
            return response()->json([
                'message' => 'Insufficient balance.',
            ], 400);
        }

        $categoryId =  $request->network == 'mtn' ? 8 : ($request->network == 'glo' ? 10 : ($request->network == 'airtel' ? 9 : 4));

        $response =   $this->apiRequestService->post('purchase/airtime', [
            'amount' => $request->amount,
            'phonenumber' => $request->phone_number,
            'subcategory_id' => $categoryId,
        ]);

        if ($response['success'] == false) {
            if (isset($response['message']) && $response['message'] == 'Insufficient Balance for this transaction') {
                return response()->json([
                    'message' => 'Service not available at the moment.',
                ], 400);
            }
            return response()->json([
                'message' => $response['message'] ?? 'Failed to purchase airtime.',
                'custom' => 'Here is a custom message',
            ], 500);
        }


        // {
        //     "success": true,
        //     "transaction_reference": "e0069e0b31",
        //     "custom_reference": null,
        //     "amount": 96.5,
        //     "data": "MTN Purchase successful",
        //     "message": "MTN Purchase successful"
        // }
        if ($response->ok() && isset($response['success']) &&  $response['success'] == true) {

            $transaction = Transaction::create([
                'user_id' => $request->user()->id,
                'amount' => $airtimePrice,
                'type' => TransactionType::BUYAIRTIME->value,
                'description' => 'Airtime purchase',
                'reference' => $response['transaction_reference'],
                'status' => 'completed',
                'meta' => [
                    'phone_number' => $request->phone_number,
                    'amount' => $airtimePrice,
                    'network' =>  $request->network ? $request->network : 'mtn',
                    'response' => $response['data'],
                ],
            ]);
        }

        //log to consoole
        Log::info('Airtime purchase response', [
            'response' => $response,
            'transaction' => $transaction,
        ]);

        return response()->json([
            'message' => $response['message'] ?? 'Airtime purchased successfully.',
            'transaction' =>  new TransactionResource($transaction->fresh()),
        ], 200);
    }
}
