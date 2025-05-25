<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Transaction;
use App\Enums\TransactionType;
use Illuminate\Http\Request;

class AdminMainController extends Controller
{
    //
    public function index()
    {
        $transactions = Transaction::orderByDesc('created_at')->take(10)->get();

        $totalDeposits = Transaction::where('type', TransactionType::DEPOSIT->value)
            ->where('status', 'completed')->sum('amount');


        $totalDataPurchase = Transaction::where('type', TransactionType::BUYDATA->value)->sum('amount');
        $totalAirtime = Transaction::where('type', TransactionType::BUYAIRTIME->value)->sum('amount');
        $totalUsers = User::where('is_verified', true)->count();

        $totalTransactions = Transaction::count();
        $totalTransactionsAmount = Transaction::where('type', '!=', TransactionType::DEPOSIT->value)->where('status', 'completed')->sum('amount');
        $totalPendingDeposits = Transaction::where('type', 'deposit')->where('status', 'pending')->count();
        $totalCompletedDeposits = Transaction::where('type', 'deposit')->where('status', 'completed')->count();

        $transactions = Transaction::orderByDesc('created_at')->take(10)->get();
        return view('admin.index')->with([
            'totalDeposits' => $totalDeposits,
            'totalDataPurchase' => $totalDataPurchase,
            'totalAirtime' => $totalAirtime,
            'totalUsers' => $totalUsers,
            'totalTransactions' => $totalTransactions,
            'totalPendingDeposits' => $totalPendingDeposits,
            'totalCompletedDeposits' => $totalCompletedDeposits,
            'transactions' => $transactions,
            'totalTransactionsAmount' => $totalTransactionsAmount,
        ]);
    }
}
