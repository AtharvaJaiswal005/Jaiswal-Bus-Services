<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_data', function (Blueprint $table) {
            $table->id();
            $table->string('ip');
            $table->date('res_date')->nullable();
            $table->integer('bus_id');
            $table->integer('from_id');
            $table->integer('to_id');
            $table->integer('route_id');
            $table->float('route_price');
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
        Schema::dropIfExists('temp_data');
    }
}
