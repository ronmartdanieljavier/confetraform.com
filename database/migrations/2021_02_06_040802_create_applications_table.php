<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string("form_name");
            $table->string("form_description");
            $table->integer("application_status_id");
            $table->integer("created_by");
            $table->timestamp('created_at', 0);
            $table->text("created_by_comment")->nullable();
            $table->integer("reviewed_by")->nullable();
            $table->timestamp('reviewed_at', 0)->nullable();
            $table->text("reviewed_by_comment")->nullable();
            $table->integer("processed_by")->nullable();
            $table->timestamp('processed_at', 0)->nullable();
            $table->text("processed_by_comment")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
