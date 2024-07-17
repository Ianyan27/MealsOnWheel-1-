@section('title')
    View All Orders
@endsection

@extends('Users.Admin.layouts.app')

@section('content')
		
<div id="fh5co-services-section">
    <div class="container">
        @if (Session::has('dataInform'))
        <h4 class="alert alert-warning animate-box" role="alert">
            {{ Session::get('dataInform') }}
        </h4>
    @endif
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
                <h3>Customer</h3>
                <p>All the customers that registered to MerryMeals</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row text-center">
            @foreach ($orderData as $order)
                <div class="col-md-4 col-sm-4">
                    <div class="services animate-box">
                        <span><i class="icon-profile-male"></i></span>
                        <h1> {{$order->order_id}} </h1>
                        <h3>{{ DB::table('orders')->where('user_id',$order->user_id)->value('customer_name')}}</h3>
                        <h3>{{ DB::table('orders')->where('user_id',$order->user_id)->value('customer_address')}}</h3>
                        <h3>{{ DB::table('orders')->where('user_id',$order->user_id)->value('customer_phone_number')}}</h3>
                        <h3>{{ DB::table('orders')->where('user_id',$order->user_id)->value('order_meal_name')}}</h3>
                        <h3>{{ DB::table('orders')->where('user_id',$order->user_id)->value('order_pickup_time')}}</h3>
                        <h3>{{ DB::table('orders')->where('user_id',$order->user_id)->value('order_delivered_time')}}</h3>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- END What we do -->
@endsection