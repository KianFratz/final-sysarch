<?php

use App\Http\Controllers\CollegeController;
use App\Http\Controllers\DepartmentController;
use App\Models\College;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/**
     * Team: Pagobo
     * Members: Kian Fratz Pagobo, Jethro Dungog
*/

// college serach route
Route::get('/colleges/search', [CollegeController::class, 'search'])->name('colleges.search');

//department search route
Route::get('/departments/search', [DepartmentController::class, 'search'])->name('departments.search');
Route::resource('colleges', CollegeController::class);
Route::resource('departments', DepartmentController::class);
