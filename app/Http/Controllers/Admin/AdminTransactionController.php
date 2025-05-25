<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Enums\TransactionType;
use Illuminate\Http\Request;

class AdminTransactionController extends Controller
{
    //
    public function index()
    {
        // Fetch transactions from the database
        $transactions = Transaction::orderByDesc('created_at')->get();

        // Return the view with transactions data
        return view('admin.transactions.index')->with('transactions', $transactions);
    }
    public function pending_deposit()
    {
        // Fetch transactions from the database
        $transactions = Transaction::where('type', TransactionType::DEPOSIT->value)
            ->orderByDesc('created_at')->get();

        // Return the view with transactions data
        return view('admin.transactions.pending-deposit')->with('transactions', $transactions);
    }
    public function show($id)
    {
        // Fetch a single transaction by ID
        $transaction = Transaction::findOrFail($id);

        // Return the view with the transaction data
        return view('admin.transactions.show')->with('transaction', $transaction);
    }

    public function delete_deposit($id)
    {

        $deposit = Transaction::where('id', $id)->where('type', TransactionType::DEPOSIT->value)->first();

        if (!$deposit) {
            return redirect()->back()->withErrors("!Doesn't Exists");
        }

        $deposit->delete();
        return redirect()->back()->with('success', "Deleted successfully");
    }

    public function update_status(Request $request)
    {
        $transaction = Transaction::find($request->id);
        if ($transaction) {
            $transaction->status = $request->status;
            $transaction->save();
            return response()->json(['message' => 'Transaction updated successfully']);
        }
        return response()->json(['message' => 'Transaction not found'], 404);
    }
}
