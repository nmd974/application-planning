<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function activites(){
        return $this->belongsToMany(Activitie::class);
    }
    public function exams(){
        return $this->belongsToMany(Exam::class);
    }
}
