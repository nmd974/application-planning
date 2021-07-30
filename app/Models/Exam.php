<?php

namespace App\Models;

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
        return $this->hasMany(Exam_activitie::class);
    }
    public function promotions(){
        return $this->hasMany(Exam_promotion::class);
    }
}
