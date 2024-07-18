<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meals extends Model
{
    use HasFactory;
    protected $fillable = [
        'caregiver_id',
        'meal_name',
        'meal_description',
        'meal_image',
        'meal_type',
        'day'
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
