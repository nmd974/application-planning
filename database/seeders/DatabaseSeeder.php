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

        \App\Models\Role::factory(1)->create([
            "label" => "Elève"
        ]);
        \App\Models\Role::factory(1)->create([
            "label" => "Jury"
        ]);
        \App\Models\Role::factory(2)->create();
        \App\Models\User::factory(10)->create();
        \App\Models\Promotion::factory(1)->create();
        \App\Models\User_promotion::factory(10)->create();
        \App\Models\Activitie::factory(3)->create();
        \App\Models\Exam::factory(1)->create();
        \App\Models\Exam_activitie::factory(3)->create();
        \App\Models\Exam_promotion::factory(1)->create();
        \App\Models\Role::factory(1)->create([
            "label" => "Admin"
        ]);
        \App\Models\User::factory(1)->create([
            'first_name' => "Admin",
            'last_name' => "Admin",
            'email' => "admin@admin.com",
            'role_id' => 3,
            "password" => bcrypt("admin")
        ]);
    }
}
