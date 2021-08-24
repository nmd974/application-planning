<?php

namespace App\Http\Resources;

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
        return [
            'id'            => $this->id,
            'label'         => $this->label,
            'date_exam'     => $this->date_start,
            'promotion'     => new PromotionCollection($this->promotion[0]),
            'eleve'         => UserCollection::collection($this->promotion[0]->users),
            'activities'    => Exam_activitiesCollection::collection($this->activities)
        ];
    }
}
