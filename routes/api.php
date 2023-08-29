<?php

use App\Http\Controllers\API\CompanyController;
use App\Http\Controllers\API\DirectoratController;
use App\Http\Controllers\API\JobGradeController;
use App\Http\Controllers\API\LocationController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\SectionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [UserController::class, 'fetch']);
    Route::post('logout', [UserController::class, 'logout']);
    // Route::get('location', [LocationController::class, 'all']);

    // Company
    Route::get('company', [CompanyController::class, 'index']);
    Route::post('company/', [CompanyController::class, 'store']);
    Route::put('company/{id}', [CompanyController::class, 'update']);
    Route::delete('company/{id}', [CompanyController::class, 'destroy']);

    // Location
    Route::get('location', [LocationController::class, 'index']);
    Route::post('location/', [LocationController::class, 'store']);
    Route::put('location/{id}', [LocationController::class, 'update']);
    Route::delete('location/{id}', [LocationController::class, 'destroy']);

    // Location
    Route::get('directorat', [DirectoratController::class, 'index']);
    Route::post('directorat/', [DirectoratController::class, 'store']);
    Route::put('directorat/{id}', [DirectoratController::class, 'update']);

    // Job Grade
    Route::get('job-grade', [JobGradeController::class, 'index']);
    Route::post('job-grade/', [JobGradeController::class, 'store']);
    Route::put('job-grade/{id}', [JobGradeController::class, 'update']);

    // Employee
    Route::get('employee', [EmployeeController::class, 'index']);
    Route::post('employee/', [EmployeeController::class, 'store']);
    Route::put('employee/{id}', [EmployeeController::class, 'update']);

    // Position
    Route::get('position', [PositionController::class, 'index']);
    Route::post('position/', [PositionController::class, 'store']);
    Route::put('position/{id}', [PositionController::class, 'update']);

    // Division
    Route::get('division', [DivisionController::class, 'index']);
    Route::post('division/', [DivisionController::class, 'store']);
    Route::put('division/{id}', [DivisionController::class, 'update']);

    // Section
    Route::get('section', [SectionController::class, 'index']);
    Route::post('section/', [SectionController::class, 'store']);
    Route::put('section/{id}', [SectionController::class, 'update']);
});
