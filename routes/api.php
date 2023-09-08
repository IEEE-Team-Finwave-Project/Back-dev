<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\CharityController;
use App\Http\Controllers\API\ContactController;
use App\Http\Controllers\API\GoalController;
use App\Http\Controllers\API\IncomeController;
use App\Http\Controllers\API\InvestmentController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\PurchaseController;
use App\Http\Controllers\API\ReportController;
use App\Http\Controllers\API\StatisticController;
use App\Http\Controllers\API\TransactionController;
use Illuminate\Support\Facades\Route;

//Protected Routes

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout']);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::apiResource('users', UserController::class)->except('index');
Route::apiResource('purchases',PurchaseController::class);
Route::apiResource('investments',InvestmentController::class);
Route::apiResource('incomes', IncomeController::class);
Route::apiResource('transactions', TransactionController::class);
Route::apiResource('goals', GoalController::class);
Route::apiResource('categories', CategoryController::class);
Route::apiResource('reports', ReportController::class);

Route::get('statistics', [StatisticController::class,'index']);
Route::get('statistics/{category}', [StatisticController::class, 'show']);
Route::get('charities', [CharityController::class, 'index']);
Route::get('charities/{charity}', [CharityController::class, 'show']);
Route::post('contact', [ContactController::class, 'store']);


