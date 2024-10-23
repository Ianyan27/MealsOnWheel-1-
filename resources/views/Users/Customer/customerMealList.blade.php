@extends('Users.Customer.layouts.app')

@section('title', 'List Meals')

@section('content')
    <div class="fh5co-section-gray py-5" role="main">
        <div class="container">
            <!-- Page Heading with ARIA landmark -->
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center heading-section animate-box">
                    <h3 id="meals-heading" tabindex="0" class="mb-4" role="heading" aria-level="1">Meals</h3>
                </div>
            </div>

            <!-- Filter Form with enhanced accessibility -->
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('customer#viewListMeals') }}" method="GET" class="mb-4" aria-labelledby="filter-form">
                        <div class="form-group">
                            <label for="filterDay" id="filter-label">Filter by Day:</label>
                            <select name="day" id="filterDay" class="form-control" aria-labelledby="filter-label" aria-required="true">
                                <option value="" {{ request('day') == '' ? 'selected' : '' }}>All Days</option>
                                <option value="Monday" {{ request('day') == 'Monday' ? 'selected' : '' }}>Monday</option>
                                <option value="Tuesday" {{ request('day') == 'Tuesday' ? 'selected' : '' }}>Tuesday</option>
                                <option value="Wednesday" {{ request('day') == 'Wednesday' ? 'selected' : '' }}>Wednesday</option>
                                <option value="Thursday" {{ request('day') == 'Thursday' ? 'selected' : '' }}>Thursday</option>
                                <option value="Friday" {{ request('day') == 'Friday' ? 'selected' : '' }}>Friday</option>
                                <option value="Saturday" {{ request('day') == 'Saturday' ? 'selected' : '' }}>Saturday</option>
                                <option value="Sunday" {{ request('day') == 'Sunday' ? 'selected' : '' }}>Sunday</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg" role="button" aria-label="Filter meals by day">Filter</button>
                    </form>

                    <!-- Meal List with accessible elements -->
                    <div class="row" role="list">
                        @foreach ($mealList as $meal)
                            <div class="col-md-4 mb-4" role="listitem">
                                <a href="{{ route('customer#viewMeal', $meal->meal_id) }}" class="text-decoration-none" aria-label="View details for {{ $meal->meal_name }}">
                                    <div class="fh5co-team text-center animate-box" tabindex="0">
                                        <!-- Image with descriptive alt text -->
                                        <img class="img-thumbnail mb-3" 
                                            src="{{ asset('uploads/meal/' . $meal->meal_image) }}" 
                                            style="width: 100%; max-width: 300px; height: 200px; object-fit: cover;" 
                                            alt="Image of {{ $meal->meal_name }}" 
                                            role="img">
                                        
                                        <div class="meal-details" tabindex="0">
                                            <h2 class="mb-3" role="heading" aria-level="2">{{ $meal->meal_name }}</h2>
                                            <p><strong>Type:</strong> {{ $meal->meal_type }}</p>
                                            <p><strong>Day:</strong> {{ $meal->day }}</p>
                                            <p>{{ $meal->meal_description }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
