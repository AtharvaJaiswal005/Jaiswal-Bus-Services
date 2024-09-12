<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id('reservations_id');
            $table->integer('status')->default(3); //2- approved, 3-pending, 4-reject
            $table->date('reservation_date');
            $table->unsignedBigInteger('clnt_id');
            $table->foreign('clnt_id')->references('clnt_id')->on('clients');
            $table->unsignedBigInteger('bus_id');
            $table->foreign('bus_id')->references('bus_id')->on('buses');
            $table->unsignedBigInteger('route_id');
            $table->foreign('route_id')->references('route_id')->on('bus_routes');
            $table->unsignedBigInteger('city_first');
            $table->foreign('city_first')->references('city_id')->on('cities');
            $table->unsignedBigInteger('city_second');
            $table->foreign('city_second')->references('city_id')->on('cities');
            $table->integer('seats_count');
            $table->json('seats');
            $table->text('notice')->nullable();
            $table->float('price_per_one_seat');
            $table->float('price_total');
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
        Schema::dropIfExists('reservations');
    }
}
