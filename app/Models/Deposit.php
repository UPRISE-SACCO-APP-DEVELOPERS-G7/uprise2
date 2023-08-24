<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    protected $table = 'deposits';

    protected $fillable = [
        'amount',
        'member_id',
        'receipt_number',
    ];

    protected $casts = [
        'amount' => 'double',
    ];

    // Define timestamps
    public $timestamps = true;

    // Define the relationship with Member model
    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id', 'id');
    }
}
