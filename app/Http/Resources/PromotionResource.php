<?php

namespace App\Http\Resources;

use App\Http\Resources\UserPromotionResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PromotionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'id'    => $this->id,
            'label' => $this->label,
            'users' => UserPromotionResource::collection($this->users)
        ];
    }
}
