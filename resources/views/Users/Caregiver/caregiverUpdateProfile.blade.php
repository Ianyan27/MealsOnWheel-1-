@extends('Users.Caregiver.layouts.app')

@section('title')
    Update Profile
@endsection

@section('content')
    <div class="py-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title">User Information</h3>
              <form action="{{ route('caregiver#saveProfile', $userData->id) }}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="name" class="userManagement">Name</label>
                  <input name="name" id="name" class="form-control" type="text" value="{{ old('name', $userData->name) }}" required>
                </div>
                <div class="form-group">
                  <label for="email" class="userManagement">Email</label>
                  <input name="email" id="email" class="form-control" type="email" value="{{ old('email', $userData->email) }}" required>
                </div>
                <div class="form-group">
                  <label for="working_day" class="userManagement">Working Day</label>
                  <input name="working_day" id="working_day" class="form-control" type="text" value="{{ old('working_day', $caregiverData->working_day) }}" readonly>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Update</button>
                  <a href="{{ route('caregiver#index') }}" class="btn btn-secondary">Cancel</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
@endsection
