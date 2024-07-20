@section('title')
    View All Orders
@endsection

@extends('Users.Admin.layouts.app')

@section('content')
		
<div id="fh5co-services-section" class="py-5">
    <div class="container">
        @if (Session::has('dataInform'))
            <div class="alert alert-warning text-center" role="alert">
                {{ Session::get('dataInform') }}
            </div>
        @endif

        <div class="row mb-4">
            <div class="col-md-8 offset-md-2 text-center">
                <h3>Customer Orders</h3>
                <p>All the orders placed by customers at MerryMeals</p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            @foreach ($orderData as $order)
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <div class="icon mb-3">
                                <i class="icon-profile-male"></i>
                            </div>
                            <h5 class="card-title">Order ID: {{$order->order_id}}</h5>
                            <p class="card-text"><strong>Name:</strong> {{ DB::table('orders')->where('user_id',$order->user_id)->value('customer_name')}}</p>
                            <p class="card-text"><strong>Address:</strong> {{ DB::table('orders')->where('user_id',$order->user_id)->value('customer_address')}}</p>
                            <p class="card-text"><strong>Phone Number:</strong> {{ DB::table('orders')->where('user_id',$order->user_id)->value('customer_phone_number')}}</p>
                            <p class="card-text"><strong>Meal:</strong> {{ DB::table('orders')->where('user_id',$order->user_id)->value('order_meal_name')}}</p>
                            <p class="card-text"><strong>Pickup Time:</strong> {{ DB::table('orders')->where('user_id',$order->user_id)->value('order_pickup_time')}}</p>
                            <p class="card-text"><strong>Delivered Time:</strong> {{ DB::table('orders')->where('user_id',$order->user_id)->value('order_delivered_time')}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>


<!-- END What we do -->
@endsection