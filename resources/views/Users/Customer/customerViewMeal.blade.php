@extends('Users.Customer.layouts.app')

@section('title', $mealData->meal_name . ' Details')

@section('content')
    <?php
    $caregiver_id = DB::table('meals')
        ->where('meal_id', $mealData->meal_id)
        ->value('caregiver_id');
    $caregiver_user_id = DB::table('caregivers')->where('caregiver_id', $caregiver_id)->value('user_id');
    ?>
    <div id="fh5co-blog-section" class="fh5co-section-gray py-5">
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center heading-section animate-box mb-4">
                    <h1>{{ $mealData->meal_name }}</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="jumbotron animate-box p-4">
                        <div class="mb-4">
                            @if ($mealData->meal_image)
                                <img src="{{ asset('uploads/meal/' . $mealData->meal_image) }}" class="img-thumbnail"
                                    style="width: 100%; max-width: 600px; height: auto;" alt="meal image">
                            @endif
                        </div>
                        <div class="feature-text">
                            <h2 class="mb-3">{{ $mealData->meal_name }}</h2>
                            <p><strong>Type:</strong> {{ $mealData->meal_type }}</p>
                            <p><strong>Day:</strong> {{ $mealData->day }}</p>
                            <p>{{ $mealData->meal_description }}</p>
                            <p><strong>Feedback from:</strong> {{ $feedback->name ?? 'Anonymous' }}</p>
                            <p><strong>Feedback:</strong> {{ $feedback->feedback ?? 'There is no feedback yet' }}</p>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('customer#feedback', ['user_id' => Auth()->user()->id, 'meal_id' => $mealData->meal_id]) }}" class="btn btn-primary">
                                Write Feedback
                            </a>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-sm-12 text-center">
                            <a href="{{ route('customer#orderMeal', ['caregiver_id' => $caregiver_id, 'meal_id' => $mealData->meal_id, 'user_id' => Auth()->user()->id]) }}" class="btn btn-primary">
                                Order
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
