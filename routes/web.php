<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CaregiverController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DeliverController;
use App\Http\Controllers\OrderController;
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
        } else if (Auth::user()->role == 'admin') {
            return redirect()->route('admin#index');;
        }
    }
})->name('welcome');

Route::group(['prefix' => 'customer'], function () {
    Route::get('/', [CustomerController::class, 'index'])->name('customer#index');
    Route::get('/viewListMeals', [CustomerController::class, 'viewListMeals'])->name('customer#viewListMeals');
    Route::get('/viewMeal/{meal_id}', [CustomerController::class, 'viewMeal'])->name('customer#viewMeal');
    Route::get('/orderMeal/{caregiver_id}/{meal_id}/{user_id}', [CustomerController::class, 'orderMeal'])->name('customer#orderMeal');
    Route::post('/saveOrder', [OrderController::class, 'saveOrder'])->name('order#saveOrder');
    Route::get('/updateProfile/{customer_id}', [CustomerController::class, 'updateProfile'])->name('customer#updateProfile');
    Route::post('/profileUpdated/{user_id}', [CustomerController::class, 'saveUpdatedProfile'])->name('customer#profileUpdated');
    Route::get('/feedback/{user_id}/{meal_id}', [CustomerController::class, 'feedback'])->name('customer#feedback');
    Route::post('/saveFeedback', [CustomerController::class,'saveFeedback'])->name('customer#saveFeedback');
});
Route::group(['prefix' => 'caregiver'], function () {
    Route::get('/', [CaregiverController::class, 'index'])->name('caregiver#index');
    Route::get('/addNewMeals', [CaregiverController::class, 'addNewMeals'])->name('caregiver#addNewMeals');
    Route::post('/saveMeal', [CaregiverController::class, 'saveMeal'])->name('caregiver#saveMeal');
    Route::get('/viewMeal/{meal_id}', [CaregiverController::class, 'viewMeal'])->name('caregiver#viewMeal');
    Route::get('/deleteMeal/{meal_id}', [CaregiverController::class, 'deleteMeal'])->name('caregiver#deleteMeal');
    Route::get('/updateMeal/{meal_id}', [CaregiverController::class, 'updateMeal'])->name('caregiver#updateMeal');
    Route::post('/saveUpdate/{meal_id}', [CaregiverController::class, 'saveUpdate'])->name('caregiver#saveUpdate');
    Route::get('/updateProfile/{id}', [CaregiverController::class, 'updateProfile'])->name('caregiver#updateProfile');
    Route::post('/updateProfile/{id}', [CaregiverController::class, 'saveProfile'])->name('caregiver#saveProfile');
});
Route::group(['prefix' => 'deliver'], function () {
    Route::get('/', [DeliverController::class, 'index'])->name('deliver#index');
    Route::get('/updateDelivery/{id}', [DeliverController::class, 'updateDelivery'])->name('delivery#updateDelivery');
});


Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin#index');
    Route::get('/viewMeals', [AdminController::class, 'viewMeals'])->name('admin#viewMeals');
    Route::get('/viewCustomers', [AdminController::class, 'viewCustomer'])->name('admin#viewCustomers');
    Route::get('/viewCaregivers', [AdminController::class, 'viewCaregiver'])->name('admin#viewCaregivers');
    Route::get('/viewDelivers', [AdminController::class, 'viewDeliver'])->name('admin#viewDelivers');
    Route::get('/viewOrders', [AdminController::class, 'viewOrder'])->name('admin#viewOrders');
    Route::get('/viewFeedbacks', [AdminController::class, 'viewFeedback'])->name('admin#viewFeedback');
    Route::get('/updateMeals/{meal_id}', [AdminController::class,'updateMeal'])->name('admin#updateMeal');
    Route::post('/updatedMeal/{meal_id}', [AdminController::class, 'updatedMeal'])->name('admin#updatedMeal');
    Route::get('/deleteMeal/{meal_id}', [AdminController::class,'deleteMeal'])->name('admin#deleteMeal');
    Route::get('/addNewMeal', [AdminController::class, 'addNewMeal'])->name('admin#addNewMeal');
    Route::post('/saveNewMeal', [AdminController::class,'saveNewMeal'])->name('admin#saveNewMeal');

    Route::get('/updateCaregivers/{id}', [AdminController::class,'updateCaregivers'])->name('admin#updateCaregivers');
    Route::post('/updatedCaregivers/{id}', [AdminController::class,'updatedCaregivers'])->name('admin#updatedCaregivers');
    Route::get('/deleteCaregivers/{user_id}', [AdminController::class,'deleteCaregivers'])->name('admin#deleteCaregivers');

    Route::get('/updateCustomers/{id}', [AdminController::class,'updateCustomers'])->name('admin#updateCustomers');
    Route::post('/updatedCustomer/{id}', [AdminController::class,'updatedCustomer'])->name('admin#updatedCustomer');
    Route::get('/deleteCustomers/{user_id}', [AdminController::class,'deleteCustomers'])->name('admin#deleteCustomers');

    Route::get('/updateDeliver/{deliver_id}', [AdminController::class,'updateDeliver'])->name('admin#updateDeliver');
    Route::get('/updatedDeliver', [AdminController::class,'updatedDeliver'])->name('admin#updatedDeliver');
    Route::get('/deleteDeliver/{deliver_id}', [AdminController::class,'deleteDeliver'])->name('admin#deleteDeliver');
});
