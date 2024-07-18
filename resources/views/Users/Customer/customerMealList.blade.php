@extends('Users.Customer.layouts.app')

@section('title', 'List Meals')

@section('content')
    <div class="fh5co-section-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
                    <h3 style="margin-top: 50px;">Meals</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Filter Form -->
                    <form action="{{ route('customer#viewListMeals') }}" method="GET">
                        <div class="form-group">
                            <label for="filterDay">Filter by Day:</label>
                            <select name="day" id="filterDay" class="form-control">
                                <option value="">All Days</option>
                                <option value="Monday" {{ request('day') == 'Monday' ? 'selected' : '' }}>Monday</option>
                                <option value="Tuesday" {{ request('day') == 'Tuesday' ? 'selected' : '' }}>Tuesday</option>
                                <option value="Wednesday" {{ request('day') == 'Wednesday' ? 'selected' : '' }}>Wednesday
                                </option>
                                <option value="Thursday" {{ request('day') == 'Thursday' ? 'selected' : '' }}>Thursday
                                </option>
                                <option value="Friday" {{ request('day') == 'Friday' ? 'selected' : '' }}>Friday</option>
                                <option value="Saturday" {{ request('day') == 'Saturday' ? 'selected' : '' }}>Saturday
                                </option>
                                <option value="Sunday" {{ request('day') == 'Sunday' ? 'selected' : '' }}>Sunday</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </form>
                    <div class="container" style="margin-top: 20px;">
                        @foreach ($mealList as $meal)
                            <a href="{{ route('customer#viewMeal', $meal->meal_id) }}">
                                <div class="col-md-4" style="padding-top:50px">
                                    <div class="fh5co-team text-center animate-box" style="padding: 20px 0;">
                                        <img class="img-thumbnail" src="{{ asset('uploads/meal/' . $meal->meal_image) }}"
                                            style="width:300px; height:200px;" alt="meal images">
                                        <div>
                                            <h2 style="margin-bottom: 20px;">{{ $meal->meal_name }}</h2>
                                            <p><strong>Type:</strong> {{ $meal->meal_type }}</p>
                                            <p><strong>Day:</strong> {{ $meal->day }}</p>
                                            <p>{{ $meal->meal_description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
