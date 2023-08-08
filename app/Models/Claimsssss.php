<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    protected $table = 'claims';

    protected $fillable = [
        'description',
        'status',
        'member_id', // Adjust this based on the correct column name in your database
    ];

    // Define timestamps
    public $timestamps = true;

    // Define the relationship with Member model
    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id', 'id');
    }

    // Define the possible claim status values
    public const CLAIM_STATUS_RESOLVED = 'RESOLVED';
    public const CLAIM_STATUS_UNRESOLVED = 'UNRESOLVED';
    public const CLAIM_STATUS_IN_PROGRESS = 'IN_PROGRESS';

    // Define the default claim status value
    protected $attributes = [
        'status' => self::CLAIM_STATUS_UNRESOLVED,
    ];
}
