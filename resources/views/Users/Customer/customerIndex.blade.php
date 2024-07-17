@section('title')
    Welcome
@endsection

@extends('Users.Customer.layouts.app')

@section('content')

    @if (Session::has('orderCreated'))
		<div class="alert alert-warning animate-box" role="alert">
			{{-- {{ Session::get('orderCreated') }}<a href="{{ route('order#showOrderDelivery', Auth()->user()->id) }}"> Click here to view your order delivery status</a> --}}
            orders created
		</div>
	@endif
    <h1>Customer Index</h1>

@endsection