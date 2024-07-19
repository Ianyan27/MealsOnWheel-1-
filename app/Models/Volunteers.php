<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volunteers extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'volunteer_name',
        'email',
        'payment',
        'donation_amount',
        'message',
        'donation_date'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
