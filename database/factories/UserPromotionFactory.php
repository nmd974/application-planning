<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Promotion;
use App\Models\User_promotion;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserPromotionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User_promotion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'user_id' => User::all()->random()->id,
            'promotion_id' => Promotion::all()->random()->id,
        ];
    }
}
