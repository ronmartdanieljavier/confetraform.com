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
            'first_name' => 'System',
            'last_name' => 'Admin',
            'date_of_birth' => '1991/06/22',
            'student_number' => 's4622047',
            'contact_number' => '0484265301',
            'street' => '11 Eccles Street',
            'suburb' => 'Ermington',
            'state' => 'NSW',
            'post_code' => '2115',
            'country' => 'AU',
            'user_type_id' => '1',
            'email' => 'thesis_admin@rmdj.info',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        DB::table('users')->insert([
            'first_name' => 'Aline Pais Admin',
            'last_name' => 'Rodrigues',
            'date_of_birth' => '1991/06/22',
            'student_number' => 's4634359',
            'contact_number' => '0484265301',
            'street' => '11 Eccles Street',
            'suburb' => 'Ermington',
            'state' => 'NSW',
            'post_code' => '2115',
            'country' => 'AU',
            'university_id' => '1',
            'user_type_id' => '2', //uni admin
            'email' => 'thesis_uni_admin@rmdj.info',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
        DB::table('users')->insert([
            'first_name' => 'Approver',
            'last_name' => 'Rodrigues',
            'date_of_birth' => '1991/06/22',
            'student_number' => 's4634359',
            'contact_number' => '0484265301',
            'street' => '11 Eccles Street',
            'suburb' => 'Ermington',
            'state' => 'NSW',
            'post_code' => '2115',
            'country' => 'AU',
            'user_type_id' => '3', // approver
            'department_id' => '1',
            'university_id' => '1',
            'email' => 'thesis_approver@rmdj.info',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
        DB::table('users')->insert([
            'first_name' => 'Jonah',
            'last_name' => 'Lorenzo',
            'date_of_birth' => '1991/06/22',
            'student_number' => 's4634359',
            'contact_number' => '0484265301',
            'street' => '11 Eccles Street',
            'suburb' => 'Ermington',
            'state' => 'NSW',
            'post_code' => '2115',
            'country' => 'AU',
            'user_type_id' => '4', // approver
            'course_id' => '2',
            'university_id' => '1',
            'email' => 'thesis_applicant@rmdj.info',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
        DB::table('users')->insert([
            'first_name' => 'Guia Vega',
            'last_name' => 'Sagrado',
            'date_of_birth' => '1991/06/22',
            'student_number' => 's4634359',
            'contact_number' => '0484265301',
            'street' => '11 Eccles Street',
            'suburb' => 'Ermington',
            'state' => 'NSW',
            'post_code' => '2115',
            'country' => 'AU',
            'user_type_id' => '4', // approver
            'course_id' => '3',
            'university_id' => '1',
            'email' => 'thesis_applicant2@rmdj.info',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        $insert_array = [];
        $insert_array[] = ['first_name' => 'Guinevere', 'last_name' => 'Swanson', 'date_of_birth' => '1998-10-17', 'student_number' => 'U000001', 'contact_number' => '(02) 4936 2867', 'street' => '69 Argyle Street', 'suburb' => 'Stratford', 'state' => 'NSW', 'post_code' => '2422', 'country' => 'AU', 'user_type_id' => '2', 'university_id' => '3','email' => 'guinevere.swanson@students.unsw.edu.au','password' => Hash::make('password'),'email_verified_at' => now(),];
        $insert_array[] = ['first_name' => 'Alice', 'last_name' => 'Blanton', 'date_of_birth' => '2003-03-14', 'student_number' => 'U000002', 'contact_number' => '(02) 4164 0616', 'street' => '79 Ugoa Street', 'suburb' => 'Boomerang Beach', 'state' => 'NSW', 'post_code' => '2428', 'country' => 'AU', 'user_type_id' => '2', 'university_id' => '4','email' => 'alice.blanton@students.unsw.edu.au','password' => Hash::make('password'),'email_verified_at' => now(),];
        DB::table('users')->insert($insert_array);

        $insert_array = [];
        $insert_array[] = ['first_name' => 'Violet', 'last_name' => 'Pierpoint', 'date_of_birth' => '1981-09-23', 'student_number' => 'R100001', 'contact_number' => '(03) 9729 3873', 'street' => '51 Denison Road', 'suburb' => 'St Andrews Beach', 'state' => 'NSW', 'post_code' => '3941', 'country' => 'AU', 'user_type_id' => '3', 'department_id' => '7','university_id' => '4','email' => 'violet.pierpoint@students.rmit.edu.au','password' => Hash::make('password'),'email_verified_at' => now(),];
        $insert_array[] = ['first_name' => 'Barrett', 'last_name' => 'Goodman', 'date_of_birth' => '1987-04-13', 'student_number' => 'R100002', 'contact_number' => '(03) 9811 4784', 'street' => '44 Nerrigundah Drive', 'suburb' => 'Lynbrook', 'state' => 'NSW', 'post_code' => '3975', 'country' => 'AU', 'user_type_id' => '3', 'department_id' => '7','university_id' => '4','email' => 'barrett.goodman@students.rmit.edu.au','password' => Hash::make('password'),'email_verified_at' => now(),];
        DB::table('users')->insert($insert_array);

        $insert_array = [];
        $insert_array[] = ['first_name' => 'Alec', 'last_name' => 'Cooke', 'date_of_birth' => '1993-01-30', 'student_number' => 'U000003', 'contact_number' => '(02) 6103 5454', 'street' => '80 Blairgowrie Avenue', 'suburb' => 'Wambrook', 'state' => 'NSW', 'post_code' => '2630', 'country' => 'AU', 'user_type_id' => '4', 'course_id' => '4','university_id' => '3','email' => 'alec.cooke@students.unsw.edu.au','password' => Hash::make('password'),'email_verified_at' => now(),];
        $insert_array[] = ['first_name' => 'Tina', 'last_name' => 'Potter', 'date_of_birth' => '1993-09-19', 'student_number' => 'U000004', 'contact_number' => '(02) 4269 1832', 'street' => '17 Peninsula Drive', 'suburb' => 'Alfords Point', 'state' => 'NSW', 'post_code' => '2234', 'country' => 'AU', 'user_type_id' => '4', 'course_id' => '4','university_id' => '3','email' => 'tina.potter@students.unsw.edu.au','password' => Hash::make('password'),'email_verified_at' => now(),];
        $insert_array[] = ['first_name' => 'Kenelm', 'last_name' => 'Graves', 'date_of_birth' => '1996-01-08', 'student_number' => 'U000005', 'contact_number' => '(02) 4008 3221', 'street' => '49 Edgewater Close', 'suburb' => 'Falls Creek', 'state' => 'NSW', 'post_code' => '2540', 'country' => 'AU', 'user_type_id' => '4', 'course_id' => '4','university_id' => '3','email' => 'kenelm.graves@students.unsw.edu.au','password' => Hash::make('password'),'email_verified_at' => now(),];
        $insert_array[] = ['first_name' => 'Chelsea', 'last_name' => 'Romero', 'date_of_birth' => '1998-04-26', 'student_number' => 'U000006', 'contact_number' => '(02) 6791 1193', 'street' => '66 Plug Street', 'suburb' => 'Wandsworth', 'state' => 'NSW', 'post_code' => '2365', 'country' => 'AU', 'user_type_id' => '4', 'course_id' => '4','university_id' => '3','email' => 'chelsea.romero@students.unsw.edu.au','password' => Hash::make('password'),'email_verified_at' => now(),];
        $insert_array[] = ['first_name' => 'Tom', 'last_name' => 'Gibbs', 'date_of_birth' => '2001-02-25', 'student_number' => 'U000007', 'contact_number' => '(02) 4948 6442', 'street' => '13 Gaggin Street', 'suburb' => 'Osterley', 'state' => 'NSW', 'post_code' => '2324', 'country' => 'AU', 'user_type_id' => '4', 'course_id' => '4','university_id' => '3','email' => 'tom.gibbs@students.unsw.edu.au','password' => Hash::make('password'),'email_verified_at' => now(),];
        $insert_array[] = ['first_name' => 'Elena', 'last_name' => 'Dunn', 'date_of_birth' => '1999-09-17', 'student_number' => 'U000008', 'contact_number' => '(02) 9330 5569', 'street' => '42 Queen Street', 'suburb' => 'Avalon', 'state' => 'NSW', 'post_code' => '2107', 'country' => 'AU', 'user_type_id' => '4', 'course_id' => '4','university_id' => '3','email' => 'elena.dunn@students.unsw.edu.au','password' => Hash::make('password'),'email_verified_at' => now(),];

        $insert_array[] = ['first_name' => 'Les', 'last_name' => 'Woolery', 'date_of_birth' => '1991-12-16', 'student_number' => 'R100003', 'contact_number' => '(03) 8577 5131', 'street' => '9 Cornish Street', 'suburb' => 'Werribee', 'state' => 'NSW', 'post_code' => '3030', 'country' => 'AU', 'user_type_id' => '4', 'course_id' => '5','university_id' => '4','email' => 'les.woolery@students.rmit.edu.au','password' => Hash::make('password'),'email_verified_at' => now(),];
        $insert_array[] = ['first_name' => 'Russell', 'last_name' => 'Sims', 'date_of_birth' => '1997-12-31', 'student_number' => 'R100004', 'contact_number' => '(03) 5317 1553', 'street' => '63 McLachlan Street', 'suburb' => 'Green Lake', 'state' => 'NSW', 'post_code' => '3401', 'country' => 'AU', 'user_type_id' => '4', 'course_id' => '5','university_id' => '4','email' => 'russell.sims@students.rmit.edu.au','password' => Hash::make('password'),'email_verified_at' => now(),];
        $insert_array[] = ['first_name' => 'Casey', 'last_name' => 'Sherman', 'date_of_birth' => '1998-12-05', 'student_number' => 'R100005', 'contact_number' => '(03) 5342 2772', 'street' => '80 Acheron Road', 'suburb' => 'Dutson Downs', 'state' => 'NSW', 'post_code' => '3851', 'country' => 'AU', 'user_type_id' => '4', 'course_id' => '5','university_id' => '4','email' => 'casey.sherman@students.rmit.edu.au','password' => Hash::make('password'),'email_verified_at' => now(),];
        $insert_array[] = ['first_name' => 'Kate', 'last_name' => 'Skinner', 'date_of_birth' => '1990-12-12', 'student_number' => 'R100006', 'contact_number' => '(03) 5365 8251', 'street' => '8 Walters Street', 'suburb' => 'Greta South', 'state' => 'NSW', 'post_code' => '3675', 'country' => 'AU', 'user_type_id' => '4', 'course_id' => '5','university_id' => '4','email' => 'kate.skinner@students.rmit.edu.au','password' => Hash::make('password'),'email_verified_at' => now(),];
        $insert_array[] = ['first_name' => 'Neville', 'last_name' => 'Tillery', 'date_of_birth' => '1994-07-20', 'student_number' => 'R100007', 'contact_number' => '(03) 5386 6393', 'street' => '16 Villeneuve Street', 'suburb' => 'Havilah', 'state' => 'NSW', 'post_code' => '3737', 'country' => 'AU', 'user_type_id' => '4', 'course_id' => '5','university_id' => '4','email' => 'neville.tillery@students.rmit.edu.au','password' => Hash::make('password'),'email_verified_at' => now(),];
        $insert_array[] = ['first_name' => 'Oliver', 'last_name' => 'Reid', 'date_of_birth' => '2002-04-10', 'student_number' => 'R100008', 'contact_number' => '(03) 5326 8396', 'street' => '61 Bailey Street', 'suburb' => 'Warrabkook', 'state' => 'NSW', 'post_code' => '3286', 'country' => 'AU', 'user_type_id' => '4', 'course_id' => '5','university_id' => '4','email' => 'oliver.reid@students.rmit.edu.au','password' => Hash::make('password'),'email_verified_at' => now(),];

        DB::table('users')->insert($insert_array);

        DB::table('department')->insert([
            'university_id' => '1',
            'department_name' => 'Engineering Department',
        ]);
        DB::table('department')->insert([
            'university_id' => '1',
            'department_name' => 'Nursing Department',
        ]);
        DB::table('department')->insert([
            'university_id' => '2',
            'department_name' => 'IT Department',
        ]);
        DB::table('department')->insert([
            'university_id' => '3',
            'department_name' => 'Engineering Department',
        ]);
        DB::table('department')->insert([
            'university_id' => '3',
            'department_name' => 'Nursing Department',
        ]);
        DB::table('department')->insert([
            'university_id' => '3',
            'department_name' => 'IT Department',
        ]);
        DB::table('department')->insert([
            'university_id' => '4',
            'department_name' => 'Engineering Department',
        ]);
        DB::table('department')->insert([
            'university_id' => '4',
            'department_name' => 'Nursing Department',
        ]);
        DB::table('department')->insert([
            'university_id' => '4',
            'department_name' => 'IT Department',
        ]);

//
//        for($x=1; $x<=10; $x++) {
//            $status = $x % 2 == 0 ? 1: 0;
//            DB::table('users')->insert([
//                'first_name' => 'SysAdmin '.$x,
//                'last_name' => 'Dummy '.$x,
//                'date_of_birth' => '1991/06/22',
//                'student_number' => '',
//                'contact_number' => '',
//                'street' => '',
//                'suburb' => '',
//                'state' => '',
//                'post_code' => '',
//                'country' => '',
//                'course_id' => '1',
//                'user_type_id' => '1',
//                'university_id' => '1',
//                'status' => $status,
//                'email' => 'SysAdmin'.$x.'@gmail.com',
//                'password' => Hash::make('SysAdmin'.$x),
//            ]);
//        }
//
//        for($x=1; $x<=10; $x++) {
//            $status = $x % 2 == 0 ? 1: 0;
//            DB::table('users')->insert([
//                'first_name' => 'UniAdmin '.$x,
//                'last_name' => 'Dummy '.$x,
//                'date_of_birth' => '1991/06/22',
//                'student_number' => '',
//                'contact_number' => '',
//                'street' => '',
//                'suburb' => '',
//                'state' => '',
//                'post_code' => '',
//                'country' => '',
//                'user_type_id' => '2',
//                'course_id' => '1',
//                'university_id' => '1',
//                'status' => $status,
//                'email' => 'UniAdmin'.$x.'@gmail.com',
//                'password' => Hash::make('UniAdmin'.$x),
//            ]);
//        }
//        for($x=1; $x<=10; $x++) {
//            $status = $x % 2 == 0 ? 1: 0;
//            DB::table('users')->insert([
//                'first_name' => 'Approver '.$x,
//                'last_name' => 'Dummy '.$x,
//                'date_of_birth' => '1991/06/22',
//                'student_number' => '',
//                'contact_number' => '',
//                'street' => '',
//                'suburb' => '',
//                'state' => '',
//                'post_code' => '',
//                'country' => '',
//                'user_type_id' => '3',
//                'course_id' => '1',
//                'university_id' => '1',
//                'status' => $status,
//                'email' => 'Approver'.$x.'@gmail.com',
//                'password' => Hash::make('Approver'.$x),
//            ]);
//        }
//        for($x=1; $x<=10; $x++) {
//            $status = $x % 2 == 0 ? 1: 0;
//            DB::table('users')->insert([
//                'first_name' => 'Applicant '.$x,
//                'last_name' => 'Dummy '.$x,
//                'date_of_birth' => '1991/06/22',
//                'student_number' => 'S00000'.$x,
//                'contact_number' => '',
//                'street' => '',
//                'suburb' => '',
//                'state' => '',
//                'post_code' => '',
//                'country' => '',
//                'user_type_id' => '4',
//                'course_id' => '1',
//                'university_id' => '1',
//                'status' => $status,
//                'email' => 'Applicant'.$x.'@gmail.com',
//                'password' => Hash::make('Applicant'.$x),
//            ]);
//        }
    }
}
