@extends('Users.Caregiver.layouts.app')

@section('title')
    New Meal
@endsection

@section('content')
<div id="fh5co-blog-section" class="py-5 bg-light">
    <div class="container">
      <div class="row mb-4">
        <div class="col-lg-6">
          <h1>Start Creating Your Own Menu!</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <form action="{{ route('caregiver#saveMeal') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="meal_name">Meal Name</label>
                  <input type="text" class="form-control" id="meal_name" placeholder="Put your meal name here" name="meal_name" required>
                </div>
                <div class="form-group">
                  <label for="meal_image">Meal Picture</label>
                  <input type="file" class="form-control-file" id="meal_image" name="meal_image" required>
                </div>
                <div class="form-group">
                  <label for="meal_description">Meal Description</label>
                  <textarea class="form-control" id="meal_description" cols="30" rows="7" placeholder="Put the meal description here" name="meal_description" required></textarea>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="meal_type">Meal Type</label>
                  <input type="text" class="form-control" id="meal_type" placeholder="Enter meal type" name="meal_type" required>
                </div>
                <div class="form-group">
                  <label for="day">Day</label>
                  <select class="form-control" id="day" name="day" required>
                    <option value="">Select Day</option>
                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                    <option value="Saturday">Saturday</option>
                    <option value="Sunday">Sunday</option>
                  </select>
                </div>
                <input type="hidden" name="caregiver_id" value="{{ $caregiverData->caregiver_id }}" required>
                <div class="form-group text-right">
                  <input type="submit" value="Create" class="btn btn-primary">
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>  
@endsection
