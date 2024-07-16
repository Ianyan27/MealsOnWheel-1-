<?php

namespace App\Http\Controllers;

use App\Models\Caregivers;
use App\Models\Meals;
use App\Models\User;
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
    public function index(){
        $caregiverData = Caregivers::where('user_id', Auth::id())->first();
        return view('Users.Caregiver.caregiverIndex')->with(['caregiverData' => $caregiverData]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        //
    }

    public function addNewMeals(){
        $caregiverData = Caregivers::where('user_id', Auth::id())->first();
        $userData = User::get();
        return view('Users.Caregiver.caregiverAddNewMeal')->with(['caregiverData' => $caregiverData, 'userData' => $userData]);
    }

    public function saveMeal(Request $request)
    {
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
        return redirect()->route('caregiver#index')->with(['mealAdded' => 'Meal Has Been Created Sucessfully!']);
    }
}
