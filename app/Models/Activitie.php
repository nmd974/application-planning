<?php

namespace App\Models;

use App\Models\Exam;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activitie extends Model
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

    public function exams(){
        return $this->belongsToMany(Exam::class, "exam_activities", "activitie_id", "exam_id");
    }
}
