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
        $classement = [];

        foreach ($this->promotion[0]->exams as $dataExam) {
            $data = $exam->listPromoNotarchived($dataExam->token);
            $data = json_encode($data);
            $data = json_decode($data);

            $places = $data->eleve;

            $heurePassage = null;
            $datePassage = null;

            foreach ($places as $place) {
                if($place->id === $this->id) {
                    $heurePassage = $place->heurePassage;
                    $datePassage = $place->date_exam;
                }
            }

            $newObject = [
                'id'        => $data->id,
                'label'     => $data->label,
                'date_exam' => $datePassage,
                'heure_exam'=> $heurePassage,
                'activities'=> $data->activities
            ];
            array_push($classement, $newObject);
        }

        return [
            'id'        => $this->id,
            'last_name' => $this->last_name,
            'first_name'=> $this->first_name,
            'birthday'  => $this->birthday,
            'token'     => $this->token,
            'email'     => $this->email,
            'promotion' => new PromotionCollection($this->promotion[0]),
            'exam'      => $classement,
        ];
    }
}
