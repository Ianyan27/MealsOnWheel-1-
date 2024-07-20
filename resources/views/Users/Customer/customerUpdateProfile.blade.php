@section('title')
    Welcome
@endsection

@extends('Users.Customer.layouts.app')

@section('content')
<div id="fh5co-services-section">
    @if (Session::has('update_succ'))
        <div class="alert alert-warning text-center animate-box" role="alert">
            {{ Session::get('update_succ') }}
        </div>
    @endif

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="animate-box">
                    <div class="col-md-12">
                        <h3 class="text-center">General Information</h3>
                        <form action="{{ route('customer#profileUpdated', $userData->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="userManagement" for="name">Name</label>
                                <input id="name" name="name" class="form-control" type="text" value="{{ old('name', $userData->name) }}"/>
                            </div>

                            <div class="form-group">
                                <label class="userManagement" for="email">Email</label>
                                <input id="email" name='email' class="form-control" type="email" value="{{ old('email', $userData->email) }}"/>
                            </div>

                            <div class="form-group">
                                <label class="userManagement" for="age">Age</label>
                                <input id="age" name="age" class="form-control" type="text" value="{{ old('age', $customerData->age) }}"/>
                            </div>

                            <div class="form-group">
                                <label class="userManagement" for="disease">Disease</label>
                                <input id="disease" name="disease" class="form-control" type="text" value="{{ old('disease', $customerData->disease) }}"/>
                            </div>

                            <div class="form-group">
                                <label class="userManagement" for="disability">Disability</label>
                                <input id="disability" name="disability" class="form-control" type="text" value="{{ old('disability', $customerData->disability) }}"/>
                            </div>

                            <div class="form-group">
                                <label class="userManagement" for="address">Address</label>
                                <input id="address" name="address" class="form-control" type="text" value="{{ old('address', $customerData->address) }}"/>
                            </div>

                            <div class="form-group">
                                <label class="userManagement" for="phone_number">Contact</label>
                                <input id="phone_number" name='phone_number' class="form-control" type="text" value="{{ old('phone_number', $customerData->phone_number) }}"/>
                            </div>

                            <div class="text-center mt-4"> 
                                <button type="submit" class="btn btn-primary">Update</button> &nbsp;
                                <a href="{{ route('customer#index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection