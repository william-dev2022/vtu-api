<?php

namespace App\Http\Controllers\Api\V1;

use App\Enums\TransactionType;
use App\Http\Controllers\Controller;
use App\Http\Resources\TransactionCollection;
use App\Http\Resources\TransactionResource;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserAccountController extends Controller
{
    //
    public function balance(Request $request)
    {
        try {

            $user = $request->user();
            //get all users deposits
            $balance = $user->balance();


            return response()->json(['balance' => $balance], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }



    public function deposit(Request $request)
    {
        $request->validate([
            'amount' => ['required', 'integer'],
        ]);

        $user = $request->user();

        try {

            // Create a new deposit instance
            $deposit = Transaction::create([
                'user_id' => $user->id,
                'amount' => $request->amount,
                'type' => TransactionType::DEPOSIT->value,
                'description' => 'Deposit',
                'reference' => 'deposit_' . uniqid(),
                'status' => 'completed',
            ]);

            return response()->json([
                'message' => 'Deposit successful.',
                'deposit' => $deposit,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Something went wrong' . $th->getMessage()], 500);
        }
    }

    public function transaction_history(Request $request)
    {
        $limit = request()->query('limit', 2);

        $transactions = Transaction::where('user_id', $request->user()->id)
            ->orderByDesc('created_at')
            ->take($limit)
            ->get();

        $transactions = TransactionResource::collection($transactions);

        return response()->json(
            [
                'transactions' => $transactions,
                'total' => count($transactions)
            ],
            200
        );
    }


    public function set_pin(Request $request)
    {
        $request->validate([
            'pin' => ['required', 'string', 'min:4', 'max:10'],
            'password' => ['required', 'string'],
        ]);

        $user = $request->user();

        // Check if the user exists
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Invalid credentials.',
            ], 401);
        }

        try {
            // Create a new deposit instance
            $user->update([
                'pin' => Hash::make($request->pin),
            ]);

            return response()->json([
                'message' => 'PIN set successfully.',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }
}
