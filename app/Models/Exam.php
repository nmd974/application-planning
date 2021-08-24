<?php

namespace App\Models;

use App\Models\Activitie;
use App\Models\Promotion;
use App\Models\Exam_activitie;
use App\Models\Exam_promotion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Exam extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'label',
        'date_start',
        'archived'
    ];

    public function activities(){
        return ($this->belongsToMany(Activitie::class,"exam_activities", "exam_id", "activitie_id", "id", "id"))->withPivot('duration','order');
    }
    public function promotion(){
       return ($this->belongsToMany(Promotion::class,"exam_promotions", "exam_id", "promotion_id", "id", "id"));
    }
}
