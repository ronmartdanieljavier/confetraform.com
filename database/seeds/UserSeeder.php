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
            'email' => 'ronmartdanieljavier@gmail.com',
            'password' => Hash::make('passwordRon'),
            'email_verified_at' => now(),
        ]);

        DB::table('users')->insert([
            'first_name' => "Aline Pais Admin",
            'last_name' => "Rodrigues",
            'date_of_birth' => "1991/06/22",
            'student_number' => "s4634359",
            'contact_number' => "0484265301",
            'street' => "11 Eccles Street",
            'suburb' => "Ermington",
            'state' => "NSW",
            'post_code' => "2115",
            'country' => "AU",
            'university_id' => "1",
            'user_type_id' => "2", //uni admin
            'email' => 'aline.prdg@gmail.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
        DB::table('users')->insert([
            'first_name' => "Aline Pais Approver",
            'last_name' => "Rodrigues",
            'date_of_birth' => "1991/06/22",
            'student_number' => "s4634359",
            'contact_number' => "0484265301",
            'street' => "11 Eccles Street",
            'suburb' => "Ermington",
            'state' => "NSW",
            'post_code' => "2115",
            'country' => "AU",
            'user_type_id' => "3", // approver
            'department_id' => "1",
            'course_id' => "1",
            'university_id' => "1",
            'email' => 'aline.rod@live.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
        DB::table('users')->insert([
            'first_name' => "Aline Pais Student",
            'last_name' => "Rodrigues",
            'date_of_birth' => "1991/06/22",
            'student_number' => "s4634359",
            'contact_number' => "0484265301",
            'street' => "11 Eccles Street",
            'suburb' => "Ermington",
            'state' => "NSW",
            'post_code' => "2115",
            'country' => "AU",
            'user_type_id' => "4", //student
            'course_id' => "1",
            'university_id' => "1",
            'email' => 'aline.paisrodrigues@students.vu.edu.au',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        DB::table('department')->insert([
            'university_id' => "1",
            'department_name' => "Engineering Department",
        ]);
        DB::table('department')->insert([
            'university_id' => "1",
            'department_name' => "Medicine Department",
        ]);

//
//        for($x=1; $x<=10; $x++) {
//            $status = $x % 2 == 0 ? 1: 0;
//            DB::table('users')->insert([
//                'first_name' => "SysAdmin ".$x,
//                'last_name' => "Dummy ".$x,
//                'date_of_birth' => "1991/06/22",
//                'student_number' => "",
//                'contact_number' => "",
//                'street' => "",
//                'suburb' => "",
//                'state' => "",
//                'post_code' => "",
//                'country' => "",
//                'course_id' => "1",
//                'user_type_id' => "1",
//                'university_id' => "1",
//                'status' => $status,
//                'email' => 'SysAdmin'.$x.'@gmail.com',
//                'password' => Hash::make('SysAdmin'.$x),
//            ]);
//        }
//
//        for($x=1; $x<=10; $x++) {
//            $status = $x % 2 == 0 ? 1: 0;
//            DB::table('users')->insert([
//                'first_name' => "UniAdmin ".$x,
//                'last_name' => "Dummy ".$x,
//                'date_of_birth' => "1991/06/22",
//                'student_number' => "",
//                'contact_number' => "",
//                'street' => "",
//                'suburb' => "",
//                'state' => "",
//                'post_code' => "",
//                'country' => "",
//                'user_type_id' => "2",
//                'course_id' => "1",
//                'university_id' => "1",
//                'status' => $status,
//                'email' => 'UniAdmin'.$x.'@gmail.com',
//                'password' => Hash::make('UniAdmin'.$x),
//            ]);
//        }
//        for($x=1; $x<=10; $x++) {
//            $status = $x % 2 == 0 ? 1: 0;
//            DB::table('users')->insert([
//                'first_name' => "Approver ".$x,
//                'last_name' => "Dummy ".$x,
//                'date_of_birth' => "1991/06/22",
//                'student_number' => "",
//                'contact_number' => "",
//                'street' => "",
//                'suburb' => "",
//                'state' => "",
//                'post_code' => "",
//                'country' => "",
//                'user_type_id' => "3",
//                'course_id' => "1",
//                'university_id' => "1",
//                'status' => $status,
//                'email' => 'Approver'.$x.'@gmail.com',
//                'password' => Hash::make('Approver'.$x),
//            ]);
//        }
//        for($x=1; $x<=10; $x++) {
//            $status = $x % 2 == 0 ? 1: 0;
//            DB::table('users')->insert([
//                'first_name' => "Applicant ".$x,
//                'last_name' => "Dummy ".$x,
//                'date_of_birth' => "1991/06/22",
//                'student_number' => "S00000".$x,
//                'contact_number' => "",
//                'street' => "",
//                'suburb' => "",
//                'state' => "",
//                'post_code' => "",
//                'country' => "",
//                'user_type_id' => "4",
//                'course_id' => "1",
//                'university_id' => "1",
//                'status' => $status,
//                'email' => 'Applicant'.$x.'@gmail.com',
//                'password' => Hash::make('Applicant'.$x),
//            ]);
//        }
    }
}
