<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
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
    public function show($id)
    {
        // Fetch a single transaction by ID
        $transaction = Transaction::findOrFail($id);

        // Return the view with the transaction data
        return view('admin.transactions.show')->with('transaction', $transaction);
    }
}
