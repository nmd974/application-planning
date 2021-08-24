<?php

use App\Http\Controllers\ExamActivitieController;
use App\Http\Controllers\ExamController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ActivitieController;
use App\Http\Controllers\UserPromotionController;

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
Route::get('/promotion/archived/{id}', [PromotionController::class, 'destroy']);
Route::get('/promotion/{id}/exams', [PromotionController::class, 'dataPromotionExam'])->name("examsByPromotion");

Route::post('/promotion/{id}/exams/create', [ExamController::class, 'store'])->name("createExamByPromotion");
Route::post('/promotion/{promotion_id}/exams/{exam_id}/delete', [ExamController::class, 'store'])->name("deleteExamByPromotion");

Route::post("/eleve/create", [UserController::class, 'store'])->name("users.store");
Route::patch("/eleve/update/{id}", [UserController::class, 'update'])->name("users.update");

Route::patch("/eleve/{user_id}/promotion/{promotion_id}/delete", [UserPromotionController::class, 'destroy'])->name("user_promotions.destroy");

Route::patch("/exam/update/{id}", [ExamController::class, 'update'])->name("updateExam");

Route::get("/exam/{exam_id}/activities", [ExamActivitieController::class, 'index'])->name("getActivitiesByExam");
Route::post("/exam/{exam_id}/activities/create", [ActivitieController::class, 'store'])->name("createExamActivitie");
Route::patch("/exam/{exam_id}/activities/{activitie_id}/update", [ActivitieController::class, 'update'])->name("updateExamActivitie");
Route::patch("/exam/{exam_id}/activities/{activitie_id}/delete", [ExamActivitieController::class, 'destroy'])->name("deleteActivityByExam");
