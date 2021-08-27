<?php

use App\Http\Controllers\ExamActivitieController;
use App\Http\Controllers\ExamController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ActivitieController;
use App\Http\Controllers\ExamPromotionController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UserPromotionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\QrCodeController;
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
Route::get('/promotion/archived/{id}', [PromotionController::class, 'destroy']);
Route::get('/promotion/{id}/exams', [PromotionController::class, 'dataPromotionExam'])->name("examsByPromotion");

route::patch('/promotion/{id}/update', [PromotionController::class, 'update'])->name('updatePromotion');
Route::post('/promotion/{id}/exams/create', [ExamController::class, 'store'])->name("createExamByPromotion");
Route::patch('/promotion/{promotion_id}/exams/{exam_id}/delete', [ExamPromotionController::class, 'destroy'])->name("deleteExamByPromotion");

Route::post("/eleve/create", [UserController::class, 'store'])->name("users.store");
Route::patch("/eleve/update/{id}", [UserController::class, 'update'])->name("users.update");
Route::patch("/eleve/{user_id}/promotion/{promotion_id}/delete", [UserPromotionController::class, 'destroy'])->name("user_promotions.destroy");

Route::patch("/exam/{id}/update", [ExamController::class, 'update'])->name("updateExam");
Route::get("/exam/{exam_id}/activities", [ExamActivitieController::class, 'index'])->name("getActivitiesByExam");
Route::post("/exam/{exam_id}/activities/create", [ActivitieController::class, 'store'])->name("createExamActivitie");
Route::patch("/exam/{exam_id}/activities/{activitie_id}/update", [ActivitieController::class, 'update'])->name("updateExamActivitie");
Route::patch("/exam/{exam_id}/activities/{activitie_id}/delete", [ExamActivitieController::class, 'destroy'])->name("deleteActivityByExam");


//CRUD roles

Route::get('/role/list', [RoleController::class, 'index'])->name('role.index');
Route::post('/role/create',[RoleController::class,'store'])->name('role.store');
Route::patch('/role/update/{id}', [RoleController::class,'update'])->name('role.update');
Route::delete('/role/delete/{id}', [RoleController::class, 'destroy'])->name('role.destroy');

//AJAX modal activities
Route::get('/exam/{exam_id}/activities/{activitie_id}', [ExamActivitieController::class, 'show']);
Route::get('/activities/{id}', [ExamActivitieController::class, 'getExamActivitieExample']);

//AJAX modal examens
Route::get('/exam/{id}', [ExamController::class, 'show']);

//AJAX modal promotion
Route::get('/promotion/{id}/infos', [PromotionController::class, 'getInfoPromotion']);

//AJEX modal roles
Route::get('/roles/all', [RoleController::class, 'getAllRoles']);
Route::get('/role/{id}', [RoleController::class, 'getRole']);

//AJAX users
// Route::get('/users/all', [UserController::class, 'getAllUsers']);
Route::get('/user/{id}', [UserController::class, 'show']);

//SendMail
Route::get('/contact/students/promotion/{id}',[MailController::class, 'sendMailforStudents']);
Route::get('/contact/student/{user_id}',[MailController::class, 'sendMailByStudent']);
Route::get('/contact/jury/promotion/{id}',[MailController::class, 'sendMailForJuryByPromo']);
Route::get('/contact/jury/{jury_id}/promotion/{id}',[MailController::class, 'sendMailByJury']);

//QRCODE Generator
Route::get('/generate-qrcode/test', [QrCodeController::class, 'index']);
