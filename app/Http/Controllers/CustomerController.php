<?php

namespace App\Http\Controllers;

use App\Models\Caregivers;
use App\Models\Customer;
use App\Models\Meals;
use App\Models\User;
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
