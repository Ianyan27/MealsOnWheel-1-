@section('title')
    Welcome
@endsection

@extends('Users.Caregiver.layouts.app')

@section('content')

@if (Session::has('menuCreated'))
<div class="alert alert-warning animate-box" role="alert">
    {{ Session::get('menuCreated') }}
</div>
@endif
    <h1>Caregiver Index</h1>

@endsection