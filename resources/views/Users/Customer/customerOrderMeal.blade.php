@section('title')
    Confirm Your Order
@endsection

@extends('Users.Customer.layouts.app')

@section('content')
<<<<<<< HEAD
<?php 
    $caregiver_id = DB::table('meals')->where('caregiver_id', $caregiverData->caregiver_id)->value('caregiver_id');
    $caregiver_user_id = DB::table('caregivers')->where('caregiver_id', $caregiver_id)->value('user_id');
?>

<div style="margin: 60px;">
    <a href="javascript:history.go(-1)" style="text-decoration: underline; color:blue;">
        Click here to cancel order and go back to menu
    </a>
    
    <div class="grid-container">
        <div class="item1">
            <h1 style="margin: 10px auto;">Confirm Your Order</h1>
        </div>
        
        <div class="item3">
            <div class="container" style="background-color: #f2f2f2; padding: 5px 20px 15px 20px; border: 1px solid lightgrey; border-radius: 3px;">
                <form action="{{ route('order#saveOrder') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-50">
                            <h3>Your Details</h3>
                            <label class="checkout-label" for="fname"><i class="fa fa-user"></i> Full Name</label>
                            <input class="checkout-input" type="text" id="fname" name="customer_name" value="{{ $userData->name }}" readonly>

                            <label class="checkout-label" for="email"><i class="fa fa-envelope"></i> Email</label>
                            <input class="checkout-input" type="text" id="email" name="email" value="{{ $userData->email }}" readonly>

                            <label class="checkout-label" for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                            <input class="checkout-input" type="text" id="adr" name="customer_address" value="{{ $customerData->address }}" readonly>

                            <label class="checkout-label" for="phone"><i class="fa fa-institution"></i> Phone</label>
                            <input class="checkout-input" type="text" id="phone" name="customer_phone_number" value="{{ $customerData->phone_number }}" readonly>
                        </div>

                        <div class="col-50">
                            <h3>Menu To Order</h3>
                            <div class="form-floating mb-3" style="padding-bottom: 50px;">
                                @if ($mealData->meal_image)
                                    <img src="{{ asset('uploads/meal/' . $mealData->meal_image) }}" class="img-thumbnail" alt="meal image">
                                    <br>
                                @endif

                                <input type="hidden" name="order_meal_image" value="{{ $mealData->meal_image }}" />
                                <input type="hidden" name="meal_id" value="{{ $mealData->meal_id }}" />
                                <input type="hidden" name="caregiver_id" value="{{ $caregiverData->caregiver_id }}" />
                                <input type="hidden" name="customer_id" value="{{ $customerData->customer_id }}" />
                                <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}" />
                            </div>

                            <label class="checkout-label" for="cname">Meal Name</label>
                            <input class="checkout-input" type="text" id="cname" name="order_meal_name" value="{{ $mealData->meal_name }}" readonly>

                            <label class="checkout-label" for="expmonth">Meal Prepared By</label>
                            <input class="checkout-input" type="text" id="expmonth" name="order_prepared" value="{{ $userData->name }}" readonly>

                            <div class="row">
                                <div class="col-50">
                                    <label class="checkout-label" for="expyear">Delivered By (A volunteer will be assigned as your rider)</label>
                                    <input class="checkout-input" type="text" id="expyear" name="volunteer_name" value="Volunteer to be assigned" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="submit" value="Confirm Order" class="checkout-btn">
                </form>
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

