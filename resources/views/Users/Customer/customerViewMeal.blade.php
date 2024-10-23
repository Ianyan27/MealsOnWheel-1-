@extends('Users.Customer.layouts.app')

@section('title', $mealData->meal_name . ' Details')

@section('content')
<?php
    $caregiver_id = DB::table('meals')->where('meal_id', $mealData->meal_id)->value('caregiver_id');
    $caregiver_user_id = DB::table('caregivers')->where('caregiver_id', $caregiver_id)->value('user_id');
?>

<div id="fh5co-blog-section" class="fh5co-section-gray py-5">
    <div class="container">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-md-8 offset-md-2 text-center animate-box mb-4">
                <h1 class="display-4">{{ $mealData->meal_name }}</h1>
            </div>
        </div>

        <!-- Meal Details -->
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-lg animate-box mb-4">
                    <!-- Image Section -->
                    @if ($mealData->meal_image)
                        <img src="{{ asset('uploads/meal/' . $mealData->meal_image) }}" class="card-img-top img-fluid" alt="{{ $mealData->meal_name }} image" style="max-height: 500px; object-fit: cover;">
                    @endif
                    
                    <!-- Card Body (Meal Information) -->
                    <div class="card-body p-4">
                        <h2 class="card-title">{{ $mealData->meal_name }}</h2>
                        <p class="card-text text-muted"><strong>Type:</strong> {{ $mealData->meal_type }}</p>
                        <p class="card-text text-muted"><strong>Day Available:</strong> {{ $mealData->day }}</p>
                        <p class="card-text">{{ $mealData->meal_description }}</p>

                        <!-- Feedback Section -->
                        <div class="border-top pt-3 mt-4">
                            <h5 class="text-primary"><strong>Feedback</strong></h5>
                            <p class="mb-1"><strong>From:</strong> {{ $feedback->name ?? 'Anonymous' }}</p>
                            <p>{{ $feedback->feedback ?? 'No feedback available yet.' }}</p>
                        </div>
                    </div>

                    <!-- Action Buttons (Feedback and Order) -->
                    <div class="card-footer text-center py-3">
                        <a href="{{ route('customer#feedback', ['user_id' => Auth()->user()->id, 'meal_id' => $mealData->meal_id]) }}" class="btn btn-outline-primary btn-lg me-2">
                            <i class="fas fa-comment-alt"></i> Write Feedback
                        </a>
                        <a href="{{ route('customer#orderMeal', ['caregiver_id' => $caregiver_id, 'meal_id' => $mealData->meal_id, 'user_id' => Auth()->user()->id]) }}" class="btn btn-primary btn-lg">
                            <i class="fas fa-shopping-cart"></i> Order
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
