@section('title')
    Welcome
@endsection

@extends('Users.Caregiver.layouts.app')

@section('content')

@if (Session::has('mealAdded'))
    <div class="alert alert-warning animate-box" role="alert">
        {{ Session::get('mealAdded') }}
    </div>
@endif
@if (Session::has('mealDeleted'))
	<div class="alert alert-warning animate-box" role="alert">
		{{ Session::get('mealDeleted') }}
    </div>
@endif
    <h1>Caregiver Index</h1>
    <div class="container">
        @foreach ($mealData as $meal)
        <a href="{{ route('caregiver#viewMeal', $meal->meal_id) }}"></a>
        <img src="{{ asset('uploads/meal/' . $meal->meal_image) }}" alt="meal images" width="250">
        <div>
            <h3> {{$meal->meal_name}} </h3>
            <p> {{$meal->meal_description}} </p>
            @if ( Auth::user() -> role =='caregiver')
                <p><a href=" {{ route('caregiver#updateMeal', $meal->meal_id)}} ">Update Meal</a></p>
                <p><a href=" {{ route('caregiver#deleteMeal', $meal->meal_id)}} ">Delete Meal</a></p>
            @endif
        </div>
        @endforeach
    </div>
@endsection