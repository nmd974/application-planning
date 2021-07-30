<?php

namespace App\Models;

use App\Models\Exam;
use App\Models\Promotion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        return $this->belongsTo(Promotion::class);
    }
    public function exams()
    {
        return $this->BelongsTo(Exam::class, 'exam_id', 'id');
    }
}
