<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\Request;

class AppController extends Controller
{
    function index(){
        $transactionCount = Transaction::count();
        $accountCount = Account::count();
        return view('index',compact('accountCount','transactionCount'));
    }
}
