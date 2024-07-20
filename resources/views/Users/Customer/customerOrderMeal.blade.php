@extends('Users.Customer.layouts.app')

@section('title', 'Confirm Your Order')

@section('content')
<div class="container my-5">
    <a href="javascript:history.go(-1)" class="text-primary" style="text-decoration: underline;">Click here to cancel order and go back to menu</a>

    <div class="grid-container mt-4">
        <div class="text-center mb-4">
            <h1>Confirm Your Order</h1>
        </div>

        <div class="bg-light p-4 border border-light rounded">
            <form action="{{ route('order#saveOrder') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <h3>Your Details</h3>
                        <div class="form-group">
                            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                            <input class="form-control" type="text" id="fname" name="customer_name" value="{{ $userData->name }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="email"><i class="fa fa-envelope"></i> Email</label>
                            <input class="form-control" type="text" id="email" name="email" value="{{ $userData->email }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                            <input class="form-control" type="text" id="adr" name="customer_address" value="{{ $customerData->address }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="phone"><i class="fa fa-phone"></i> Phone</label>
                            <input class="form-control" type="text" id="phone" name="customer_phone_number" value="{{ $customerData->phone_number }}" readonly>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <h3>Menu To Order</h3>
                        <div class="form-group mb-4">
                            @if ($mealData->meal_image)
                                <img src="{{ asset('uploads/meal/' . $mealData->meal_image) }}" class="img-fluid mb-3" alt="meal image">
                            @endif

                            <input type="hidden" name="order_meal_image" value="{{ $mealData->meal_image }}" />
                            <input type="hidden" name="meal_id" value="{{ $mealData->meal_id }}" />
                            <input type="hidden" name="caregiver_id" value="{{ $caregiverData->caregiver_id }}" />
                            <input type="hidden" name="customer_id" value="{{ $customerData->customer_id }}" />
                            <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}" />
                        </div>

                        <div class="form-group">
                            <label for="cname">Meal Name</label>
                            <input class="form-control" type="text" id="cname" name="order_meal_name" value="{{ $mealData->meal_name }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="expmonth">Meal Prepared By</label>
                            <input class="form-control" type="text" id="expmonth" name="caregiver_name" value="{{ $userData->name }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="expyear">Delivered By (A volunteer will be assigned as your rider)</label>
                            <input class="form-control" type="text" id="expyear" name="deliver_name" value="Rider to be assigned" readonly>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Confirm Order</button>
            </form>
        </div>
    </div>
</div>

@endsection