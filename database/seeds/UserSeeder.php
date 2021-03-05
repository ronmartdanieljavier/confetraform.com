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
            'date_of_birth' => "1991/06/22",
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
            'email_verified_at' => now(),
        ]);

        DB::table('users')->insert([
            'first_name' => "Aline Pais",
            'last_name' => "Rodrigues",
            'date_of_birth' => "1991/06/22",
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
            'email_verified_at' => now(),
        ]);


        for($x=1; $x<=100; $x++) {
            $status = $x % 2 == 0 ? 1: 0;
            DB::table('users')->insert([
                'first_name' => "SysAdmin ".$x,
                'last_name' => "Dummy ".$x,
                'date_of_birth' => "1991/06/22",
                'student_number' => "",
                'contact_number' => "",
                'street' => "",
                'suburb' => "",
                'state' => "",
                'post_code' => "",
                'country' => "",
                'user_type_id' => "1",
                'university_id' => "1",
                'status' => $status,
                'email' => 'SysAdmin'.$x.'@gmail.com',
                'password' => Hash::make('SysAdmin'.$x),
            ]);
        }

        for($x=1; $x<=100; $x++) {
            $status = $x % 2 == 0 ? 1: 0;
            DB::table('users')->insert([
                'first_name' => "UniAdmin ".$x,
                'last_name' => "Dummy ".$x,
                'date_of_birth' => "1991/06/22",
                'student_number' => "",
                'contact_number' => "",
                'street' => "",
                'suburb' => "",
                'state' => "",
                'post_code' => "",
                'country' => "",
                'user_type_id' => "2",
                'university_id' => "1",
                'status' => $status,
                'email' => 'UniAdmin'.$x.'@gmail.com',
                'password' => Hash::make('UniAdmin'.$x),
            ]);
        }
        for($x=1; $x<=100; $x++) {
            $status = $x % 2 == 0 ? 1: 0;
            DB::table('users')->insert([
                'first_name' => "Approver ".$x,
                'last_name' => "Dummy ".$x,
                'date_of_birth' => "1991/06/22",
                'student_number' => "",
                'contact_number' => "",
                'street' => "",
                'suburb' => "",
                'state' => "",
                'post_code' => "",
                'country' => "",
                'user_type_id' => "3",
                'university_id' => "1",
                'status' => $status,
                'email' => 'Approver'.$x.'@gmail.com',
                'password' => Hash::make('Approver'.$x),
            ]);
        }
        for($x=1; $x<=100; $x++) {
            $status = $x % 2 == 0 ? 1: 0;
            DB::table('users')->insert([
                'first_name' => "Reviewer ".$x,
                'last_name' => "Dummy ".$x,
                'date_of_birth' => "1991/06/22",
                'student_number' => "",
                'contact_number' => "",
                'street' => "",
                'suburb' => "",
                'state' => "",
                'post_code' => "",
                'country' => "",
                'user_type_id' => "4",
                'university_id' => "1",
                'status' => $status,
                'email' => 'Reviewer'.$x.'@gmail.com',
                'password' => Hash::make('Reviewer'.$x),
            ]);
        }
        for($x=1; $x<=100; $x++) {
            $status = $x % 2 == 0 ? 1: 0;
            DB::table('users')->insert([
                'first_name' => "Applicant ".$x,
                'last_name' => "Dummy ".$x,
                'date_of_birth' => "1991/06/22",
                'student_number' => "S00000".$x,
                'contact_number' => "",
                'street' => "",
                'suburb' => "",
                'state' => "",
                'post_code' => "",
                'country' => "",
                'user_type_id' => "5",
                'university_id' => "1",
                'status' => $status,
                'email' => 'Applicant'.$x.'@gmail.com',
                'password' => Hash::make('Applicant'.$x),
            ]);
        }
    }
}
