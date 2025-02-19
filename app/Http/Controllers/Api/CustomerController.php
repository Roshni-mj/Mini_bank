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
            // Create a new token for the customer
            $token = $customer->createToken('token-name')->plainTextToken;

            // Return the token in the response
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
}
