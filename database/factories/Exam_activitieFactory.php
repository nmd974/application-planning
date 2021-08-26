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
    public $counter = 1;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $examen_cda = array(
            1 => array(
                "libelle" => "Présentation d'un projet réalisé en amont de la session",
                "duration" => 40
            ),
            2 => array(
                "libelle" => "Entretien technique & Questionnaire professionnel & Questionnement à partir de production(s)",
                "duration" => 45
            ),
            3 => array(
                "libelle" => "Entretien final",
                "duration" => 20
            )
        );

        $data = [
            'duration' => $examen_cda[$this->getCounter()]["duration"],
            'order' => $this->getCounter(),
            'activitie_id' => $this->getCounter(),
            "exam_id" => Exam::find(1),
        ];
        $this->setCounter();
        return $data;
    }
    public function getCounter(){
        return $this->counter;
    }
    public function setCounter(){
        return $this->counter += 1;
    }
}
