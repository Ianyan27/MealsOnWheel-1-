@section('title')
    View All Meals
@endsection

@extends('Users.Admin.layouts.app')

@section('content')
        @if (Session::has('dataInform'))
          <div class="alert alert-warning" role="alert">
            {{ Session::get('dataInform') }}
          </div>
        @endif
        @if (Session::has('new_meal_added'))
          <div class="alert alert-success" role="alert">
            {{ Session::get('new_meal_added') }}
          </div>
        @endif
        @if (Session::has('meal_deleted'))
          <div class="alert alert-danger" role="alert">
            {{ Session::get('meal_deleted') }}
          </div>
        @endif
        <div class="row text-center" style="margin: 0px auto 1rem auto;">
          <div class="col-md-8 offset-md-2">
            <h3>Meals</h3>
            <p>All the Meals that are registered to MerryMeals</p>
          </div>
        </div>
        <div class="row text-center" style="margin:0;">
          @foreach ($mealData as $meal)
              <div class="col-md-4 col-sm-6 mb-4">
                  <div class="card shadow-sm h-100">
                      <div class="card-body d-flex flex-column">
                          <!-- Display Caregiver's Name -->
                          <h5 class="card-title font-weight-bold">{{ DB::table('users')->where('id', $meal->user_id)->value('name') }}</h5>
      
                          <!-- Display Meal Name -->
                          <h6 class="card-subtitle mb-2 text-muted">{{ DB::table('meals')->where('caregiver_id', $meal->caregiver_id)->value('meal_name') }}</h6>
      
                          <!-- Display Meal Description -->
                          <p class="card-text mb-3">{{ DB::table('meals')->where('caregiver_id', $meal->caregiver_id)->value('meal_description') }}</p>
      
                          <!-- Display Meal Image if exists -->
                          @if ($meal->meal_image)
                              <img src="{{ asset('uploads/meal/' . $meal->meal_image) }}" 
                                  class="img-fluid rounded mb-3" 
                                  style="max-height: 375px; object-fit: cover;" 
                                  alt="Meal Image">
                          @endif
      
                          <!-- Buttons (Visible only for admin) -->
                          @if (Auth::user()->role == 'admin')
                              <div class="mt-auto">
                                  <a href="{{ route('admin#updateMeal', $meal->meal_id) }}" class="btn btn-sm btn-primary">Update Meal</a>
                                  <a href="{{ route('admin#deleteMeal', $meal->meal_id) }}" class="btn btn-sm btn-danger">Delete Meal</a>
                              </div>
                          @endif
                      </div>
                  </div>
              </div>
          @endforeach
      </div>
      
@endsection