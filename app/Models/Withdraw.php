<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    protected $table = 'withdraws';

    protected $fillable = [
        'amount',
        'member_id', // Adjust this based on the correct column name in your database
    ];

    // Define timestamps
    public $timestamps = true;

    // Define the relationship with Member model
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
