<?php

namespace App\Http\Controllers;

use App\Http\Resources\JuryDataCollection;
use App\Models\Exam;
use App\Models\User;
use App\Models\Promotion;
use Illuminate\Http\Request;

class ApiEleveExamController extends Controller
{

    function listEleves()
    {
        $eleves = User::where('role_id',1)->get();
        return $eleves;
    }
     /**
     * @OA\Get(
     *      path="/jury/exam/{token}",
     *      operationId="GetListForJury",
     *      tags={"token"},

     *      summary="Get all exams with activities and all students with their hour for a jury of a promotion",
     *      description="Returns all exams with activities and all students with their hour for a jury of a promotion. Token is given for an exam that is linked to a promotion",
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
    function listPromoNotarchived($token)
    {
        $exam = Exam::where('token', $token);
        $exam = $exam->first();
        $exam->promotion;

        foreach ($exam->promotion as $promo) {
            if(!$promo->pivot->archived){
                return new JuryDataCollection($exam);
            }else{
                return [
                    "error"   => true,
                    "message" => "l'examen n'existe plus"
                ];
            };
        }
    }
}
