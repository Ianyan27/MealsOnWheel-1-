<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Caregivers;
use App\Models\Customer;
use App\Models\Deliver;
use App\Models\Feedback;
use App\Models\Meals;
use App\Models\Orders;
use App\Models\User;
use Carbon\Carbon as CarbonCarbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

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
    public function updateMeal($meal_id){
        $caregiverData = Caregivers::get();
        $userData = User::get();
        $updateMeal = Meals::where('meal_id', $meal_id)->first();
        return view ('Users.Admin.adminUpdateMeal')->with(['caregiverData'=>$caregiverData, 'userData'=>$userData, 'updateMeal'=>$updateMeal]);
    }
    public function updatedMeal(Request $request, $meal_id){
        $updateData = $this->requestUpdateMeal($request);
        $updateImage = Meals::select('meal_image')->where('meal_id', $meal_id)->first();
        $updateImage = $updateImage['meal_image'];
        if (File::exists(public_path() . '/uploads/meal/' . $updateImage)) {
            File::delete(public_path() . '/uploads/meal/' . $updateImage);
        }
        $newImageFile = $request->file('meal_image');
        $newImageName = uniqid() . '_' . $newImageFile->getClientOriginalName();
        $newImageFile->move(public_path('./uploads/meal'), $newImageName);
        $updateData['meal_image'] = $newImageName;
        Meals::where('meal_id', $meal_id)->update($updateData);
        return redirect()->route('admin#viewMeals')->with(['meal_updated' => 'Meal Successfully Updated']);
    }
    private function requestUpdateMeal($request){
        $mealArray = [
            'meal_name' => $request->meal_name,
            'meal_description' => $request->meal_description,
            'caregiver_id' => $request->caregiver_id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        if (isset($request->meal_image)) {
            $menuArray['menu_image'] = $request->menu_image;
        }

        return $mealArray;
    }
    public function deleteMeal($meal_id){
        $deleteData = Meals::select('meal_image')->where('meal_id', $meal_id)->first();
        $deleteImage = $deleteData['meal_image'];
        Meals::where('meal_id', $meal_id)->delete();
        if (File::exists(public_path() . '/uploads/meal/' . $deleteImage)) {
            File::delete(public_path() . '/uploads/meal/' . $deleteImage);
        }
        return redirect()->route('admin#viewMeals')->with(['meal_deleted'=> 'Meal has been deleted successfully']);
    }
    public function addNewMeal(){
        $caregiverData = Caregivers::where('user_id', Auth::id())->first();
        $userData = User::get();
        return view('Users.Admin.adminAddNewMeal')->with(['caregiverData' => $caregiverData, 'userData' => $userData]);
    }
    public function saveNewMeal(Request $request){
        $validator = Validator::make($request->all(), [
            'meal_name' => 'required',
            'meal_description' => 'required',
            'meal_image' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $meal = new Meals();
        if ($request->hasfile('meal_image')) {
            $imageFile = $request->file('meal_image');
            $imageName = uniqid() . '_' . $imageFile->getClientOriginalName();
            $imageFile->move(public_path('/uploads/meal'), $imageName);
            $meal->meal_image = $imageName;
        }

        $meal->meal_name = $request->input('meal_name');
        $meal->meal_description = $request->input('meal_description');
        $meal->caregiver_id = $request->input('caregiver_id');
        $meal->save();
        return redirect()->route('admin#viewMeals')->with(['new_meal_added' => 'Meal Has Been Created Sucessfully!']);
    }
}
