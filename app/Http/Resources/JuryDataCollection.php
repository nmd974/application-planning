<?php

namespace App\Http\Resources;

use DateTime;
use DateInterval;
use App\Models\Exam_activitie;
use Illuminate\Http\Resources\Json\JsonResource;

class JuryDataCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $date = new DateTime($this->date_start);
        $heureDebutEnMinute = ($date->format('H')*60) + $date->format('i');
        $dureExam =  0;
        $timeForPause = 5 ;
        $tabHeurePassage = [];
        $timeDayEnd   = 1020; //en minute
        $timeDayStart = 480;



        foreach ($this->activities as $activitie) {
            $dureExam +=$activitie->pivot->duration;
        }


       foreach ($this->promotion[0]->users as $user) {

        if(count($tabHeurePassage) > 0){
            $heureDebutEnMinute=$heureDebutEnMinute + $dureExam + $timeForPause;
        }

        if($heureDebutEnMinute >= $timeDayEnd) {
                $date->add(new DateInterval('P1D'));
                $heureDebutEnMinute = $timeDayStart;
        }

        array_push($tabHeurePassage, [
            'eleve'          => $user,
            'heureDePassage' => $heureDebutEnMinute,
            'date_exam'      =>$date->format('d-m-Y')
        ]);
       }

        return [
            'id'            => $this->id,
            'label'         => $this->label,
            'promotion'     => new PromotionCollection($this->promotion[0]),
            'eleve'         => UserCollection::collection($tabHeurePassage),
            'activities'    => Exam_activitiesCollection::collection($this->activities),
        ];
    }
}
