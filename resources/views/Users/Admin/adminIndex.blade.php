@section('title')
    Welcome
@endsection

@extends('Users.Admin.layouts.app')

@section('content')
    <div class="row text-center">
        <!-- View Meals Card -->
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('admin#viewMeals') }}" class="btn btn-primary mb-2">View Meals</a>
                    <p class="card-text">Manage and view all available meals in the system.</p>
                </div>
            </div>
        </div>
        <!-- View Customers Card -->
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('admin#viewCustomers') }}" class="btn btn-primary mb-2">View Customers</a>
                    <p class="card-text">Access the customer list and manage customer data.</p>
                </div>
            </div>
        </div>
        <!-- View Caregivers Card -->
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('admin#viewCaregivers') }}" class="btn btn-primary mb-2">View Caregivers</a>
                    <p class="card-text">Check caregiver profiles and manage caregiver details.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row text-center">
        <!-- View Delivers Card -->
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('admin#viewDelivers') }}" class="btn btn-primary mb-2">View Deliver</a>
                    <p class="card-text">View delivery personnel and manage their assignments.</p>
                </div>
            </div>
        </div>
        <!-- View Orders Card -->
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('admin#viewOrders') }}" class="btn btn-primary mb-2">View Order</a>
                    <p class="card-text">Track orders and update their statuses.</p>
                </div>
            </div>
        </div>
        <!-- View Feedbacks Card -->
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('admin#viewFeedback') }}" class="btn btn-primary mb-2">View Feedbacks</a>
                    <p class="card-text">Browse customer feedback and respond to issues or inquiries.</p>
                </div>
            </div>
        </div>
    </div>

@endsection