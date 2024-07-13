<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caregivers extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'working_day'
    ];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
