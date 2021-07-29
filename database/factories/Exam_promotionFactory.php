<?php

namespace Database\Factories;

use App\Models\Exam_promotion;
use App\Models\Exam;
use App\Models\Promotion;
use Illuminate\Database\Eloquent\Factories\Factory;

class Exam_promotionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Exam_promotion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            "exam_id" => Exam::all()->random()->id,
            "promotion_id" => Promotion::all()->random()->id
        ];
    }
}
