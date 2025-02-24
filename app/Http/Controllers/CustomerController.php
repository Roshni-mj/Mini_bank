<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CustomersImport;
class CustomerController extends Controller
{

    public function index()
    {
        // $customers = Customer::all();
        $customers = Customer::withCount('transactions')->get();
        return view('customers', compact('customers'));
    }

    public function importfile()
    {
       
        return view('import');
    }


    public function dashboard()
    {
        $customerCount = Customer::count();
        $totalBalance = Customer::sum('balance');
        return view('index', compact('customerCount', 'totalBalance'));

    }

    public function create()
    {
        return view('add-customer');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers',
            'phone' => 'required|string|min:10|max:10',
            'password' => 'required|string|min:8',
        ]);
        $customerData = $request->all();
        $customerData['password'] = Hash::make($request->password);
        $customer = Customer::create($customerData);
        return redirect()->route('customers.index')->with('success', 'Customer created successfully!');
    }
    public function show($id)
    {
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv,xls|max:2048',
        ]);

        Excel::import(new CustomersImport, $request->file('file'));

        return back()->with('success', 'Customers imported successfully!');
    }
}
