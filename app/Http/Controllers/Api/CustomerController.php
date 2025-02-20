<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class CustomerController extends Controller
{
    //login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $customer = Customer::where('email', $request->email)->first();
        if ($customer && Hash::check($request->password, $customer->password)) {
            $token = $customer->createToken('token-name')->plainTextToken;
            return response()->json(['token' => $token]);
        }
        return response()->json(['error' => 'Unauthorized'], 401);
    }
    //logout
    public function logout(Request $request)
    {
        $customer = Auth::user();
        if (!$customer) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out successfully']);
    }
    public function show($id)
    {
    }

    public function customerlist()
    {

        $customers = Customer::select('id', 'first_name','last_name' ,'email', 'phone')
            ->with(['transactions' => function ($query) {
                $query->select('type','amount','customer_id')->latest()->limit(5);
            }])
            ->get();

        return response()->json($customers);
    }
}
