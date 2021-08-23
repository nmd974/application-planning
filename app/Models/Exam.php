<?php

namespace App\Models;

use App\Models\Activitie;
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
        return $this->belongsToMany(Activitie::class, "exam_activities", "exam_id", "activitie_id");
    }
    public function promotions(){
        return $this->hasMany(Exam_promotion::class);
    }
}
