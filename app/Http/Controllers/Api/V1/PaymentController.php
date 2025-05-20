<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\PaystackApiService;
use Illuminate\Http\Request;
use App\Enums\TransactionType;
use App\Models\Transaction;
use App\Http\Resources\TransactionResource;

class PaymentController extends Controller
{
    public function __construct(protected PaystackApiService $paystackApiService)
    {
        $this->paystackApiService = $paystackApiService;
    }


    public function verify_payment(Request $request)
    {
        $request->validate([
            'reference' => ['required', 'string', 'max:50'],
        ]);

        $reference = $request->reference;

        try {
            $response = $this->paystackApiService->get('transaction/verify/' . $reference);


            if ($response->successful()) {
                // Check if the payment was successful
                $data = $response['data'] ?? null;

                if ($data && $data['status'] === 'success') {


                    $metadata = $data['metadata']['custom_fields'][0] ?? null;

                    if ($request->user()->id != $metadata['id']) {
                        return response()->json([
                            'status' => false,
                            'message' => 'Unauthorized user',
                        ], 401);
                    }

                    $reference = $data['reference'] ?? null;

                    $transaction =  Transaction::where('user_id', $request->user()->id)
                        ->where('type', TransactionType::DEPOSIT->value)
                        ->where('reference', $reference)
                        ->first();



                    if (!$transaction) {
                        $amount = $data['amount'] / 100 ?? null;
                        $channel = $data['channel'] ?? null;
                        $id = $data['id'] ?? null;

                        $user_id = $metadata['id'] ?? null;
                        $phone_number = $metadata['phone_number'] ?? null;

                        if (!$phone_number  || !$user_id || !$reference) {
                            return response()->json([
                                'status' => false,
                                'message' => 'Invalid metadata',
                            ], 400);
                        }
                        $transaction = Transaction::create([
                            'user_id' => $request->user()->id,
                            'amount' => $amount,
                            'type' => TransactionType::DEPOSIT->value,
                            'description' => 'Deposit',
                            'reference' => $reference,
                            'status' => 'completed',
                            'meta' => [
                                'channel' => $channel,
                                'id' => $id,
                                'reference' => $reference
                            ],
                        ]);
                    }

                    return response()->json([
                        'status' => true,
                        'message' => 'Payment successful',
                        'data' => new TransactionResource($transaction->fresh())
                    ]);
                } else {
                    // Payment failed
                    return response()->json([
                        'status' => false,
                        'message' => 'Payment failed',
                    ], 400);
                }
            }
            if ($response->failed()) {
                // Handle the error response
                return response()->json([
                    'status' => false,
                    'message' => 'Failed to verify payment',
                ], 500);
            }
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Something went wrong' . $th], 500);
        }
    }


    public function manual_payment(Request $request)
    {
        $request->validate([
            'bank_name' => ['required', 'string'],
            'account_number' => ['required', 'string'],
            'account_name' => ['required', 'string'],
            'amount' => ['required', 'integer'],
            'payment_type' => ['required', 'string', 'max:25'],
        ]);

        $user = $request->user();

        try {
            $reference = 'manual_' . uniqid();
            // Create a new deposit instance
            $deposit = Transaction::create([
                'user_id' => $user->id,
                'amount' => $request->amount,
                'type' => TransactionType::DEPOSIT->value,
                'description' => 'Deposit',
                'reference' => $reference,
                'status' => 'pending',
                'meta' => [
                    'reference' => $reference,
                    'bank_name' => $request->bank_name,
                    'account_number' => $request->account_number,
                    'account_name' => $request->account_name,
                    'channel' => $request->payment_type,
                ],
            ]);

            return response()->json([
                'status' => true,
                'data' => new TransactionResource($deposit),
            ], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }
}
