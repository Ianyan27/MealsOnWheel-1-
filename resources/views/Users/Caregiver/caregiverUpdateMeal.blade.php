@section('title')
    {{$updateMeal->meal_name}} Details
@endsection

@extends('Users.Caregiver.layouts.app')

@section('content')
    <div id="fh5co-blog-section" class="fh5co-section-gray">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
                <h3><h1>Update {{ $updateMeal->meal_name }}</h1></h3>
            </div>
        </div>
        <div class="container">
            <div class="row row-bottom-padded-md">
                <div class="container">
                    <div class="row">
                        <form action="{{ route('caregiver#saveUpdate', $updateMeal->meal_id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-lg-6 animate-box">									
                                @if ($updateMeal->meal_image)
                                    <img src="{{ asset('uploads/meal/'. $updateMeal->meal_image) }}" class="img-thumbnail" alt="menu image ">
                                    <br>
                                @endif
                            </div>
                            <div class="col-lg-6" style="padding-left: 60px">
                                <div class="row">
                                    <div>
                                        <div class="form-group animate-box">
                                            <label for="basic-url">Menu Name</label>
                                            <input type="text" class="form-control" placeholder="Put your menu title here" name="meal_name" value="{{ old('meal_name', $updateMeal->meal_name) }}" required>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group animate-box">
                                            <label for="basic-url">Meal Description</label>
                                            <textarea class="form-control" id="" cols="30" rows="7" placeholder="Put your meal description here" name="meal_description" required>{{ old('meal_description', $updateMeal->meal_description) }}</textarea>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group animate-box">
                                            <label for="basic-url">Meal Picture</label>
                                            <input type="file" class="form-control" name="meal_image" value="{{ $updateMeal->meal_image }}" required>
                                        </div>
                                    </div>
                                    <div>
                                        <input type="hidden" class="form-control" name="caregiver_id" value="{{ $caregiverData->caregiver_id }}" required>
                                    </div>
                                    <div>
                                        <div class="form-group animate-box">
                                            <input type="submit" value="Update" class="btn btn-primary">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>   
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection