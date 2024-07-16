<?php

use App\Http\Controllers\CaregiverController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DeliverController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    if (Auth::check()) {

        if (Auth::user()->role == 'customer') {
            return redirect()->route('customer#index');
        } else if (Auth::user()->role == 'caregiver') {
            return redirect()->route('caregiver#index');
        } else if (Auth::user()->role == 'deliver') {
            return redirect()->route('deliver#index');
        } 
    }
})->name('welcome');

Route::group(['prefix' => 'customer'], function () {
    Route::get('/', [CustomerController::class,'index'])->name('customer#index');
    Route::get('/viewListMeals', [CustomerController::class, 'viewListMeals'])->name('customer#viewListMeals');
});
Route::group(['prefix' => 'caregiver'], function () {
    Route::get('/', [CaregiverController::class,'index'])->name('caregiver#index');
    Route::get('/addNewMeals', [CaregiverController::class, 'addNewMeals'])->name('caregiver#addNewMeals');
    Route::post('/saveMeal', [CaregiverController::class, 'saveMeal'])->name('caregiver#saveMeal');
    Route::get('/viewMeal/{meal_id}', [CaregiverController::class,'viewMeal'])->name('caregiver#viewMeal');
    Route::get('/deleteMeal/{meal_id}', [CaregiverController::class,'deleteMeal'])->name('caregiver#deleteMeal');
    Route::get('/updateMeal/{meal_id}', [CaregiverController::class,'updateMeal'])->name('caregiver#updateMeal');
    Route::post('/saveUpdate/{meal_id}', [CaregiverController::class,'saveUpdate'])->name('caregiver#saveUpdate');
    Route::get('/updateProfile/{id}', [CaregiverController::class,'updateProfile'])->name('caregiver#updateProfile');
    Route::post('/updateProfile/{id}', [CaregiverController::class,'saveProfile'])->name('caregiver#saveProfile');
});
Route::group(['prefix' => 'deliver'], function () {
    Route::get('/', [DeliverController::class,'index'])->name('deliver#index');
});