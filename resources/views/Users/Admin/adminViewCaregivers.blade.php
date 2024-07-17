@section('title')
    View All Caregivers
@endsection

@extends('Users.Admin.layouts.app')

@section('content')

<div id="fh5co-services-section">
    <div>
        @if (Session::has('caregiver_deleted'))
            <h4>
                {{ Session::get('caregiver_deleted') }}
            </h4>
        @endif
        @if (Session::has('updated_caregiver'))
            <h4>
                {{ Session::get('updated_caregiver') }}
            </h4>
        @endif
        <div>
            <div>
                <h3>Caregivers</h3>
                <p>All the Caregivers that registered to MerryMeals</p>
            </div>
        </div>
    </div>
    <div>
        <div>
            @foreach ($caregiverData as $caregiver)
                <div>
                    <div>
                        <span><i class="icon-profile-male"></i></span>
                        <h1> {{$caregiver->caregiver_id}} </h1>
                        <h3>{{ DB::table('users')->where('id',$caregiver->user_id)->value('name')}}</h3>
                        <h3>{{ DB::table('users')->where('id',$caregiver->user_id)->value('email')}}</h3>
                        <h3>{{ DB::table('caregivers')->where('user_id',$caregiver->user_id)->value('working_day')}}</h3>
                        <h3>{{ DB::table('meals')->where('caregiver_id',$caregiver->caregiver_id)->value('meal_id')}}</h3>
                    </div>
                    <div>
                        <div>
                            <div>
                                <a href="{{ route('admin#updateCaregivers', $caregiver->user_id) }}"> <input type="submit" value="Update"></a>
                            </div>
                        </div>
                        <div>
                            <div>
                                <a href="{{ route('admin#deleteCaregivers', $caregiver->user_id) }}"> <input type="submit" value="Delete"></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach 
        </div>
    </div>
</div>
@endsection
