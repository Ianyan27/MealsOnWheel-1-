@extends('Users.Customer.layouts.app')

@section('title', 'List Meals')

@section('content')
    <div class="fh5co-section-gray py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center heading-section animate-box">
                    <h3 class="mb-4">Meals</h3>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <!-- Filter Form -->
                    <form action="{{ route('customer#viewListMeals') }}" method="GET" class="mb-4">
                        <div class="form-group">
                            <label for="filterDay">Filter by Day:</label>
                            <select name="day" id="filterDay" class="form-control">
                                <option value="">All Days</option>
                                <option value="Monday" {{ request('day') == 'Monday' ? 'selected' : '' }}>Monday</option>
                                <option value="Tuesday" {{ request('day') == 'Tuesday' ? 'selected' : '' }}>Tuesday</option>
                                <option value="Wednesday" {{ request('day') == 'Wednesday' ? 'selected' : '' }}>Wednesday</option>
                                <option value="Thursday" {{ request('day') == 'Thursday' ? 'selected' : '' }}>Thursday</option>
                                <option value="Friday" {{ request('day') == 'Friday' ? 'selected' : '' }}>Friday</option>
                                <option value="Saturday" {{ request('day') == 'Saturday' ? 'selected' : '' }}>Saturday</option>
                                <option value="Sunday" {{ request('day') == 'Sunday' ? 'selected' : '' }}>Sunday</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </form>

                    <div class="row">
                        @foreach ($mealList as $meal)
                            <div class="col-md-4 mb-4">
                                <a href="{{ route('customer#viewMeal', $meal->meal_id) }}" class="text-decoration-none">
                                    <div class="fh5co-team text-center animate-box">
                                        <img class="img-thumbnail mb-3" src="{{ asset('uploads/meal/' . $meal->meal_image) }}"
                                            style="width: 100%; max-width: 300px; height: 200px; object-fit: cover;" alt="meal image">
                                        <div>
                                            <h2 class="mb-3">{{ $meal->meal_name }}</h2>
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
