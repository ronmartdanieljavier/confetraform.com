<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string("student_number")->nullable();
            $table->string("contact_number")->nullable();
            $table->string("street")->nullable();
            $table->string("suburb")->nullable();
            $table->string("state")->nullable();
            $table->string("post_code", 10)->nullable();
            $table->string("country")->nullable();
            $table->integer("user_type_id");
            $table->integer("course_id")->nullable();;
            $table->integer("department_id")->nullable();;
            $table->integer("university_id")->nullable();
            $table->boolean("status")->default(true);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
