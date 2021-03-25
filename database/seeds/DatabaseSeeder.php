<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call([
            ApplicationStatusSeeder::class,
            UniversitySeeder::class,
            CourseSeeder::class,
            FieldTypeSeeder::class,
            FormStatusSeeder::class,
            UserTypeSeeder::class,
            UserSeeder::class,
            FormTemplateSeeder::class,
            FormDetailsSeeder::class,
        ]);

    }
}
