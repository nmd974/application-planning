<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPromotionController;
use App\Models\User;

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

Route::get('/', [PromotionController::class, 'index']);
Route::get('/{vue}', [PromotionController::class, 'index'])->name("getPromotions");

Route::get("/promotion/{id}", [PromotionController::class, 'dataPromotion'])->name("usersByPromotion");
Route::post('/promotion/create', [PromotionController::class, 'store'])->name("promotion.store");

Route::post("/eleve/create", [UserController::class, 'store'])->name("users.store");
Route::post("/eleve/update/{id}", [UserController::class, 'update'])->name("users.update");

Route::delete("/eleve/delete/{id}", [UserPromotionController::class, 'destroy'])->name("user_promotions.destroy");

