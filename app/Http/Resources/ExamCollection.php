<?php

namespace App\Http\Resources;

use App\Http\Controllers\ApiEleveExamController;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ExamCollection extends JsonResource
{


    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // $exam = new ApiEleveExamController;
        // $classement = $exam->listPromoNotarchived($this[0]->token);
        // $classement = json_encode($classement);
        // $classement = json_decode($classement);
        // $places = $classement->eleve;
        // $heurePassage = null;
        // $datePassage =  null;

        // foreach ($places as $place) {
        //     if($place->id === $this[1]->id) {
        //         $heurePassage = $place->heurePassage;
        //         $datePassage = $place->date_exam;
        //     }
        // }
        return [
            'id'         => $this,
            // 'exam'       => $this[0]->label,
            // 'date_exam'  => $places,
            // 'heure_exam' => $heurePassage,
            // 'token'      => $this[0]->token,
            // 'activities' => Exam_activitiesCollection::collection($this[0]->activities)
        ];
    }
}
