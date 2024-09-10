@section('title')
    {{$viewMeal->meal_name}} Details
@endsection

@extends('Users.Caregiver.layouts.app')

@section('content')
<div id="fh5co-blog-section" class="py-5 bg-light">
      <div class="row justify-content-center">
        <div class="col-md-8 text-center">
          <h1>{{ $viewMeal->meal_name }}</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="jumbotron">
            <div class="mb-3 text-center">
              @if ($viewMeal->meal_image)
              <img src="{{ asset('uploads/meal/' . $viewMeal->meal_image) }}" class="img-thumbnail" alt="category image">
              @endif
            </div>
            <div class="feature-text">
              <h1>{{ $viewMeal->meal_name }}</h1>
              <p>{{ $viewMeal->meal_description }}</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-2 text-center">
          <a href="{{ route('caregiver#updateMeal', $viewMeal->meal_id) }}" class="btn btn-primary btn-block">Update</a>
        </div>
        <div class="col-md-2 text-center">
          <a href="{{ route('caregiver#deleteMeal', $viewMeal->meal_id) }}" class="btn btn-danger btn-block">Delete</a>
        </div>
      </div>
    </div>
@endsection