@section('title')
    {{$updateMeal->meal_name}} Details
@endsection

@extends('Users.Caregiver.layouts.app')

@section('content')
<div id="fh5co-blog-section" class="py-5 bg-light">
      <div class="row justify-content-center">
        <div class="col-md-8 text-center">
          <h1>Update {{ $updateMeal->meal_name }}</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-4">
          @if ($updateMeal->meal_image)
          <img src="{{ asset('uploads/meal/' . $updateMeal->meal_image) }}" class="img-thumbnail" alt="menu image">
          @endif
        </div>
            <div class="col-md-6">
                <form action="{{ route('caregiver#saveUpdate', $updateMeal->meal_id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="meal_name">Menu Name</label>
                      <input type="text" class="form-control" id="meal_name" name="meal_name" placeholder="Put your menu title here" value="{{ old('meal_name', $updateMeal->meal_name) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="meal_description">Meal Description</label>
                        <textarea class="form-control" id="meal_description" name="meal_description" cols="30" rows="7" placeholder="Put your meal description here" required>{{ old('meal_description', $updateMeal->meal_description) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="meal_image">Meal Picture</label>
                        <input type="file" class="form-control-file" id="meal_image" name="meal_image">
                    </div>
                    <input type="hidden" name="caregiver_id" value="{{ $caregiverData->caregiver_id }}" required>
                    <div class="form-group">
                        <input type="submit" value="Update" class="btn btn-primary">
                    </div>
                </form>   
            </div>
        </div>
</div>
@endsection