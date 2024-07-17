@section('title')
    New Meal
@endsection

@extends('Users.Caregiver.layouts.app')

@section('content')

<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
<link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

<!-- Modernizr JS -->
<script src="{{ asset('js/modernizr-2.6.2.min.js') }}" defer></script>

<div id="fh5co-blog-section" class="fh5co-section-gray">
    <div class="container">
        <div class="row row-bottom-padded-md">
            <div class="container">
                <div class="row">
                    <form action="{{ route('caregiver#saveMeal') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-lg-6">
                            <h1>Start Creating Your Own Menu!</h1>
                        </div>
                        <div class="col-lg-6">
                            <div class="row">
                                <div>
                                    <div class="form-group">
                                        <label for="basic-url">Meal Name</label>
                                        <input type="text" class="form-control" placeholder="Put your meal name here" name="meal_name" required>
                                    </div>
                                </div>
                                <div>
                                    <div class="form-group">
                                        <label for="basic-url">Meal Picture</label>
                                        <input type="file" class="form-control" name="meal_image" required>
                                    </div>
                                </div>                                
                                <div>
                                    <div class="form-group">
                                        <label for="basic-url">Meal Description</label>
                                        <textarea class="form-control" id="" cols="30" rows="7" placeholder="Put the meal description here" name="meal_description" required></textarea>
                                    </div>
                                </div>
                                <div>
                                    <input type="hidden" class="form-control" name="caregiver_id" value="{{ $caregiverData->caregiver_id }}" required>
                                </div>
                                <div>
                                    <div class="form-group">
                                        <input type="submit" value="Create" class="btn btn-primary">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>   
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="{{ asset('js/jquery.min.js') }}" defer></script>
<!-- jQuery Easing -->
<script src="{{ asset('js/jquery.easing.1.3.js') }}" defer></script>
<!-- Bootstrap -->
<script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
<!-- Waypoints -->
<script src="{{ asset('js/jquery.waypoints.min.js') }}" defer></script>
<script src="{{ asset('js/sticky.js') }}" defer></script>
<!-- Stellar -->
<script src="{{ asset('js/jquery.stellar.min.js') }}" defer></script>
<!-- Superfish -->
<script src="{{ asset('js/hoverIntent.js') }}" defer></script>
<script src="{{ asset('js/superfish.js') }}" defer></script>
<!-- Main JS -->
<script src="{{ asset('js/main.js') }}" defer></script>

@endsection
