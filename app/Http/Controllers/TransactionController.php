<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function show($customerId)
    {
       
        $customer = Customer::findOrFail($customerId);
        $transactions = Transaction::where('customer_id', $customerId)->get();
    
        return view('transactions', compact('customer', 'transactions'));
        
    }

   
}
