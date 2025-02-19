<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    // credit
    public function credit(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0',
        ]);

        $customer = Auth::user();

        if (!$customer) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $transaction = Transaction::create([
            'customer_id' => $customer->id,
            'type' => 'credit',
            'amount' => $request->amount,
            'ip_address' => $request->ip(),
        ]);

        $customer->balance += $request->amount;
        $customer->save();

        return response()->json([
            'transaction' => $transaction,
            'balance' => $customer->balance
        ], 201);
    }

    //debit
    public function debit(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0',
        ]);
        $customer = Auth::user();

        if (!$customer) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        if ($customer->balance < $request->amount) {
            return response()->json(['error' => 'Insufficient balance.'], 403);
        }

        $todayTransactions = Transaction::where('customer_id', $customer->id)
            ->whereDate('created_at', today())
            ->where('type', 'debit')
            ->count();

        if ($todayTransactions >= 5) {
            return response()->json(['error' => 'Transaction limit reached for today.'], 403);
        }

        $transaction = Transaction::create([
            'customer_id' => $customer->id,
            'type' => 'debit',
            'amount' => $request->amount,
            'ip_address' => $request->ip(),
        ]);

        $customer->balance -= $request->amount;
        $customer->save();

        return response()->json([
            'transaction' => $transaction,
            'balance' => $customer->balance
        ], 201);
    }
}
