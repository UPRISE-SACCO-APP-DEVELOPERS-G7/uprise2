<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';

    protected $fillable = [
        'title',
        'first_name',
        'last_name',
        'address',
        'username',
        'password',
        'phone',
        'email',
        'loan_balance',
        'deposit_balance',
        'type',
    ];

    protected $casts = [
        'loan_balance' => 'double',
        'deposit_balance' => 'double',
        'type' => 'string', // Make sure to adjust this based on the correct data type
    ];

    // Define timestamps
    public $timestamps = true;

    // Define the relationship with Loan model
    public function loans()
    {
        return $this->hasMany(Loan::class, 'member_id', 'id');
    }

    // Define the relationship with Deposit model
    public function deposits()
    {
        return $this->hasMany(Deposit::class, 'member_id', 'id');
    }

    // Define the relationship with Claim model
    public function claims()
    {
        return $this->hasMany(Claim::class, 'member_id', 'id');
    }

    // Define the relationship with Withdraw model
    public function withdraws()
    {
        return $this->hasMany(Withdraw::class, 'member_id', 'id');
    }
}
