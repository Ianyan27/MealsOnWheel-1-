@extends('Users.Customer.layouts.app')

@section('title', $mealData->meal_name . ' Details')

@section('content')
    <?php
    $caregiver_id = DB::table('meals')
        ->where('meal_id', $mealData->meal_id)
        ->value('caregiver_id');
    $caregiver_user_id = DB::table('caregivers')->where('caregiver_id', $caregiver_id)->value('user_id');
    ?>
    <div id="fh5co-blog-section" class="fh5co-section-gray">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
                <h1>{{ $mealData->meal_name }}</h1>
            </div>
        </div>
        <div class="container">
            <div class="row row-bottom-padded-md">
                <div class="container">
                    <div class="row">
                        <div class="jumbotron animate-box">
                            <div class="form-floating mb-3" style="padding-bottom: 50px">
                                @if ($mealData->meal_image)
                                    <img src="{{ asset('uploads/meal/' . $mealData->meal_image) }}" class="img-thumbnail"
                                        alt="meal image">
                                    <br>
                                @endif
                            </div>
                            <div class="feature-text animate-box">
                                <h2>{{ $mealData->meal_name }}</h2>
                                <p><strong>Type:</strong> {{ $mealData->meal_type }}</p>
                                <p><strong>Day:</strong> {{ $mealData->day }}</p>
                                <p>{{ $mealData->meal_description }}</p>
                                <p>{{ $feedback->name ?? 'Anonymous' }}</p>
                                <p>This is the feedback: {{ $feedback->feedback ?? 'There is no feedback yet' }}</p>
                            </div>
                            <div class="">
                                <a
                                    href="{{ route('customer#feedback', ['user_id' => Auth()->user()->id, 'meal_id' => $mealData->meal_id]) }}">
                                    Write Feedback
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-1">
                            <div class="form-group animate-box">
                                <a
                                    href="{{ route('customer#orderMeal', ['caregiver_id' => $mealData->caregiver_id, 'meal_id' => $mealData->meal_id, 'user_id' => Auth()->user()->id]) }}">
                                    <input type="submit" value="Order" class="btn btn-primary">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript files -->
    <script src="{{ asset('js/jquery.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery.easing.1.3.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery.waypoints.min.js') }}" defer></script>
    <script src="{{ asset('js/sticky.js') }}"></script>
    <script src="{{ asset('js/jquery.stellar.min.js') }}" defer></script>
    <script src="{{ asset('js/hoverIntent.js') }}" defer></script>
    <script src="{{ asset('js/superfish.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
@endsection
