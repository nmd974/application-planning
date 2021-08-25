<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\User;
use DateTime;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = ['male', 'female'];
        $g = $this->faker->randomElement($gender);
        $birthday = $this->faker->dateTimeThisCentury($max = 'now');
        $firstName = $this->faker->firstName($g);
        $lastName = $this->faker->lastName;
        return [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'token'     => md5("".$firstName.",".$lastName.",".$birthday->format('Y-m-d').""),
            'birthday' => $birthday,
            'email' => $this->faker->unique()->safeEmail(),
            'role_id' => Role::all()->random()->id,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
