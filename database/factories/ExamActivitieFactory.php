<?php

namespace Database\Factories;

use App\Models\Activitie;
use App\Models\Exam_activitie;
use App\Models\Exam;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExamActivitieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Exam_activitie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // $exams = Exam::all();
        // foreach($exams as $e){
        //     for($i =1; $i < 5;$i++){
        //         $activity = new Activitie();
        //         $activity->duration = $this->faker()->numberBetween($min = 5, $max = 120);
        //         $activity->order = $i;
        //         $activity->save();
        //     }

        // }
        $cpt = 0;
        return [
            "duration" => $this->faker()->numberBetween($min = 5, $max = 120),
            "order" => $cpt += 1,
            "activitie_id" => Activitie::all()->random()->id,
            "exam_id" => Exam::find(1),
        ];
    }
}
