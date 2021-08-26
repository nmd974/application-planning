<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Promotion;
use App\Models\User_promotion;
use Illuminate\Database\Eloquent\Factories\Factory;

class User_promotionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User_promotion::class;
    public $counter = 0;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->setCounter();
        return [
            'user_id' => $this->getCounter(),
            'promotion_id' => Promotion::find(1),
        ];
    }
    public function getCounter(){
        return $this->counter;
    }
    public function setCounter(){
        return $this->counter += 1;
    }
}
