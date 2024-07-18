<?php

namespace App\Http\Controllers;

use App\Models\Caregivers;
use App\Models\Customer;
use App\Models\Feedback;
use App\Models\Meals;
use App\Models\Orders;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customerData = Customer::where('user_id', Auth::id())->first();
        return view('Users.Customer.customerIndex')->with(['customerData' => $customerData]);
    }
    public function updateProfile($id)
    {
        $customerData = Customer::where('user_id', $id)->first();
        $userData = User::where('id', $id)->first();
        return view('Users.Customer.customerUpdateProfile')->with(['customerData' => $customerData, 'userData' => $userData]);
    }
    public function saveUpdatedProfile(Request $request, $user_id)
    {
        $updateUserData = $this->requestUpdateUserData($request);
        User::where('id', $user_id)->update($updateUserData);
        $updateCustomerData = $this->requestUpdateCustomerData($request);
        Customer::where('user_id', $user_id)->update($updateCustomerData);
        return back()->with(['update_succ' => 'Profile successfully updated!']);
    }
    private function requestUpdateUserData($request)
    {
        $customerArray = [
            'name' => $request->name,
            'email' => $request->email,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
        return $customerArray;
    }
    private function requestUpdateCustomerData($request)
    {
        $customerArray = [
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'age' => $request->age,
            'disease' => $request->disease,
            'disability' => $request->disability,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
        return $customerArray;
    }
    public function viewListMeals(Request $request)
    {
        $day = $request->input('day');

        $mealList = Meals::when($day, function ($query, $day) {
            return $query->where('day', $day);
        })->get();

        return view('Users.Customer.customerMealList')->with(['mealList' => $mealList]);
    }

    public function viewMeal($meal_id)
    {
        $caregiverData = Caregivers::get();
        $userData = User::get();
        $customerData = Customer::where('user_id', Auth::id())->first();
        $mealData = Meals::where('meal_id', $meal_id)->first();
        $feedback = Feedback::where('meal_id', $meal_id)->first();

        $mealType = $mealData->meal_type;
        $mealDay = $mealData->day;

        $relatedMeals = Meals::where('meal_type', $mealType)
            ->where('day', $mealDay)
            ->where('meal_id', '!=', $meal_id)
            ->get();

        return view('Users.Customer.customerViewMeal')->with([
            'caregiverData' => $caregiverData,
            'userData' => $userData,
            'mealData' => $mealData,
            'customerData' => $customerData,
            'feedback' => $feedback,
            'relatedMeals' => $relatedMeals
        ]);
    }

    public function orderMeal($caregiver_id, $meal_id, $user_id)
    {
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

    public function updateCustomerOrder($id)
    {

        //find selected order
        $order_selected = Orders::where('order_id', $id)->first();

        //save selected order
        if ($order_selected->order_pickup_time == null) {
            $order_selected->order_pickup_time = "Received Well";
        }

        $order_selected->save();

        return redirect()->route('customer#showOrderDelivery', Auth::id());
    }

    public function feedback($user_id, $meal_id)
    {
        $userData = User::where('id', $user_id);
        $mealData = Meals::where('meal_id', $meal_id)->first();
        return view('Users.Customer.customerWriteFeedback')->with(['userData' => $userData, 'mealData' => $mealData]);
    }
    public function saveFeedback(Request $request)
    {
        $feedback = new Feedback();
        $feedback->user_id = $request->input('user_id');
        $feedback->meal_id = $request->input('meal_id');
        $feedback->name = $request->input('name');
        $feedback->feedback = $request->input('feedback');
        $feedback->save();
        return redirect()->route('customer#index')->with('feedback_sent', 'Feedback Successfully Added');
    }
}
