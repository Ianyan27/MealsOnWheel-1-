<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function saveOrder(Request $request){
        $orders = new Orders();
        $orders->customer_name = $request->input("customer_name");
        $orders->customer_address = $request->input("customer_address");
        $orders->customer_phone_number = $request->input("customer_phone_number");
        $orders->order_meal_image = $request->input("order_meal_image");
        $orders->order_meal_name = $request->input("order_meal_name");
        $orders->customer_id = $request->input("customer_id");
        $orders->user_id = $request->input("user_id");
        $orders->meal_id = $request->input("meal_id");
        $orders->caregiver_id = $request->input("caregiver_id");
        $orders->save();
        return redirect()->route('customer#index')->with(['orderCreated' => 'Your Order has been placed Sucessfully!']);
    }
}