=======
    <?php $caregiver_id = DB::table('meals')
        ->where('caregiver_id', $caregiverData->caregiver_id)
        ->value('caregiver_id');
    $caregiver_user_id = DB::table('caregivers')->where('caregiver_id', $caregiver_id)->value('user_id');
    ?>
    <div style="margin: 60px;">
        <a href="javascript:history.go(-1)" style="text-decoration: underline; color:blue;">Click here to cancel order and go
            back to menu</a>

        <div class="grid-container">
            <div class="item1">
                <h1 style="margin: 10px auto;">Confirm Your Order</h1>
            </div>

            <div class="item3">
                <div class="container"
                    style="background-color: #f2f2f2;
			padding: 5px 20px 15px 20px;
			border: 1px solid lightgrey;
			border-radius: 3px;">
                    <form action="{{ route('order#saveOrder') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-50">
                                <h3>Your Details</h3>
                                <label class="checkout-label" for="fname"><i class="fa fa-user"></i> Full Name</label>
                                <input class="checkout-input" type="text" id="fname" name="customer_name"
                                    value="{{ $userData->name }}" readonly>

                                <label class="checkout-label" for="email"><i class="fa fa-envelope"></i> Email</label>
                                <input class="checkout-input" type="text" id="email" name="email"
                                    value="{{ $userData->email }}" readonly>

                                <label class="checkout-label" for="adr"><i class="fa fa-address-card-o"></i>
                                    Address</label>
                                <input class="checkout-input" type="text" id="adr" name="customer_address"
                                    value="{{ $customerData->address }}" readonly>

                                <label class="checkout-label" for="phone"><i class="fa fa-institution"></i> Phone</label>
                                <input class="checkout-input" type="text" id="phone" name="customer_phone_number"
                                    value="{{ $customerData->phone_number }}" readonly>
                            </div>

                            <div class="col-50">
                                <h3>Menu To Order</h3>
                                <div class="form-floating mb-3" style="padding-bottom: 50px">
                                    @if ($mealData->meal_image)
                                        <img src="{{ asset('uploads/meal/' . $mealData->meal_image) }}"
                                            class="img-thumbnail" alt="category image ">
                                        <br>
                                    @endif

                                    <input type="hidden" name="order_meal_image" value="{{ $mealData->meal_image }}" />
                                    <input type="hidden" name="meal_id" value="{{ $mealData->meal_id }}" />
                                    <input type="hidden" name="caregiver_id" value="{{ $caregiverData->caregiver_id }}" />
                                    <input type="hidden" name="customer_id" value="{{ $customerData->customer_id }}" />
                                    <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}" />
                                </div>
                                <label class="checkout-label" for="cname">Meal Name</label>
                                <input class="checkout-input" type="text" id="cname" name="order_meal_name"
                                    value="{{ $mealData->meal_name }}" readonly>

                                <label class="checkout-label" for="expmonth">Meal Prepared By</label>
                                <input class="checkout-input" type="text" id="expmonth" name="caregiver_name"
                                    value="{{ $userData->name }}" readonly>

                                <div class="row">
                                    <div class="col-50">
                                        <label class="checkout-label" for="expyear">Delivered By (A volunteer will be
                                            assigned as your rider)</label>
                                        <input class="checkout-input" type="text" id="expyear" name="deliver_name"
                                            value="Rider to be assigned" readonly>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <input type="submit" value="Confirm Order" class="checkout-btn">
                    </form>
                </div>


            </div>

        </div>
    </div>

    <!-- fh5co-blog-section -->
    <script src="{{ asset('js/jquery.min.js') }}" defer></script>
    <!-- jQuery Easing -->
    <script src="{{ asset('js/jquery.easing.1.3.js') }}" defer></script>
    <!-- Bootstrap -->
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
    <!-- Waypoints -->
    <script src="{{ asset('js/jquery.waypoints.min.js') }}" defer></script>
    <script src="{{ asset('js/sticky.js') }}"></script>

    <!-- Stellar -->
    <script src="{{ asset('js/jquery.stellar.min.js') }}" defer></script>
    <!-- Superfish -->
    <script src="{{ asset('js/hoverIntent.js') }}" defer></script>
    <script src="{{ asset('js/superfish.js') }}" defer></script>

    <!-- Main JS -->
    <script src="{{ asset('js/main.js') }}" defer></script>
>>>>>>> 3597f4a (Refactor delivery-related functionality and views)
@endsection
