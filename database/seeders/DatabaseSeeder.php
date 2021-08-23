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
        \App\Models\Role::factory(3)->create();
        \App\Models\User::factory(10)->create();
        \App\Models\Promotion::factory(1)->create();
        \App\Models\User_promotion::factory(5)->create();
        \App\Models\Activitie::factory(10)->create();
        \App\Models\Exam::factory(10)->create();
        \App\Models\Exam_activitie::factory(10)->create();
        \App\Models\Exam_promotion::factory(10)->create();
    }
}
