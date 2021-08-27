<?php

namespace Database\Factories;

use App\Models\Activitie;
use Illuminate\Database\Eloquent\Factories\Factory;

class ActivitieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Activitie::class;
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
        $data = ['label' => $examen_cda[$this->getCounter()]["libelle"]];
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
