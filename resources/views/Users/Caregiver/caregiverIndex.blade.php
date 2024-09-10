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
<div class="row">
  @foreach ($mealData as $meal)
      <div class="col-md-4 mb-4">
          <div class="card h-100 shadow-sm">
              <!-- Meal Image with Overlay Hover Effect -->
              <div class="position-relative">
                  <a href="{{ route('caregiver#viewMeal', $meal->meal_id) }}">
                      <img class="card-img-top meal-image img-fluid" 
                          src="{{ asset('uploads/meal/' . $meal->meal_image) }}" 
                          alt="meal images" style="height: 250px; object-fit: cover;">
                  </a>
                  <!-- Optional overlay on hover for CTA (View Meal) -->
                  <div class="overlay d-flex align-items-center justify-content-center">
                      <a href="{{ route('caregiver#viewMeal', $meal->meal_id) }}" 
                        class="btn btn-light btn-sm">View Meal</a>
                  </div>
              </div>

              <!-- Card Body with Information -->
              <div class="card-body d-flex flex-column">
                  <h3 class="card-title font-weight-bold">{{ $meal->meal_name }}</h3>
                  <p class="card-text text-muted">{{ Str::limit($meal->meal_description, 100) }}</p>

                  <!-- Caregiver-only Action Buttons -->
                  @if (Auth::user()->role == 'caregiver')
                      <div class="mt-auto">
                          <a href="{{ route('caregiver#updateMeal', $meal->meal_id) }}" class="btn btn-primary btn-sm">Update Meal</a>
                          <a href="{{ route('caregiver#deleteMeal', $meal->meal_id) }}" class="btn btn-danger btn-sm">Delete Meal</a>
                      </div>
                  @endif
              </div>
          </div>
      </div>
  @endforeach
</div>
@endsection