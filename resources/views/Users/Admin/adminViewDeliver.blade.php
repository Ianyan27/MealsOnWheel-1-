@section('title')
    View All Deliver
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
                <h3>Deliver</h3>
                <p>All the delivery riders that registered to MerryMeals</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row text-center">
            @foreach ($deliverData as $deliver)
                <div class="col-md-4 col-sm-4">
                    <div class="services animate-box">
                        <span><i class="icon-profile-male"></i></span>
                        <h1> {{$deliver->deliver_id}} </h1>
                        <h3>{{ DB::table('users')->where('id',$deliver->user_id)->value('name')}}</h3>
                        <h3>{{ DB::table('users')->where('id',$deliver->user_id)->value('email')}}</h3>
                        <h3>{{ DB::table('delivers')->where('user_id',$deliver->user_id)->value('rider_phone_number')}}</h3>
                        <h3>{{ DB::table('delivers')->where('user_id',$deliver->user_id)->value('vehicle')}}</h3>
                        <h3>{{ DB::table('delivers')->where('user_id',$deliver->user_id)->value('company_name')}}</h3>
                        <h3>{{ DB::table('delivers')->where('user_id',$deliver->user_id)->value('rider_location')}}</h3>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- END What we do -->
@endsection