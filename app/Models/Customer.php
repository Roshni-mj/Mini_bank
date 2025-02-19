<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens; // Import the HasApiTokens trait
use Illuminate\Notifications\Notifiable;

class Customer extends Model
{
    use HasFactory, HasApiTokens, Notifiable;
    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'balance','password'];
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
