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
use App\Http\Middleware\Authenticate;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

Route::group(['middleware' => ['web']], function () {
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');

    Route::post('/login/check', [UserController::class, 'login'])->name("loginCheck");
    Route::get('/logout', [UserController::class, 'logout'])->name("logout");

    Route::get('/', [PromotionController::class, 'index'])->name("Accueil")->middleware("auth");
    Route::get('/{vue}', [PromotionController::class, 'index'])->name("getPromotions")->middleware("auth");

    Route::get("/promotion/{id}", [PromotionController::class, 'dataPromotion'])->name("usersByPromotion")->middleware("auth");
    Route::post('/promotion/create', [PromotionController::class, 'store'])->name("promotion.store")->middleware("auth");
    Route::get('/promotion/archived/{id}', [PromotionController::class, 'destroy'])->middleware("auth");
    Route::get('/promotion/{id}/exams', [PromotionController::class, 'dataPromotionExam'])->name("examsByPromotion")->middleware("auth");

    route::patch('/promotion/{id}/update', [PromotionController::class, 'update'])->name('updatePromotion')->middleware("auth");
    Route::post('/promotion/{id}/exams/create', [ExamController::class, 'store'])->name("createExamByPromotion")->middleware("auth");
    Route::patch('/promotion/{promotion_id}/exams/{exam_id}/delete', [ExamPromotionController::class, 'destroy'])->name("deleteExamByPromotion")->middleware("auth");

    Route::post("/eleve/create", [UserController::class, 'store'])->name("users.store")->middleware("auth");
    Route::patch("/eleve/update/{id}", [UserController::class, 'update'])->name("users.update")->middleware("auth");
    Route::patch("/eleve/{user_id}/promotion/{promotion_id}/delete", [UserPromotionController::class, 'destroy'])->name("user_promotions.destroy")->middleware("auth");

    Route::patch("/exam/{id}/update", [ExamController::class, 'update'])->name("updateExam")->middleware("auth");
    Route::get("/exam/{exam_id}/activities", [ExamActivitieController::class, 'index'])->name("getActivitiesByExam")->middleware("auth");
    Route::post("/exam/{exam_id}/activities/create", [ActivitieController::class, 'store'])->name("createExamActivitie")->middleware("auth");
    Route::patch("/exam/{exam_id}/activities/{activitie_id}/update", [ActivitieController::class, 'update'])->name("updateExamActivitie")->middleware("auth");
    Route::patch("/exam/{exam_id}/activities/{activitie_id}/delete", [ExamActivitieController::class, 'destroy'])->name("deleteActivityByExam")->middleware("auth");


    //CRUD roles

    Route::get('/role/list', [RoleController::class, 'index'])->name('role.index')->middleware("auth");
    Route::post('/role/create',[RoleController::class,'store'])->name('role.store')->middleware("auth");
    Route::patch('/role/update/{id}', [RoleController::class,'update'])->name('role.update')->middleware("auth");
    Route::delete('/role/delete/{id}', [RoleController::class, 'destroy'])->name('role.destroy')->middleware("auth");

    // CRUD USER

    Route::get('/user/add', [UserController::class,'create'])->middleware("auth");
    Route::post('/user/add', [UserController::class, 'add'])->name('user.addForm')->middleware("auth");
    Route::patch('/user/edit/{id}',[UserController::class, 'updateRole'])->name('user.edit')->middleware("auth");
    Route::delete('/user/delete/{id}', [UserController::class,'deleted'])->name('user.deleted')->middleware("auth");

    //AJAX modal activities
    Route::get('/exam/{exam_id}/activities/{activitie_id}', [ExamActivitieController::class, 'show'])->middleware("auth");
    Route::get('/activities/{id}', [ExamActivitieController::class, 'getExamActivitieExample'])->middleware("auth");

    //AJAX modal examens
    Route::get('/exam/{id}', [ExamController::class, 'show'])->middleware("auth");

    //AJAX modal promotion
    Route::get('/promotion/{id}/infos', [PromotionController::class, 'getInfoPromotion'])->middleware("auth");

    //AJAX modal roles
    Route::get('/roles/all', [RoleController::class, 'getAllRoles'])->middleware("auth");
    Route::get('/role/{id}', [RoleController::class, 'getRole'])->middleware("auth");

    //AJAX users
    // Route::get('/users/all', [UserController::class, 'getAllUsers']);
    Route::get('/user/{id}', [UserController::class, 'show'])->middleware("auth");

    //SendMail
    Route::get('/contact/students/promotion/{id}',[MailController::class, 'sendMailforStudents'])->middleware("auth");
    Route::get('/contact/student/{user_id}',[MailController::class, 'sendMailByStudent'])->middleware("auth");
    Route::get('/contact/jury/promotion/{id}',[MailController::class, 'sendMailForJuryByPromo'])->middleware("auth");
    Route::get('/contact/jury/{jury_id}/promotion/{id}',[MailController::class, 'sendMailByJury'])->middleware("auth");

    //QRCODE Generator
    Route::get('/generate-qrcode/test', [QrCodeController::class, 'index'])->middleware("auth");

});



