<?php

namespace App\Http\Controllers;

use App\Models\Caregivers;
use App\Models\Customer;
use App\Models\Deliver;
use App\Models\Feedback;
use App\Models\Meals;
use App\Models\Orders;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        $adminData = User::where('id', Auth::id())->first();
        return view ('Users.Admin.adminIndex')->with(['adminData' => $adminData]);
    }
    public function viewMeals(){
        $mealData = Meals::get();
        return view ('Users.Admin.adminViewMeals')->with(['mealData' => $mealData]);
    }
    public function viewCustomer(){
        $customerData = Customer::get();
        return view ('Users.Admin.adminViewCustomers')->with(['customerData'=> $customerData]);
    }
    public function viewCaregiver(){
        $caregiverData = Caregivers::get();
        return view ('Users.Admin.adminViewCaregivers')->with(['caregiverData'=> $caregiverData]);
    }
    public function viewDeliver(){
        $deliverData = Deliver::get();
        return view ('Users.Admin.adminViewDeliver')->with(['deliverData' => $deliverData]);
    }
    public function viewOrder(){
        $orderData = Orders::get();
        return view('Users.Admin.adminViewOrders')->with(['orderData' => $orderData]);
    }
    public function viewFeedback(){
        $feedbackData = Feedback::get();
        return view ('Users.Admin.adminViewFeedbacks')->with(['feedbackData' => $feedbackData]);
    }
}
