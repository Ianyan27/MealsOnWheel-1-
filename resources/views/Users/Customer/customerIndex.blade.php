@section('title')
    Welcome
@endsection

@extends('Users.Customer.layouts.app')

@section('content')

    @if (Session::has('orderCreated'))
		<div class="alert alert-warning animate-box" role="alert">
            orders created
		</div>
	@endif
    @if (Session::has('feedback_sent'))
            <h4 class="alert alert-warning animate-box" role="alert">
                {{ Session::get('feedback_sent') }}
            </h4>
        @endif
    <h1>Customer Index</h1>

@endsection