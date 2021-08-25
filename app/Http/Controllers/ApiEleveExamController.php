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
                    "message" => "l'examan n'existe plus"
                ];
            };
        }
    }
}
