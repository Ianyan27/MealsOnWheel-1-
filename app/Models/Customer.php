<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'name',
        'age',
        'disease',
        'disability',
        'address',
        'phone_number'
    ];
    public function user(){
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }
}
