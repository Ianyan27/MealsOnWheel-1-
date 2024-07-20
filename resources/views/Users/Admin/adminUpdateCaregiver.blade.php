@section('title')
    Update Profile
@endsection

@extends('Users.Admin.layouts.app')

@section('content')
<div id="fh5co-services-section" class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h3 class="text-center mb-4">User Information</h3>
                        <form action="{{ route('admin#updatedCaregivers', $userData->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input id="name" name="name" class="form-control" type="text" value="{{ old('name', $userData->name) }}" required />
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" name="email" class="form-control" type="email" value="{{ old('email', $userData->email) }}" required />
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('admin#index') }}" class="btn btn-secondary ml-2">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection