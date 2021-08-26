<?php

namespace Database\Factories;

use App\Models\Exam;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExamFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Exam::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $label = "Titre professionnel";
        $date = date("Y-m-d H:i:s", time());
        return [
            'label' => $label,
            'date_start' => $date,
            'token'     =>  md5("".$label.",".$date.""),
            'archived' => false,
        ];
    }
}
