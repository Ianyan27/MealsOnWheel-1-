@section('title')
    Welcome
@endsection

@extends('Users.Caregiver.layouts.app')

<head>
    <style>
        .meal-image{
            width: 100%;
            height: auto;
            object-fit: cover;
        }
    </style>
</head>

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
<div class="container">
    <div class="row">
      @foreach ($mealData as $meal)
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <a href="{{ route('caregiver#viewMeal', $meal->meal_id) }}">
            <img class="card-img-top meal-image" src="{{ asset('uploads/meal/' . $meal->meal_image) }}" alt="meal images" width="250">
          </a>
          <div class="card-body">
            <h3 class="card-title">{{ $meal->meal_name }}</h3>
            <p class="card-text">{{ $meal->meal_description }}</p>
            @if (Auth::user()->role == 'caregiver')
            <p><a href="{{ route('caregiver#updateMeal', $meal->meal_id) }}" class="btn btn-primary">Update Meal</a></p>
            <p><a href="{{ route('caregiver#deleteMeal', $meal->meal_id) }}" class="btn btn-danger">Delete Meal</a></p>
            @endif
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>  
@endsection