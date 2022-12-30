<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeForeignKeySimIdInMultipleSimSearchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('multiple_sim_searches', function (Blueprint $table) {

            $table->dropForeign('multiple_sim_searches_sim_id_foreign');
            $table->dropColumn('sim_id');

            $table->unsignedBigInteger('system_sim_id')->nullable()->after('id');
            $table->foreign('system_sim_id')->references('id')->on('system_sims')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('multiple_sim_searches', function (Blueprint $table) {

            $table->dropForeign('multiple_sim_searches_system_sim_id_foreign');
            $table->dropColumn('system_sim_id');

            $table->unsignedBigInteger('sim_id')->nullable();
            $table->foreign('sim_id')->references('id')->on('sims')->onDelete('cascade');

        });
    }
}
