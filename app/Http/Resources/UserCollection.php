<?php

namespace App\Http\Resources;

use App\Http\Resources\RoleCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends JsonResource
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
            'id'            => $this['eleve']->id,
            'last_name'     => $this['eleve']->last_name,
            'first_name'    => $this['eleve']->first_name,
            'birthday'      => $this['eleve']->birthday,
            'token'         => $this['eleve']->token,
            'email'         => $this['eleve']->email,
            'heurePassage'  => $this['heureDePassage'],
            'date_exam'     => $this['date_exam']
        ];
    }
}
