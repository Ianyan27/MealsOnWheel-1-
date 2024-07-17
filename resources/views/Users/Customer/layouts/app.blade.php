<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        @yield('title')
    </title>

    <!------------CSS-------------->
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('main/css/style.css')}}"> --}}

    <!-- Bootstrap CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

      <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<!-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'> -->
	
	<!-- Animate.css -->
	<link rel="stylesheet" type="text/css" href="{{ url('/css/animate.css') }}" >
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" type="text/css" href="{{ url('/css/icomoon.css') }}">
	<!-- Bootstrap  -->
	<link rel="stylesheet" type="text/css" href="{{ url('/css/bootstrap.css') }}">
	<!-- Superfish -->
	<link rel="stylesheet" type="text/css" href="{{ url('/css/superfish.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}">


	<!-- Modernizr JS -->
	<script src="../js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

  </head>
<body style="min-height: 100vh;
display: flex;
flex-direction: column;">
    <!-- Option 1: Bootstrap Bundle with Popper -->


<!-- Start nav -->
<div class="header-top">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 text-left fh5co-link">
                <a href="/contact">Contact</a>
                <a href="/terms">Terms and Conditions</a>
            </div>
            <div class="col-md-6 col-sm-6 text-right fh5co-social">
                <a href="#" class="grow"><i class="icon-facebook2"></i></a>
                <a href="#" class="grow"><i class="icon-twitter2"></i></a>
                <a href="#" class="grow"><i class="icon-instagram2"></i></a>
            </div>
        </div>
    </div>
</div>
<header id="fh5co-header-section" class="sticky-banner">
    <div class="container">
        <div class="nav-header">
            <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle dark"><i></i></a>
            <div id="fh5co-logo"><a href="{{ route('customer#index') }}" ><img src="{{ url('/images/company_logo.png') }}" alt="company logo"></a></div>
            <nav id="fh5co-menu-wrap" role="navigation">
                    <ul class="sf-menu" id="fh5co-primary-menu">
                        <li class="active">
                            <a href="{{ route('customer#index') }}">Home</a>
                        </li>
                        <li><a href="{{ route('customer#viewListMeals') }}">Meals</a></li>
                        
                        {{-- <li><a href="/about">About</a></li>
                        <li><a href="/contact">Contact</a></li> --}}
                        
                          <button type="button" class="btn btn-blue dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" 
                          style="
                                padding: 12px 16px;">
                              {{ Auth()->user()->name }}
                          </button>
                          <ul class="dropdown-menu dropdown-menu-end">
                              <li><a class="dropdown-item" href="{{ route('customer#updateProfile', Auth()->user()->id) }}">Update </a></li>
                              <li>
                                  <a class="dropdown-item" href="#">
                                      <form action="{{ route('logout') }}" method="post">
                                          @csrf
                                          <button type="submit" class="btn pt-0 pb-1 px-0 nav-link text-dark" style="button:focus { outline: none; }" >  <i class="fas fa-sign-out-alt" ></i> Logout </button>
                                      </form>
                                  </a>
                              </li>
                          </ul>
                      
                      
                  
                    </ul>

                     
                    
                 
                
            </nav>
          
        </div>
    </div>
</header>


<!-- END nav -->

<!-- Content -->

    @yield('content')

<!-- End Content -->

<footer style="margin-top: auto;">
    <div id="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                    <p class="fh5co-social-icons">
                        <a href="#"><i class="icon-twitter2"></i></a>
                        <a href="#"><i class="icon-facebook2"></i></a>
                        <a href="#"><i class="icon-instagram"></i></a>
                        <a href="#"><i class="icon-dribbble2"></i></a>
                        <a href="#"><i class="icon-youtube"></i></a>
                    </p>
                    <p>Copyright 2022 MerryMeal ~ Meals on Wheels <a href="#">Charity</a>. All Rights Reserved. <br>Made with <i class="icon-heart3"></i> by <a href="http://freehtml5.co/" target="_blank">Group 1 DEA Team</a> / Demo Images: <a href="https://unsplash.com/" target="_blank">Unsplash</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>


</div>
<!-- END fh5co-page -->

</div>
<!-- END fh5co-wrapper -->

<!-- jQuery -->

<script src="js/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="js/jquery.waypoints.min.js"></script>
<script src="../js/sticky.js"></script>

<!-- Stellar -->
<script src="js/jquery.stellar.min.js"></script>
<!-- Superfish -->
<script src="js/hoverIntent.js"></script>
<script src="js/superfish.js"></script>

<!-- Main JS -->
<script src="js/main.js"></script>

  <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>
</html>

