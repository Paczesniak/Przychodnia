<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriaWizytTable extends Migration
{
    public function up()
    {
        Schema::create('historia_wizyt', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pacjent')->constrained('pacjent');
            $table->foreignId('id_lekarz')->constrained('lekarz');
            $table->date('data_wizyty');
            $table->string('opis', 255);
            $table->unsignedBigInteger('choroba_id')->nullable();
            $table->unsignedBigInteger('leczenie_id')->nullable();
            $table->foreign('choroba_id')->references('id')->on('choroba');
            $table->foreign('leczenie_id')->references('id')->on('lekarstwo');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('historia_wizyt');
    }
}
