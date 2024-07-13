<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volunteers extends Model
{
    use HasFactory;
    protected $fillable = [
        'volunteer_name',
        'email',
        'payment',
        'donation_amount',
        'message'
    ];
}
