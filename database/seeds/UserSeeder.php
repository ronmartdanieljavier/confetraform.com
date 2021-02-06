<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => "Ron Mart Daniel",
            'last_name' => "Javier",
            'data_of_birth' => "1991/06/22",
            'student_number' => "s4622047",
            'contact_number' => "0484265301",
            'street' => "11 Eccles Street",
            'suburb' => "Ermington",
            'state' => "NSW",
            'post_code' => "2115",
            'country' => "AU",
            'user_type_id' => "1",
            'university_id' => "1",
            'email' => 'ronmartdanieljavier@gmail.com',
            'password' => Hash::make('passwordRon'),
        ]);

        DB::table('users')->insert([
            'first_name' => "Aline Pais",
            'last_name' => "Rodrigues",
            'data_of_birth' => "1991/06/22",
            'student_number' => "s4634359",
            'contact_number' => "0484265301",
            'street' => "11 Eccles Street",
            'suburb' => "Ermington",
            'state' => "NSW",
            'post_code' => "2115",
            'country' => "AU",
            'user_type_id' => "1",
            'university_id' => "1",
            'email' => 'aline.prdg@gmail.com',
            'password' => Hash::make('passwordAline'),
        ]);
    }
}
