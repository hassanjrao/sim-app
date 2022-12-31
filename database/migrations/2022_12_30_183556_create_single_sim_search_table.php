<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSingleSimSearchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('single_sim_search', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('scanned_by');
            $table->foreign('scanned_by')->references('id')->on('users')->onDelete('cascade');


            $table->unsignedBigInteger('system_sim_id')->nullable();
            $table->foreign('system_sim_id')->references('id')->on('system_sims')->onDelete('cascade');

            $table->string('lat')->nullable();
            $table->string('lng')->nullable();


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
        Schema::dropIfExists('single_sim_search');
    }
}
