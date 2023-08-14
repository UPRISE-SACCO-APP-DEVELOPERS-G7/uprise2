<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    protected $table = 'claims_table';

    protected $fillable = [
        'description',
        'status',
        'member_id',

    ];
    use HasFactory;
}
