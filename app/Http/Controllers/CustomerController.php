<?php

namespace App\Http\Controllers;

use App\Models\Caregivers;
use App\Models\Customer;
use App\Models\Meals;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $customerData = Customer::where('user_id', Auth::id())->first();
        return view ('Users.Customer.customerIndex')->with(['customerData' => $customerData]);
    }
    public function updateProfile($id){
        $customerData = Customer::where('user_id',$id)->first();
        $userData = User::where('id', $id)->first();
        return view('Users.Customer.customerUpdateProfile')->with(['customerData' => $customerData, 'userData' => $userData]);
    }
    public function saveUpdatedProfile(Request $request, $user_id){
        $updateUserData = $this->requestUpdateUserData($request);
        User::where('id', $user_id)->update($updateUserData);
        $updateCustomerData = $this->requestUpdateCustomerData($request);
        Customer::where('user_id', $user_id)->update($updateCustomerData);
        return back()->with(['update_succ' => 'Profile successfully updated!']);
    }
    private function requestUpdateUserData($request){
        $customerArray = [
            'name' => $request->name,
            'email'=> $request->email,
            'created_at' => Carbon::now(),
            'updated_at'=> Carbon::now()
        ];
        return $customerArray;
    }
    private function requestUpdateCustomerData($request){
        $customerArray = [
            'phone_number'=> $request->phone_number,
            'address' => $request->address,
            'age'=> $request->age,
            'disease'=> $request->disease,
            'disability'=> $request->disability,
            'created_at' => Carbon::now(),
            'updated_at'=> Carbon::now()
        ];
        return $customerArray;
    }
    public function viewListMeals(){
        $mealList = Meals::all();
        return view ('Users.Customer.customerMealList')->with(['mealList'=> $mealList]);
    }
    public function viewMeal($meal_id){
        $caregiverData = Caregivers::get();
        $userData = User::get();
        $customerData = Customer::where('user_id', Auth::id())->first();
        $mealData = Meals::where('meal_id', $meal_id)->first();
        return view ('Users.Customer.customerViewMeal')->with([
            'caregiverData' => $caregiverData,
            'userData'=> $userData,
            'mealData'=> $mealData, 
            'customerData'=> $customerData]);
    }
    public function orderMeal($caregiver_id, $meal_id, $user_id){
        $careGiverData = Caregivers::where('caregiver_id', $caregiver_id)->first();
        $mealData = Meals::where('meal_id', $meal_id)->first();
        $userData = User::where('id', $user_id)->first();
        $customerData = Customer::where('user_id', $user_id)->first();
        return view('Users.Customer.customerOrderMeal')->with([
            'caregiverData' => $careGiverData,
            'mealData' => $mealData,
            'userData' => $userData,
            'customerData' => $customerData,
        ]);
    }
}
