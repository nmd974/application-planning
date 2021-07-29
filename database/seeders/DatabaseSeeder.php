<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User_promotion::factory(5)->create();
        \App\Models\User::factory(10)->create();
        \App\Models\Role::factory(5)->create();
        \App\Models\Promotion::factory(1)->create();
        \App\Models\User::factory(10)->create();
        \App\Models\Activitie::factory(10)->create();
        \App\Models\Exam::factory(10)->create();
        \App\Models\Exam_activitie::factory(10)->create();

    }
}
