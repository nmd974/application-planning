<?php

namespace App\Http\Resources;

use App\Http\Controllers\ApiEleveExamController;
use App\Http\Resources\RoleCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserDataCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $exam = new ApiEleveExamController;
        $classement = $exam->listPromoNotarchived($this->promotion[0]->exams[0]->token);
        $classement = json_encode($classement);
        $classement = json_decode($classement);
        $places = $classement->eleve;
        $heurePassage = null;
        $datePassage =  null;

        foreach ($places as $place) {
            if($place->id === $this->id) {
                $heurePassage = $place->heurePassage;
                $datePassage = $place->date_exam;
            }
        }

        return [
            'id'        => $this->id,
            'last_name' => $this->last_name,
            'first_name'=> $this->first_name,
            'birthday'  => $this->birthday,
            'token'     => $this->token,
            'email'     => $this->email,
            'promotion' => new PromotionCollection($this->promotion[0]),
            'exam'      => new ExamCollection($this->promotion[0]->exams[0]),
            'heure_passage' => $heurePassage,
            'date_passage'  => $datePassage
        ];
    }
}
