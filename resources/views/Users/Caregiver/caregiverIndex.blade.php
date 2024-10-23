@extends('Users.Caregiver.layouts.app')

<head>
    <style>
        /* General Styles */
        .card {
            border-radius: 10px;
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: translateY(-10px);
        }
    
        /* Image Hover Overlay */
        .position-relative {
            position: relative;
        }
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .position-relative:hover .overlay {
            opacity: 1;
        }
        .overlay a {
            color: #fff;
            text-transform: uppercase;
            font-weight: bold;
        }
    
        /* Text Styles */
        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
            color: #333;
        }
        .card-text {
            font-size: 0.9rem;
            color: #666;
        }
    
        /* Button Styles */
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
    
        /* Empty State Styles */
        .text-center h3 {
            font-size: 2.5rem;
            font-weight: bold;
        }
        .text-center p {
            font-size: 1.2rem;
            color: #666;
        }
    
        /* Responsive Design */
        @media (max-width: 768px) {
            .card-title {
                font-size: 1.1rem;
            }
            .card-text {
                font-size: 0.85rem;
            }
            .text-center h3 {
                font-size: 2rem;
            }
            .text-center p {
                font-size: 1rem;
            }
        }
    </style>
</head>

@section('title')
    Welcome
@endsection

@section('content')

    <!-- Alert messages for meal added or deleted -->
    @if (Session::has('mealAdded'))
        <div class="alert alert-success animate-box" role="alert">
            {{ Session::get('mealAdded') }}
        </div>
    @endif
    @if (Session::has('mealDeleted'))
        <div class="alert alert-danger animate-box" role="alert">
            {{ Session::get('mealDeleted') }}
        </div>
    @endif

    <!-- Check if there are meals available -->
    @if ($mealData->isEmpty())
        <div class="text-center my-5">
            <h3 class="display-4">No Meals Available</h3>
            <p class="lead">Start by adding some delicious meals!</p>
        </div>
    @else
        <div class="row">
            @foreach ($mealData as $meal)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <!-- Meal Image with Hover Effect -->
                        <div class="position-relative">
                            <a href="{{ route('caregiver#viewMeal', $meal->meal_id) }}">
                                <img class="card-img-top meal-image img-fluid"
                                    src="{{ asset('uploads/meal/' . $meal->meal_image) }}" alt="meal images"
                                    style="height: 250px; object-fit: cover;">
                            </a>
                            <!-- Hover Overlay for View Meal Button -->
                            <div class="overlay d-flex align-items-center justify-content-center">
                                <a href="{{ route('caregiver#viewMeal', $meal->meal_id) }}"
                                    class="btn btn-light btn-sm text-dark">View Meal</a>
                            </div>
                        </div>

                        <!-- Card Body for Meal Information -->
                        <div class="card-body d-flex flex-column">
                            <h3 class="card-title font-weight-bold">{{ $meal->meal_name }}</h3>
                            <p class="card-text text-muted">
                                {{ Str::limit($meal->meal_description, 100) }}
                            </p>

                            <!-- Caregiver-only Action Buttons -->
                            @if (Auth::user()->role == 'caregiver')
                                <div class="mt-auto">
                                    <a href="{{ route('caregiver#updateMeal', $meal->meal_id) }}"
                                        class="btn btn-primary btn-sm">Update Meal</a>
                                    <a href="{{ route('caregiver#deleteMeal', $meal->meal_id) }}"
                                        class="btn btn-danger btn-sm">Delete Meal</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

@endsection
