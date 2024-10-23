<head>
    <style>
        #fh5co-blog-section h1 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #333;
        }

        #fh5co-blog-section p.lead {
            font-size: 1.2rem;
            color: #555;
        }

        .form-control {
            padding: 15px;
            font-size: 1rem;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 10px 20px;
            font-size: 1.1rem;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .card {
            border-radius: 10px;
        }

        @media (max-width: 768px) {
            #fh5co-blog-section h1 {
                font-size: 2rem;
            }

            #fh5co-blog-section p.lead {
                font-size: 1rem;
            }

            .form-group label {
                font-size: 0.9rem;
            }

            .btn-lg {
                font-size: 1rem;
                padding: 10px 15px;
            }
        }
    </style>
</head>

@extends('Users.Caregiver.layouts.app')

@section('title')
    New Meal
@endsection

@section('content')
    <div id="fh5co-blog-section" class="py-5 bg-light">
        <div class="container">
            <!-- Heading Section -->
            <div class="row mb-4 text-center">
                <div class="col-lg-12">
                    <h1 class="display-4">Start Creating Your Own Menu!</h1>
                    <p class="lead">Add meals to your weekly plan with ease and style.</p>
                </div>
            </div>

            <!-- Form Section -->
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card shadow-sm">
                        <div class="card-body p-5">
                            <form action="{{ route('caregiver#saveMeal') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <!-- Left Column -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="meal_name" class="font-weight-bold">Meal Name</label>
                                            <input type="text" class="form-control" id="meal_name"
                                                placeholder="Put your meal name here" name="meal_name" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="meal_image" class="font-weight-bold">Meal Picture</label>
                                            <input type="file" class="form-control-file" id="meal_image"
                                                name="meal_image" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="meal_description" class="font-weight-bold">Meal Description</label>
                                            <textarea class="form-control" id="meal_description" cols="30" rows="5"
                                                placeholder="Put the meal description here" name="meal_description" required></textarea>
                                        </div>
                                    </div>

                                    <!-- Right Column -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="meal_type" class="font-weight-bold">Meal Type</label>
                                            <input type="text" class="form-control" id="meal_type"
                                                placeholder="Enter meal type" name="meal_type" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="day" class="font-weight-bold">Day</label>
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

                                        <!-- Hidden field for caregiver id -->
                                        <input type="hidden" name="caregiver_id" value="{{ $caregiverData->caregiver_id }}"
                                            required>

                                        <div class="form-group text-right mt-4">
                                            <button type="submit" class="btn btn-primary btn-lg">Create</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
