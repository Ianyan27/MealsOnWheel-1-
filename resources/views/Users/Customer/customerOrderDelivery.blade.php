@section('title')
    Order Delivery
@endsection

@extends('Users.Customer.layouts.app')

@section('content')

    <body>
        <div class="row container">
            <div class="mb-5 col-md-12">
                <a href="{{ route('customer#viewListMeals') }}" class="btn btn-primary">Order Meal</a>
            </div>
            <table class="table table-responsive table-hover">
                <thead>
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
                                <input type="text" name="order_received_status" value="{{ $orderData->order_pickup_time }}"
                                    readonly />
                                <button type="submit" class="btn btn-primary">Received?</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
@endsection
