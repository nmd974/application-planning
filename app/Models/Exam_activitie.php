<?php

namespace App\Models;

use App\Models\Exam;
use App\Models\Activitie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Exam_activitie extends Model
{
    use HasFactory;
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'duration',
        'order',
        'archived'
    ];

    public function activitie(){
        return $this->belongsTo(Activitie::class);
    }
    public function exams(){
        return $this->belongsTo(Exam::class);
    }
}
