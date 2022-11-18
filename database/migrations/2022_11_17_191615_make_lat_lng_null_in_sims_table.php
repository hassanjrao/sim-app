<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeLatLngNullInSimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sims', function (Blueprint $table) {

            $table->float("scanned_lat")->nullable()->change();
            $table->float("scanned_long")->nullable()->change();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sims', function (Blueprint $table) {

            $table->float("scanned_lat")->nullable(false)->change();
            $table->float("scanned_long")->nullable(false)->change();

        
        });
    }
}
