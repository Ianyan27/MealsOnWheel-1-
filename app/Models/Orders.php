<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $primaryKey = 'order_id';

    protected $fillable = [
        'customer_id',
        'user_id',
        'meal_id',
        'caregiver_id',
        'customer_name',
        'customer_address',
        'customer_phone_number',
        'order_meal_image',
        'order_meal_name',
        'order_pickup_time',
        'order_delivered_time',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }

    public function caregiver()
    {
        return $this->belongsTo(Caregivers::class, 'caregiver_id', 'caregiver_id');
    }

    public function meals()
    {
        return $this->hasMany(Meals::class, 'meal_id', 'meal_id');
    }
}
