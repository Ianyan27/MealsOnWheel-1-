<?php

namespace App\Http\Controllers;

use App\Models\DeliveryRequest;
use App\Models\Orders;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function saveOrder(Request $request)
    {
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

        $deliveryRequest = new DeliveryRequest();
        $deliveryRequest->caregiver_id = $request->input("caregiver_id");
        $deliveryRequest->meal_id = $request->input("meal_id");
        $deliveryRequest->user_id = $request->input("user_id");
        $deliveryRequest->delivery_meal_name = $request->input("order_meal_name");
        $deliveryRequest->start_delivery_time = null;
        $deliveryRequest->delivery_status = 'pending'; // Default status
        $deliveryRequest->caregiver_name = $request->input("caregiver_name");
        $deliveryRequest->deliver_name = $request->input("deliver_name");
        $deliveryRequest->save();


        return redirect()->route('customer#index')->with(['orderCreated' => 'Your Order has been placed Sucessfully!']);
    }

    public function showOrderDelivery($id)
    {
        //show order and delivery status
        $order_data = Orders::where('user_id', $id)->latest('created_at')->first();
        $delivery_data = DeliveryRequest::where('user_id', $id)->latest('created_at')->first();
        return view('Users.Customer.customerOrderDelivery')->with([
            'orderData' => $order_data,
            'deliverData' => $delivery_data,
        ]);
    }
}
