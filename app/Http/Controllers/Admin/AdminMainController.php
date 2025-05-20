<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class AdminMainController extends Controller
{
    //
    public function index()
    {
        $transactions = Transaction::orderByDesc('created_at')->
        take(10)->get();
        return view('admin.index')->with('transactions', $transactions);
    }
}
