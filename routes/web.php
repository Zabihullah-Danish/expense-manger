<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\IncomeCategoryController;
use App\Http\Controllers\ExpenseCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function(){

    Route::get('/dashboard',function(){
        return view('dashboard');
    })->name('dashboard');
    
    // accounts route
    Route::resource('accounts',AccountController::class);

    Route::get('/logout',[AuthController::class,'logout'])->name('logout');

    // update profile
    Route::get('/profile/update',[AuthController::class,'profile'])->name('profile');
    Route::post('/profile/update/{id}',[AuthController::class,'updateProfile'])->name('updateProfile');

    //income and expense routes
    // Route::get('/incomes',[IncomeController::class,'index'])->name('incomes.index');
    // Route::get('/incomes/create',[IncomeController::class,'create'])->name('incomes.create');
    // Route::get('/incomes/edit/{income}',[IncomeController::class,'edit'])->name('incomes.edit');

    Route::resource('incomes',IncomeController::class);
    Route::resource('expenses',ExpenseController::class);
    //income and expense category
    Route::resource('/income-categories',IncomeCategoryController::class);
    Route::resource('/expense-categories',ExpenseCategoryController::class);

});

Route::view('/layout','components.layout.layout');
Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/login', [AuthController::class,'authenticate'])->name('authenticate');
Route::get('/register',[AuthController::class,'register'])->name('register');
Route::post('/register',[AuthController::class,'registeration'])->name('registeration');


Route::get('/livewire', function(){
    return view('livewire');
});



Route::fallback(function(){
    return "Not Found";
});