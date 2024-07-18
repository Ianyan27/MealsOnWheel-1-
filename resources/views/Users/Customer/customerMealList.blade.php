@section('title')

    List Meals

@endsection

@extends('Users.Customer.layouts.app')

@section('content')

<div class="fh5co-section-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
                <h3 style="margin-top: 50px;">Meals</h3>
            </div>
        </div>
    </div>
    <div class="container">
        @foreach ($mealList as $meal)
        <a href="{{ route('customer#viewMeal', $meal->meal_id) }}">
        <div class="col-md-4" style="padding-top:50px" >
            <div class="fh5co-team text-center animate-box" style="padding: 20px 0;">
                <div class="mini-left-container" >
                    <?php 
                        $caregiver_id = DB::table('meals')->where('meal_id',$meal->meal_id)->value('caregiver_id');           
                        $caregiver_user_id = DB::table('caregivers')->where('caregiver_id',$caregiver_id)->value('user_id');
                    ?>                
                </div>
                <img class="img-thumbnail" src="{{ asset('uploads/meal/' . $meal->meal_image) }}" style="width:300px; height:200px;" alt="meal images">
                <div>
                    <h2 style="margin-bottom: 20px;">{{ $meal->meal_name }}</h2>
                    <p>{{ $meal->meal_description }}</p>
                </div>
            </div>
        </div>
        </a>

        @endforeach
    </div>
</div>

@endsection