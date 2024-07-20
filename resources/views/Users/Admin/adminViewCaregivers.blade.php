@section('title')
    View All Caregivers
@endsection

@extends('Users.Admin.layouts.app')

@section('content')
<div id="fh5co-services-section" class="py-5">
    <div class="container">
        @if (Session::has('caregiver_deleted'))
            <div class="alert alert-warning text-center" role="alert">
                {{ Session::get('caregiver_deleted') }}
            </div>
        @endif
        @if (Session::has('updated_caregiver'))
            <div class="alert alert-warning text-center" role="alert">
                {{ Session::get('updated_caregiver') }}
            </div>
        @endif
        <div class="text-center mb-4">
            <h3>Caregivers</h3>
            <p>All the Caregivers registered with MerryMeals</p>
        </div>
        <div class="row">
            @foreach ($caregiverData as $caregiver)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <span><i class="icon-profile-male"></i></span>
                            <h5 class="card-title">ID: {{$caregiver->caregiver_id}}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ DB::table('users')->where('id',$caregiver->user_id)->value('name') }}</h6>
                            <p class="card-text">{{ DB::table('users')->where('id',$caregiver->user_id)->value('email') }}</p>
                            <p class="card-text">Working Day: {{ DB::table('caregivers')->where('user_id',$caregiver->user_id)->value('working_day') }}</p>
                            <p class="card-text">Meal ID: {{ DB::table('meals')->where('caregiver_id',$caregiver->caregiver_id)->value('meal_id') }}</p>
                            <a href="{{ route('admin#updateCaregivers', $caregiver->user_id) }}" class="btn btn-primary">Update</a>
                            <a href="{{ route('admin#deleteCaregivers', $caregiver->user_id) }}" class="btn btn-danger ml-2">Delete</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
