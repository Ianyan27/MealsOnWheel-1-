@section('title')

{{$updateMeal->meal_name}} Update

@endsection

@extends('Users.Admin.layouts.app')

@section('content')
<div id="fh5co-blog-section" class="py-5 bg-light">
    <div class="row">
      <div class="col-md-8 offset-md-2 text-center mb-4">
        <h1>Update {{ $updateMeal->meal_name }}</h1>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <form action="{{ route('admin#updatedMeal', $updateMeal->meal_id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="col-lg-6 mb-4">
            @if ($updateMeal->meal_image)
              <img width="550" height="550" src="{{ asset('uploads/meal/'. $updateMeal->meal_image) }}" class="img-thumbnail mb-3" alt="Meal Image">
            @endif
            <div class="form-group">
              <label for="meal_image">Meal Image</label>
              <input type="file" class="form-control-file" id="meal_image" name="meal_image" value="{{ old('meal_image', $updateMeal->meal_image) }}" required>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <label for="meal_name">Meal Name</label>
              <input type="text" class="form-control" id="meal_name" placeholder="Meal Name" name="meal_name" value="{{ old('meal_name', $updateMeal->meal_name) }}" required>
            </div>
            <div class="form-group">
              <label for="meal_description">Meal Description</label>
              <textarea class="form-control" id="meal_description" cols="30" rows="7" placeholder="Meal Description" name="meal_description" required>{{ old('meal_description', $updateMeal->meal_description) }}</textarea>
            </div>
            <input type="hidden" name="caregiver_id" value="{{ $updateMeal->caregiver_id }}" required>
            <div class="form-group mt-4">
              <input type="submit" value="Update" class="btn btn-primary">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>  
@endsection