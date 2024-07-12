<?php

namespace App\Actions\Fortify;

use App\Models\Caregivers;
use App\Models\Customer;
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
     * @param  array<string, string>  $input
     */
    public function create(array $input): Customer
    {
        Validator::make($input, [
            
        ])->validate();

        $customer = new Customer();
        $customer->role = $input['role'];
        $customer->name = $input['name'];
        $customer->email = $input['email'];
        $customer->password = Hash::make($input['password']);
        $customer->age = $input['age'];
        $customer->disease= $input['disease'];
        $customer->disability = $input['disability'];
        $customer->address = $input['address'];
        $customer->save();
        return $customer;

        if($input['role'] == 'caregiver'){
            Validator::make($input, [
                'name' => ['required','string','255'],
                'email'=> ['required','string','255'],
                'password'=> ['required','string','255'],
                'working_day'=> ['required','string','255'],
            ])->validate();

            $caregiver = new Caregivers();
            $caregiver->user_id =$customer->id;
            $caregiver->role = $input['role'];
            $caregiver->name = $input['name'];
            $caregiver->email = $input['email'];
            $caregiver->password = Hash::make($input['password']);
            $caregiver->working_day = $input['working_day'];
            $caregiver->save();
        }
    }
}
