@extends('Users.Customer.layouts.app')

@section('title', 'Feedback form')

@section('content')
    <div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h3 class="text-center mb-4">Send Your Feedback</h3>
            <form action="{{ route('customer#saveFeedback') }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="meal_id" value="{{ $mealData->meal_id }}">

                <div class="form-group">
                    <label for="name">Name:</label>
                    <input id="name" type="text" name="name" class="form-control" value=" {{ Auth::user()->name }} " readonly>
                </div>

                <div class="form-group">
                    <label for="feedback">Feedback</label>
                    <textarea id="feedback" name="feedback" class="form-control" placeholder="Enter your feedback" cols="30" rows="10" required></textarea>
                </div>

                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-primary">Send Feedback</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
