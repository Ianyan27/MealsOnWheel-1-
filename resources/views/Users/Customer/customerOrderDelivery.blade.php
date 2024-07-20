@extends('Users.Customer.layouts.app')

@section('title', 'Order Delivery')

@section('content')
<div class="container mt-5">
    <div class="mb-4 text-center">
        <a href="{{ route('customer#viewListMeals') }}" class="btn btn-primary">Order Meal</a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>No.</th>
                    <th>Caregiver Name</th>
                    <th>Meal Name</th>
                    <th>Order Date</th>
                    <th>Order Time</th>
                    <th>Assigned Rider</th>
                    <th>Delivery Status</th>
                    <th>Confirm Receive</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $orderData->order_id }}</td>
                    <td>{{ $orderData->caregiver->user->name }}</td>
                    <td>{{ $orderData->order_meal_name }}</td>
                    <?php
                    $str = $orderData->created_at;
                    $newstr = explode(' ', $str);
                    $date = $newstr[0];
                    $time = $newstr[1];
                    ?>
                    <td>{{ $date }}</td>
                    <td>{{ $time }}</td>
                    <td>{{ $deliverData->deliver_name }}</td>
                    <td>{{ $deliverData->delivery_status }}</td>
                    <td>
                        <form action="{{ route('customer#updateCustomerOrder', $orderData->order_id) }}" method="GET">
                            <input type="text" name="order_received_status" value="{{ $orderData->order_pickup_time }}" class="form-control-plaintext" readonly />
                            <button type="submit" class="btn btn-primary mt-2">Received?</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
