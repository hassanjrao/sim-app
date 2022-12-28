<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMultipleSearchSimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multiple_sim_searches', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("sim_id");
            $table->foreign("sim_id")->references("id")->on("sims")->onDelete("cascade");

            $table->string("lat");
            $table->string("lng");

            $table->unsignedBigInteger('scanned_by');
            $table->foreign('scanned_by')->references('id')->on('users')->onDelete('cascade');


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
        Schema::dropIfExists('multiple_sim_searches');
    }
}
