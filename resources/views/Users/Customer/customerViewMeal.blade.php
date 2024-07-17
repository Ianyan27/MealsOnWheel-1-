@section('title')
	{{ $mealData->meal_name }} Details
@endsection

@extends('Users.Customer.layouts.app')

@section('content')
    <?php $caregiver_id = DB::table('meals')->where('meal_id',$mealData->meal_id)->value('caregiver_id');
        $caregiver_user_id = DB::table('caregivers')->where('caregiver_id',$caregiver_id)->value('user_id');
    ?>
		<div id="fh5co-blog-section" class="fh5co-section-gray">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
					<h3><h1>{{ $mealData->meal_name }}</h1></h3>
				</div>
			</div>
			<div class="container">
				<div class="row row-bottom-padded-md">
                    <div class="container">
                        <div class="row">
                            <div class="jumbotron animate-box">
								<div class="form-floating mb-3" style="padding-bottom: 50px">
									@if ($mealData->meal_image)
										<img src="{{ asset('uploads/meal/'. $mealData->meal_image) }}" class="img-thumbnail" alt="category image ">
										<br>
									@endif
								</div>
								<div class="feature-text animate-box">
                                	<h1>{{ $mealData->meal_name }}</h1>
                                	<p>{{ $mealData->meal_description }}</p>
								</div>
								<div class="col">
									{{-- <div class="form-group animate-box">
										<a href="{{ route('member#foodSafety') }}"> <input type="submit" value="Food Safety" class="btn btn-primary"></a>
									</div> --}}
								</div>
                              </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-1">
                                <div class="form-group animate-box">
                                    <a href="{{ route('customer#orderMeal', [ 'caregiver_id' => $mealData -> caregiver_id, 'meal_id' => $mealData-> meal_id, 'user_id' => Auth()->user()->id]) }}"> <input type="submit" value="Order" class="btn btn-primary"></a>
                                </div>
                            </div>
                        </div>
                    </div>
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

@endsection