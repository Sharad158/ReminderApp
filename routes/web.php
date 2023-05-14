<?php

use Illuminate\Support\Facades\Route;

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
Auth::routes();

Route::middleware(['auth'])->group(function () {
    
    Route::get('/', function () {
        return redirect('reminders');
    });

    Route::resource('/reminders',App\Http\Controllers\ReminderController::class);


    // Route::get('new_employee',[App\Http\Controllers\ReminderController::class,'create'])->name('create');

    // Route::POST('/employee_submit', [App\Http\Controllers\ReminderController::class, 'store'])->name('submit');
    // Route::post('get_city',[ReminderController::class,'get_city'])->name('get_city');

    // Route::get('employee_edit/{id}',[App\Http\Controllers\ReminderController::class, 'edit'])->name('edit');
    // Route::POST('employee_update/{id}',[App\Http\Controllers\ReminderController::class, 'update'])->name('update'); 
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
