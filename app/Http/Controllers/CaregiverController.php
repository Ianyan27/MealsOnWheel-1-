<?php

namespace App\Http\Controllers;

use App\Models\Caregivers;
use App\Models\Customer;
use App\Models\Meals;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CaregiverController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $caregiverData = Caregivers::where('user_id', Auth::id())->first();
        $mealData = Meals::all()->where('caregiver_id', $caregiverData->caregiver_id);
        return view('Users.Caregiver.caregiverIndex')->with(['caregiverData' => $caregiverData, 'mealData' => $mealData]);
    }
    public function addNewMeals()
    {
        $caregiverData = Caregivers::where('user_id', Auth::id())->first();
        $userData = User::get();
        return view('Users.Caregiver.caregiverAddNewMeal')->with(['caregiverData' => $caregiverData, 'userData' => $userData]);
    }
    public function saveMeal(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'meal_name' => 'required',
            'meal_description' => 'required',
            'meal_image' => 'required|image',
            'meal_type' => 'required',
            'day' => 'required',
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
        $meal->meal_type = $request->input('meal_type');
        $meal->day = $request->input('day');
        $meal->caregiver_id = $request->input('caregiver_id');
        $meal->save();

        return redirect()->route('caregiver#index')->with(['meal_added' => 'Meal Has Been Created Successfully!']);
    }

    public function viewMeal($meal_id)
    {
        $caregiverData = Caregivers::get();
        $customerData = Customer::get();
        $viewMeal = Meals::where('meal_id', $meal_id)->first();
        return view('Users.Caregiver.caregiverViewMeal')->with(['caregiverData' => $caregiverData, 'customerData' => $customerData, 'viewMeal' => $viewMeal]);
    }
    public function deleteMeal($meal_id)
    {
        $deleteData = Meals::select('meal_image')->where('meal_id', $meal_id)->first();
        $deleteImage = $deleteData['meal_image'];
        Meals::where('meal_id', $meal_id)->delete();
        if (File::exists(public_path() . '/uploads/meal/' . $deleteImage)) {
            File::delete(public_path() . '/uploads/meal/' . $deleteImage);
        }
        return redirect()->route('caregiver#index')->with(['mealDeleted' => 'Meal has been deleted successfully']);
    }
    public function updateMeal($meal_id)
    {
        $caregiverData = Caregivers::where('user_id', Auth::id())->first();
        $customerData = Customer::get();
        $updateMeal = Meals::where('meal_id', $meal_id)->first();
        return view('Users.Caregiver.caregiverUpdateMeal')->with(['caregiverData' => $caregiverData, 'customerData' => $customerData, 'updateMeal' => $updateMeal]);
    }
    public function saveUpdate(Request $request, $meal_id)
    {
        $updateData = $this->requestUpdateMealData($request);

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
        return redirect()->route('caregiver#index')->with(['updateData' => 'Meal has been Updated Sucessfully!']);
    }
    public function requestUpdateMEalData(Request $request)
    {
        $mealArray = [
            'meal_name' => $request->meal_name,
            'meal_description' => $request->meal_description,
            'caregiver_id' => $request->caregiver_id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
        if (isset($request->meal_image)) {
            $mealArray['meal_image'] = $request->meal_image;
        }
        return $mealArray;
    }
    public function updateProfile($user_id)
    {
        $caregiverData = Caregivers::where('user_id', $user_id)->first();
        $userData = User::where('id', $user_id)->first();
        return view('Users.Caregiver.caregiverUpdateProfile')->with(['caregiverData' => $caregiverData, 'userData' => $userData]);
    }

    public function saveProfile(Request $request, $user_id)
    {
        $user = User::find($user_id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        return redirect()->route('caregiver#updateProfile', ['id' => $user_id])->with('success', 'Profile updated successfully');
    }
}
