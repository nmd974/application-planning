<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserDataCollection;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\User_promotion;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class APiUserController extends Controller
{
        /**
     * @OA\Get(
     *      path="/user/exam?token={token}",
     *      operationId="GetAllExamsByUser",
     *      tags={"token"},

     *      summary="Get all exams for a user",
     *      description="Returns all exams with there activities, hours and date for a specific student",
     *      @OA\Parameter(
     *          name="token",
     *          in="path",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     * @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     * @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *  )
     */

    /*
     * $id int
     * Permet de lister tous les exeams d'un user
     */
    function ListExam (Request $request){

        $user = User::where('token', $request->token)->first();
        if(!$user){
            return [
                "error"   => true,
                "message" => "l'élève n'existe plus"
            ];
        }
        $user->promotion;
        return new UserDataCollection($user);

    }

}
