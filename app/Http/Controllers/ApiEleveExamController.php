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

    function listPromoNotarchived($exam_id)
    {
        $exam = Exam::find($exam_id);



        return new JuryDataCollection($exam);
    }
}
