<?php

namespace App\Actions\Fortify;

use App\Models\Admin;
use App\Models\Caregivers;
use App\Models\Customer;
use App\Models\Deliver;
use App\Models\Volunteers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ])->validate();

        $user = new User();
        $user->role = $input['role'];
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->password = Hash::make($input['password']);
        $user->save();

        if ($input['role'] == 'customer') {
            Validator::make($input, [
                'name' => ['required', 'string', 'max:255'],
                'age' => ['required', 'string', 'max:11'],
                'disease' => ['required', 'string', 'max:255'],
                'disability' => ['required', 'string', 'max:255'],
                'address' => ['required', 'string', 'max:255'],
                'phone_number' => ['required', 'string', 'max:255'],
            ])->validate();

            $customer = new Customer();
            $customer->user_id = $user->id;
            $customer->name = $input['name'];
            $customer->age = $input['age'];
            $customer->disease = $input['disease'];
            $customer->disability = $input['disability'];
            $customer->address = $input['address'];
            $customer->phone_number = $input['phone_number'];
            $customer->save();
        }

        if ($input['role'] == 'caregiver') {
            $caregiver = new Caregivers();
            $caregiver->user_id = $user->id;
            $caregiver->working_day = implode(',', $input['working_day']);
            $caregiver->save();
        }

        if ($input['role'] == 'deliver') {
            Validator::make($input, [
                'rider_phone_number' => ['required', 'string', 'max:255'],
                'vehicle' => ['required', 'string', 'max:255'],
                'company_name' => ['required', 'string', 'max:255'],
                'rider_location' => ['required', 'string', 'max:255'],
            ])->validate();

            $deliver = new Deliver();
            $deliver->user_id = $user->id;
            $deliver->rider_phone_number = $input['rider_phone_number'];
            $deliver->vehicle = $input['vehicle'];
            $deliver->company_name = $input['company_name'];
            $deliver->rider_location = $input['rider_location'];
            $deliver->save();
        }

        if ($input['role'] == 'admin') {
            $admin = new Admin();
            $admin->user_id = $user->id;
            $admin->save();
        }

        if ($input['role'] == 'volunteer') {
            $volunteer = new Volunteers();
            $volunteer->user_id = $user->id;
            $volunteer->volunteer_name = $input['name'];
            $volunteer->email = $input['email'];
            $volunteer->payment = $input['payment'] ?? 'none';
            $volunteer->donation_amount = $input['donation_amount'] ?? null;
            $volunteer->message = $input['message'] ?? null;
            $volunteer->donation_date = null;
            $volunteer->save();
        }

        return $user;
    }
}
