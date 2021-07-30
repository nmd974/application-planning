<?php

namespace App\Models;

use App\Models\Exam;
use App\Models\User;
use App\Models\Exam_promotion;
use App\Models\User_promotion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Promotion extends Model
{
    use HasFactory;
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'label',
        'archived'
    ];

    public function exams(){
        return $this->hasMany(Exam_promotion::class);
    }
    public function users() {
        return $this->hasMany(User_promotion::class);
    }

}
