<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataWeather extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weather_data', function (Blueprint $table) {
            $table->id('id');
            $table->bigInteger('id_stacji');
            $table->string('stacja');
            $table->string('data_pomiaru');
            $table->bigInteger('godzina_pomiaru');
            $table->float('temperatura');
            $table->bigInteger('predkosc_wiatru');
            $table->bigInteger('kierunek_wiatru');
            $table->float('wilgotnosc_wzgledna');
            $table->float('suma_opadu');
            $table->float('cisnienie')->nullable();
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weather_data');
    }
}
