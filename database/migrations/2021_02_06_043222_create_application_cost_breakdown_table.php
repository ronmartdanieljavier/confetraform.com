<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationCostBreakdownTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_cost_breakdown', function (Blueprint $table) {
            $table->id();
            $table->integer("application_id");
            $table->string("cost_name");
            $table->text("cost_description")->nullable();
            $table->decimal( "old_amount",16, 2);
            $table->decimal( "new_amount",16, 2);
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
        Schema::dropIfExists('application_cost_breakdown');
    }
}
