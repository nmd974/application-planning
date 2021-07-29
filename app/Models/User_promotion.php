<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_promotion extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->BelongsTo('App\Models\User');
    }
    public function promotion()
    {
        return $this->BelongsTo('App\Models\Promotion');
    }
}
