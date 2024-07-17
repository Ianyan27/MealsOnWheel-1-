@section('title')
    Update Profile
@endsection

@extends('Users.Admin.layouts.app')

@section('content')
<div id="fh5co-services-section">
    <div class="container">
        <div class="row display-flex justify-content">
            <div class="col-md-6 col-sm-6 col-md-offset-3">
                <div class="animate-box">
                    <div class="col-md-12">
                        <h3>User Information</h3>
                        <form action="{{ route('admin#updatedCaregivers', $userData->id) }}" method="POST">
                            @csrf
                            <label class="userManagement">Name</label><br>
                            <input name="name" class="input-md col-md-12" type="text" value="{{ old('name', $userData->name) }}"/>

                            <label class="userManagement">Email</label><br>
                            <input name='email' class="input-md col-md-12" type="text" value="{{ old('email', $userData->email) }}"/><br><br>
                            <div class="text-center"> 
                                <button type="submit" class="btn-primary">Update</button> &nbsp;
                                <a href="{{ route('admin#index') }}">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection