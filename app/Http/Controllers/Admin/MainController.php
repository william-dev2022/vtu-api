<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //

    public function index()
    {
        $transactions = Transaction::take(10)->get();
        return view('admin.index')->with('transactions', $transactions);
    }
}
