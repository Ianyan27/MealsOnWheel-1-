@section('title')
    {{$viewMeal->meal_name}} Details
@endsection

@extends('Users.Caregiver.layouts.app')

@section('content')
<div id="fh5co-blog-section" class="fh5co-section-gray">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
            <h3><h1>{{ $viewMeal->meal_name }}</h1></h3>
        </div>
    </div>
    <div class="container">
        <div class="row row-bottom-padded-md">
            <div class="container">
                <div class="row">
                    <div class="jumbotron animate-box">
                        <div class="form-floating mb-3" style="padding-bottom: 50px">
                            @if ($viewMeal->meal_image)
                                <img src="{{ asset('uploads/meal/'. $viewMeal->meal_image) }}" class="img-thumbnail" alt="category image ">
                                <br>
                            @endif
                        </div>
                        <div class="feature-text animate-box">
                            <h1>{{ $viewMeal->meal_name }}</h1>
                            <p>{{ $viewMeal->meal_description }}</p>
                        </div>
                        <div class="col">
                            {{-- <div class="form-group animate-box">
                                <a href="{{ route('partner#foodSafety') }}"> <input type="submit" value="Food Safety" class="btn btn-primary"></a>
                            </div> --}}
                        </div>
                      </div>
                </div>						
            </div>
            <div class="row animate-box">
                <div class="col-sm-1">
                    <div class="form-group animate-box">
                        <a href="{{ route('caregiver#updateMeal', $viewMeal->meal_id) }}"> <input type="submit" value="Update" class="btn btn-primary"></a>
                    </div>
                </div>
                <div class="col-sm-3" style="padding-left: 50px">
                    <div class="form-group animate-box">
                        <a href="{{ route('caregiver#deleteMeal', $viewMeal->meal_id) }}"> <input type="submit" value="Delete" class="btn btn-primary"></a>
                    </div>
                </div>
            </div>
        </div>				
    </div>
</div>
    
</div>

@endsection