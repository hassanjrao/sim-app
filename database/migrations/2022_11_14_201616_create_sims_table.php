<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sims', function (Blueprint $table) {
            $table->id();

            $table->string("sim_number");

            $table->unsignedBigInteger("store_id");
            $table->foreign("store_id")->references("id")->on("stores")->onDelete("cascade");

            $table->unsignedBigInteger("added_by");
            $table->foreign("added_by")->references("id")->on("users")->onDelete("cascade");

            $table->string("scanned_lat");
            $table->string("scanned_long");

            $table->softDeletes();

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
        Schema::dropIfExists('sims');
    }
}
