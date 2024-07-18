@section('title')
    Welcome
@endsection

@extends('Users.Customer.layouts.app')

@section('content')
    @if (Session::has('orderCreated'))
        <div class="alert alert-warning animate-box" role="alert">
            {{ Session::get('orderCreated') }}<a href="{{ route('customer#showOrderDelivery', Auth()->user()->id) }}"> Click
                here to view your order delivery status</a>
        </div>
    @endif
    @if (Session::has('feedback_sent'))
        <h4 class="alert alert-warning animate-box" role="alert">
            {{ Session::get('feedback_sent') }}
        </h4>
    @endif
    <h1>Customer Index</h1>
@endsection
