@section('title')
    View All Meals
@endsection

@extends('Users.Admin.layouts.app')

@section('content')
    <div class="container py-5">
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
        <div class="row text-center mb-4">
          <div class="col-md-8 offset-md-2">
            <h3>Meals</h3>
            <p>All the Meals that are registered to MerryMeals</p>
          </div>
        </div>
        <div class="row text-center">
          @foreach ($mealData as $meal)
            <div class="col-md-4 col-sm-6 mb-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">{{ DB::table('users')->where('id', $meal->user_id)->value('name') }}</h5>
                  <h6 class="card-subtitle mb-2 text-muted">{{ DB::table('meals')->where('caregiver_id', $meal->caregiver_id)->value('meal_name') }}</h6>
                  <p class="card-text">{{ DB::table('meals')->where('caregiver_id', $meal->caregiver_id)->value('meal_description') }}</p>
                  @if ($meal->meal_image)
                    <img src="{{ asset('uploads/meal/'. $meal->meal_image) }}" class="img-thumbnail mb-3" alt="Meal Image">
                  @endif
                  @if (Auth::user()->role == 'admin')
                    <a href="{{ route('admin#updateMeal', $meal->meal_id) }}" class="btn btn-primary btn-sm">Update Meal</a>
                    <a href="{{ route('admin#deleteMeal', $meal->meal_id) }}" class="btn btn-danger btn-sm">Delete Meal</a>
                  @endif
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
@endsection