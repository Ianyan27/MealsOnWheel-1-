@section('title')
    View All Customer
@endsection

@extends('Users.Admin.layouts.app')

@section('content')
		
<div id="fh5co-services-section" class="py-5">
    <div class="container">
      @if (Session::has('dataInform'))
        <div class="alert alert-warning" role="alert">
          {{ Session::get('dataInform') }}
        </div>
      @endif
      @if (Session::has('update_customer'))
        <div class="alert alert-warning" role="alert">
          {{ Session::get('update_customer') }}
        </div>
      @endif
      @if (Session::has('delete_customer'))
        <div class="alert alert-warning" role="alert">
          {{ Session::get('delete_customer') }}
        </div>
      @endif
      <div class="row mb-4">
        <div class="col-md-8 offset-md-2 text-center">
          <h3>Customer</h3>
          <p>All the customers that registered to MerryMeals</p>
        </div>
      </div>
      <div class="row text-center">
        @foreach ($customerData as $customer)
          <div class="col-md-4 mb-4">
            <div class="card shadow-sm p-3 mb-3 bg-white rounded">
              <div class="card-body">
                <span><i class="icon-profile-male"></i></span>
                <h5 class="card-title">Customer ID: {{$customer->customer_id}}</h5>
                <p class="card-text">Name: {{ DB::table('users')->where('id', $customer->user_id)->value('name')}}</p>
                <p class="card-text">Email: {{ DB::table('users')->where('id', $customer->user_id)->value('email')}}</p>
                <p class="card-text">Age: {{ DB::table('customers')->where('user_id', $customer->user_id)->value('age')}}</p>
                <p class="card-text">Disease: {{ DB::table('customers')->where('user_id', $customer->user_id)->value('disease')}}</p>
                <p class="card-text">Disability: {{ DB::table('customers')->where('user_id', $customer->user_id)->value('disability')}}</p>
                <p class="card-text">Address: {{ DB::table('customers')->where('user_id', $customer->user_id)->value('address')}}</p>
                <p class="card-text">Phone Number: {{ DB::table('customers')->where('user_id', $customer->user_id)->value('phone_number')}}</p>
                <a href="{{ route('admin#updateCustomers', $customer->user_id) }}" class="btn btn-primary">Update</a>
                <a href="{{ route('admin#deleteCustomers', $customer->user_id) }}" class="btn btn-danger ml-2">Delete</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
  
@endsection