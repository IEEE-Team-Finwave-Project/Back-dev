<?php

use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\CharityController;
use App\Http\Controllers\API\ContactController;
use App\Http\Controllers\API\GoalController;
use App\Http\Controllers\API\IncomeController;
use App\Http\Controllers\API\InvestmentController;
use App\Http\Controllers\API\ProfileController;
use App\Http\Controllers\API\PurchaseController;
use App\Http\Controllers\API\ReportController;
use App\Http\Controllers\API\StatisticController;
use App\Http\Controllers\API\TransactionController;
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

Route::apiResource('profiles', ProfileController::class)->except('index');
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
Route::post('contact', [ContactController::class, 'store']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
