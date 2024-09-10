<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href=" {{asset('CSS/styles.css')}} ">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>
    <nav class="nav-bar">
      <a href="{{ route('admin#index') }}"><img width="75px" height="75px" src="{{ url('/images/mmlogo.png') }}" alt="company logo"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <button class="btn">
        <a class="btn btn-primary nav-item nav-link active mx-2" href="{{ route('admin#index') }}">Home <span class="sr-only">(current)</span></a>
      </button>
      <button class="btn">
        <a class="btn btn-primary nav-item nav-link active mx-2" href=" {{ route('admin#viewMeals') }}"> View Meals</a>
      </button>
      <button class="btn">
        <a class="btn btn-primary nav-item nav-link active mx-2" href=" {{ route('admin#viewCustomers')}}">View Customers</a>
      </button>
      <button class="btn">
        <a class="btn btn-primary nav-item nav-link active mx-2" href=" {{ route('admin#viewCaregivers')}} ">View Caregivers</a>
      </button>
      <button class="btn">
        <a class="btn btn-primary nav-item nav-link active mx-2" href=" {{ route('admin#viewDelivers')}} ">View Deliver</a>
      </button>
      <button class="btn">
        <a class="btn btn-primary nav-item nav-link active mx-2" href=" {{ route('admin#viewOrders')}} ">View Order</a>
      </button>
      <button class="btn">
        <a class="btn btn-primary nav-item nav-link active mx-2" href=" {{ route('admin#viewFeedback')}} ">View Feedbacks</a>
      </button>

      <a class="nav-link dropdown-toggle btn btn-primary mx-2" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ Auth()->user()->name }}
      </a>
      <div class="dropdown-menu p-3" aria-labelledby="navbarDropdownMenuLink">
        <form action="{{ route('logout') }}" method="post">
          @csrf
          <button type="submit" class="btn btn-outline-danger w-100">
              Logout
          </button>
      </form>
      </div>
    </nav>
    <!-- Content -->
    <div class="content-container my-5 px-4">
      @yield('content')
    </div>
    <!-- End Content -->
    <footer style="position: sticky; bottom: 0;">
      <div id="footer" class="bg-dark text-light py-1">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-6 text-center">
              <p class="fh5co-social-icons mb-3">
                <a href="#" class="text-light mx-2"><i class="icon-twitter2"></i></a>
                <a href="#" class="text-light mx-2"><i class="icon-facebook2"></i></a>
                <a href="#" class="text-light mx-2"><i class="icon-instagram"></i></a>
                <a href="#" class="text-light mx-2"><i class="icon-dribbble2"></i></a>
                <a href="#" class="text-light mx-2"><i class="icon-youtube"></i></a>
              </p>
              <p class="mb-0">Copyright 2024 MerryMeal ~ Meals on Wheels 
                <a href="#" class="text-light">Charity</a>. All Rights Reserved. 
                <br>Made with <i class="icon-heart3 text-danger"></i> by 
                <a href="http://freehtml5.co/" target="_blank" class="text-light">Group TeaM</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </footer> 
    <script src="https://kit.fontawesome.com/4d2a01d4ef.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
