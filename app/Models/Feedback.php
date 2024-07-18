<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'meal_id',
        'name',
        'feedback'
    ];
    public function customer(){
        return $this->belongsTo(Customer::class, 'caregiver_id', 'caregiver_id');
    }
    public function meals(){
        return $this->belongsTo(Meals::class, 'meal_id', 'meal_id');
    }
}
