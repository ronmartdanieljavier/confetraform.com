<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications_details', function (Blueprint $table) {
            $table->id();
            $table->integer("application_id");
            $table->string("field_section");
            $table->string("field_name");
            $table->string("field_label");
            $table->string("field_type");
            $table->string("field_value");
            $table->integer("field_order");
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
        Schema::dropIfExists('applications_details');
    }
}
