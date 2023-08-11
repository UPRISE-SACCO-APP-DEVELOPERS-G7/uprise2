<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loans extends Model
{
    protected $table = 'loans';

    protected $fillable = [
        'interest_rate',
        'amount',
        'payment_period',
        'start_date',
        'end_date',
        'request_status',
        'rejection_reason',
        'member_id',
        'installment_count',
         'installment_amount',
    ];

    protected $casts = [
        'interest_rate' => 'double',
        'amount' => 'double',
        'payment_period' => 'integer',
        'request_status' => 'string', // Make sure to adjust this based on the correct data type
        
    ];

    // Define timestamps
    public $timestamps = true;

    // Define the relationship with Member model
    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id', 'id');
    }

    // Define the relationship with Installment model
    public function installments()
    {
        return $this->hasMany(Installment::class, 'loan_application_number', 'application_number');
    }
}
