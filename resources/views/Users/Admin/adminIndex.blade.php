@section('title')
    Welcome
@endsection

@extends('Users.Admin.layouts.app')

@section('content')
    <div class="container mt-4">
        <a href="{{ route('admin#viewMeals') }}" class="btn btn-primary mb-2">View Meals</a>
        <a href="{{ route('admin#viewCustomers') }}" class="btn btn-primary mb-2">View Customers</a>
        <a href="{{ route('admin#viewCaregivers') }}" class="btn btn-primary mb-2">View Caregivers</a>
        <a href="{{ route('admin#viewDelivers') }}" class="btn btn-primary mb-2">View Deliver</a>
        <a href="{{ route('admin#viewOrders') }}" class="btn btn-primary mb-2">View Order</a>
        <a href="{{ route('admin#viewFeedback') }}" class="btn btn-primary mb-2">View Feedbacks</a>
    </div>
@endsection