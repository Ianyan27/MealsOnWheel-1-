@section('title')
    View All Caregivers
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
                <h3>Caregivers</h3>
                <p>All the Caregivers that registered to MerryMeals</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row text-center">
            @foreach ($caregiverData as $caregiver)
                <div class="col-md-4 col-sm-4">
                    <div class="services animate-box">
                        <span><i class="icon-profile-male"></i></span>
                        <h1> {{$caregiver->caregiver_id}} </h1>
                        <h3>{{ DB::table('users')->where('id',$caregiver->user_id)->value('name')}}</h3>
                        <h3>{{ DB::table('users')->where('id',$caregiver->user_id)->value('email')}}</h3>
                        <h3>{{ DB::table('caregivers')->where('user_id',$caregiver->user_id)->value('working_day')}}</h3>
                        <h3>{{ DB::table('meals')->where('caregiver_id',$caregiver->caregiver_id)->value('meal_id')}}</h3>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection