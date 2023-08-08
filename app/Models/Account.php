<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{

    protected $fillable = [
        'deposit_balance',
        'loan_balance',
        'loan_interest_rate',
    ];

    protected $casts = [
        'deposit_balance' => 'double',
        'loan_balance' => 'double',
        'loan_interest_rate' => 'double',
    ];

    // Define timestamps
    public $timestamps = true;

    // Set default attributes
    protected $attributes = [
        'deposit_balance' => 0.0,
        'loan_balance' => 0.0,
        'loan_interest_rate' => 0.0,
    ];
}
