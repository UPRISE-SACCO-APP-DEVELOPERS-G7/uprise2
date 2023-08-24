<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $table = 'loans';

    protected $fillable = [
        'principal_amount',
        'payable_amount',
        'payment_period',
        'outstanding_balance',
        'interest_rate',
        'start_date',
        'end_date',
        'payment_status',
        'request_status',
        'rejection_reason',
        'member_id',
    ];

    protected $casts = [
        'principal_amount' => 'double',
        'payable_amount' => 'double',
        'payment_period' => 'integer',
        'outstanding_balance' => 'double',
        'interest_rate' => 'double',
        'payment_status' => 'string',
        'request_status' => 'string',
    ];

    // Define timestamps
    public $timestamps = false; // Disable automatic timestamps

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

    // These are the possible values of the loan processing status
    public static $RequestStatus = [
        'PENDING',
        'SHORTLISTED',
        'APPROVED',
        'ACCEPTED',
        'REJECTED',
    ];

    // These are the possible values of the payment status
    public static $PaymentStatus = [
        'CLEARED',
        'IN_PROGRESS',
        'DELINQUENT',
        'DEFAULTED',
    ];
}
