<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam_promotion extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'exam_id',
        'promotion_id',
        'archived'
    ];

    public function promotion(){
        return $this->belongsToMany(Promotion::class);
    }
    public function exams(){
        return $this->belongsToMany(Exam::class);
    }
}
