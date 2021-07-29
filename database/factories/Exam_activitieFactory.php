<?php

namespace Database\Factories;

use App\Models\Activitie;
use App\Models\Exam_activitie;
use App\Models\Exam;
use Illuminate\Database\Eloquent\Factories\Factory;

class Exam_activitieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Exam_activitie::class;
    private static $order = 1;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            "duration" => $this->faker->numberBetween($min = 5, $max = 120),
            "order" => self::$order += 1,
            "activitie_id" => Activitie::all()->random()->id,
            "exam_id" => Exam::find(1),
        ];
    }
}
