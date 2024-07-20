@section('title')
    View All Deliver
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

            <div class="row text-center mb-4">
                <div class="col-md-8 offset-md-2">
                    <h3>Deliver</h3>
                    <p>All the delivery riders that registered to MerryMeals</p>
                </div>
            </div>

            <div class="row">
                @foreach ($deliverData as $deliver)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-body text-center">
                                <div class="icon mb-3">
                                    <i class="icon-profile-male"></i>
                                </div>
                                <h5 class="card-title">ID: {{$deliver->deliver_id}}</h5>
                                <p class="card-text"><strong>Name:</strong> {{ DB::table('users')->where('id',$deliver->user_id)->value('name')}}</p>
                                <p class="card-text"><strong>Email:</strong> {{ DB::table('users')->where('id',$deliver->user_id)->value('email')}}</p>
                                <p class="card-text"><strong>Phone Number:</strong> {{ DB::table('delivers')->where('user_id',$deliver->user_id)->value('rider_phone_number')}}</p>
                                <p class="card-text"><strong>Vehicle:</strong> {{ DB::table('delivers')->where('user_id',$deliver->user_id)->value('vehicle')}}</p>
                                <p class="card-text"><strong>Company Name:</strong> {{ DB::table('delivers')->where('user_id',$deliver->user_id)->value('company_name')}}</p>
                                <p class="card-text"><strong>Location:</strong> {{ DB::table('delivers')->where('user_id',$deliver->user_id)->value('rider_location')}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
<!-- END What we do -->
@endsection