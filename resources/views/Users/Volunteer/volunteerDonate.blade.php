@extends('Users.Volunteer.layouts.app')

@section('title')
    Deliver
@endsection

@section('content')
    <h1>Delivery Donate</h1>
    <div class="container">
        <h1>Donate</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($hasDonated)
            <p>You have already made a donation.</p>
        @else
            <form action="{{ route('volunteer#donate') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="donation_amount">Donation Amount</label>
                    <input type="number" class="form-control" id="donation_amount" name="donation_amount" required>
                </div>
                <div class="form-group">
                    <label for="message">Message (optional)</label>
                    <textarea class="form-control" id="message" name="message"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Donate</button>
            </form>
        @endif
    </div>
@endsection
