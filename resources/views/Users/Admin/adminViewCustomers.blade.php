@section('title')
    View All Customer
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
            @foreach ($customerData as $customer)
                <div class="col-md-4 col-sm-4">
                    <div class="services animate-box">
                        <span><i class="icon-profile-male"></i></span>
                        <h1> {{$customer->customer_id}} </h1>
                        <h3>{{ DB::table('users')->where('id',$customer->user_id)->value('name')}}</h3>
                        <h3>{{ DB::table('users')->where('id',$customer->user_id)->value('email')}}</h3>
                        <h3>{{ DB::table('customers')->where('user_id',$customer->user_id)->value('age')}}</h3>
                        <h3>{{ DB::table('customers')->where('user_id',$customer->user_id)->value('disease')}}</h3>
                        <h3>{{ DB::table('customers')->where('user_id',$customer->user_id)->value('disability')}}</h3>
                        <h3>{{ DB::table('customers')->where('user_id',$customer->user_id)->value('address')}}</h3>
                        <h3>{{ DB::table('customers')->where('user_id',$customer->user_id)->value('phone_number')}}</h3>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection