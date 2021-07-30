<?php

namespace App\Http\Resources;

use App\Models\Exam_promotion;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PromotionCollection extends JsonResource
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
            'id'        => $this->id,
            'promo'     => $this->label,
            'student'   => User_promotionCollection::collection($this->users),
            'exam'      => Exam_promotionCollection::collection($this->exams),
        ];

    }
}
