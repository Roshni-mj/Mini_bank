<?php
namespace App\Imports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Hash ;
class CustomersImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Customer([
            'first_name' => $row['first_name'],
            'last_name'  => $row['last_name'],
            'email'      => $row['email'],
            'phone'      => $row['phone'],
            'password'   => Hash::make($row['password']),
            'balance'    => $row['balance'] ?? 0.00, 
            'created_at' => now(),
            'updated_at' => now(),

        ]);
    }
}
