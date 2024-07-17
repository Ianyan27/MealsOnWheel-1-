@section('title')
    View All Meals
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
                <h3>Meals</h3>
                <p>All the Meals that registered to MerryMeals</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row text-center">
            @foreach ($mealData as $meal)
                <div class="col-md-4 col-sm-4">
                    <div class="services animate-box">
                        <span><i class="icon-profile-male"></i></span>
                        <h1> {{$meal->meal_id}} </h1>
                        <h3>{{ DB::table('users')->where('id',$meal->user_id)->value('name')}}</h3>
                        <h3>{{ DB::table('meals')->where('caregiver_id',$meal->caregiver_id)->value('meal_name')}}</h3>
                        <h3>{{ DB::table('meals')->where('caregiver_id',$meal->caregiver_id)->value('meal_description')}}</h3>
                        @if ($meal->meal_image)
                            <img src="{{ asset('uploads/meal/'. $meal->meal_image) }}" class="img-thumbnail" alt="Meal Image">
                            <br>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection