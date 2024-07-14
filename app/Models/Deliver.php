<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deliver extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'rider_phone_number',
        'vehicle',
        'company_name',
        'rider_location'
    ];
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
