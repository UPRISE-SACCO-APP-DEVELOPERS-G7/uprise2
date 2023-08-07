<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Installment extends Model
{
    protected $table = 'installments';

    protected $fillable = [
        'amount',
        'due_date',
        'date_paid',
        'payment_status',
        'loan_application_number', // Adjust this based on the correct column name in your database
    ];

    // Define timestamps
    public $timestamps = true;

    // Define the relationship with Loan model
    public function loan()
    {
        return $this->belongsTo(Loan::class, 'loan_application_number', 'application_number');
    }

    // Define the possible payment status values
    public const PAYMENT_STATUS_CLEARED = 'CLEARED';
    public const PAYMENT_STATUS_NOT_CLEARED = 'NOT_CLEARED';
    public const PAYMENT_STATUS_OVERDUE = 'OVERDUE';

    // Define the default payment status value
    protected $attributes = [
        'payment_status' => self::PAYMENT_STATUS_NOT_CLEARED,
    ];
}
