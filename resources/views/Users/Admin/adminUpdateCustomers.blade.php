@section('title')
Update Customer
@endsection

@extends('Users.Admin.layouts.app')

@section('content')
    <div id="fh5co-services-section" class="py-5">
        <div class="container">
            @if (Session::has('update_success'))
                <div class="alert alert-warning text-center" role="alert">
                    {{ Session::get('update_success') }}
                </div>
            @endif
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h3 class="text-center">General Information</h3>
                            <form action="{{ route('admin#updatedCustomer', $userData->id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input id="name" name="name" class="form-control" type="text" readonly value="{{ old('name', $userData->name) }}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" name="email" class="form-control" type="text" readonly value="{{ old('email', $userData->email) }}">
                                </div>
                                <div class="form-group">
                                    <label for="age">Age</label>
                                    <input id="age" name="age" class="form-control" type="number" min="18" max="105" value="{{ old('age', $customerData->age) }}">
                                </div>
                                <div class="form-group">
                                    <label for="disease">Disease</label>
                                    <input id="disease" name="disease" class="form-control" type="text" value="{{ old('disease', $customerData->disease) }}">
                                </div>
                                <div class="form-group">
                                    <label for="disability">Disability</label>
                                    <input id="disability" name="disability" class="form-control" type="text" value="{{ old('disability', $customerData->disability) }}">
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input id="address" name="address" class="form-control" type="text" value="{{ old('address', $customerData->address) }}">
                                </div>
                                <div class="form-group">
                                    <label for="phone_number">Contact</label>
                                    <input id="phone_number" name="phone_number" class="form-control" type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" value="{{ old('phone_number', $customerData->phone_number) }}">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{ route('customer#index') }}" class="btn btn-secondary ml-2">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection