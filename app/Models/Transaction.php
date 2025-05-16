<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //

    protected $fillable = [
        'user_id',
        'amount',
        'type',
        'description',
        'reference',
        'status',
        'meta',
    ];
    protected $casts = [
        'user_id' => 'integer',
        'amount' => 'integer',
        'type' => 'string',
        'description' => 'string',
        'reference' => 'string',
        'status' => 'string',
        'meta' => 'array',
    ]; 


    //field to return as array
}
