<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Role::class;

    public $counter = 0;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'label' => "",
        ];
        // $roles = ['Elève', 'Jury'];
        // $data = ['label' => $roles[$this->getCounter()]];
        // $this->setCounter();
        // return $data;
    }
    // public function getCounter(){
    //     return $this->counter;
    // }
    // public function setCounter(){
    //     return $this->counter += 1;
    // }
}
