<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['customer_id', 'type', 'amount', 'ip_address'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
