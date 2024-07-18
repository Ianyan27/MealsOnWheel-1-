<?php

namespace App\Models;

use App\Models\Caregivers;
use App\Models\Customer;
use App\Models\Meals;
use App\Models\Volunteers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryRequest extends Model
{
    use HasFactory;

    protected $table = 'delivery';

    protected $fillable = [
        'caregiver_id',
        'meal_id',
        'user_id',
        'deliver_id',
        'member_name',
        'member_address',
        'delivery_menu_name',
        'delivery_menu_type',
        'deliver_name',
        'start_delivery_time',
        'delivery_status',
    ];

    public function caregiver()
    {
        return $this->belongsTo(Caregivers::class, 'caregiver_id', 'id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'user_id', 'id');
    }

    public function meals()
    {
        return $this->belongsTo(Meals::class, 'meal_id', 'id');
    }

    public function volunteers()
    {
        return $this->belongsTo(Volunteers::class, 'volunteer_id', 'id');
    }
}
