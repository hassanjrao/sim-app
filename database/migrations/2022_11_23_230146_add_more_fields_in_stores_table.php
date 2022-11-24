<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreFieldsInStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stores', function (Blueprint $table) {
            $table->string("city")->nullable()->after("address");
            $table->string("telephone")->nullable()->after("city");
            $table->string("post_code")->nullable()->after("telephone");

            $table->string("address")->unique()->change();
            $table->string("name")->unique()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stores', function (Blueprint $table) {

            $table->dropColumn([
                "city",
                "telephone",
                "post_code"
            ]);

            $table->string("address")->change();
            $table->string("name")->change();


        });
    }
}
