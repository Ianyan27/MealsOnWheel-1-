<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'role',
        'name',
        'email',
        'password',
        "age",
        'disease',
        'disability',
        'address'
    ];
}
