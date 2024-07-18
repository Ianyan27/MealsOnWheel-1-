@extends('Users.Customer.layouts.app')

@section('title', 'Feedback form')

@section('content')
    <form action="{{ route('customer#saveFeedback') }}" method="POST">
        @csrf
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <input type="hidden" name="meal_id" value="{{ $mealData->meal_id }}">
        <input type="text" name="name" placeholder="Enter your name (optional)">
        <textarea name="feedback" placeholder="Enter your feedback" cols="30" rows="10" required></textarea>
        <input type="submit" value="Send Feedback">
    </form>
@endsection
