<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLekarzSpecjalizacjaTable extends Migration
{
    public function up()
    {
        Schema::create('lekarz_specjalizacja', function (Blueprint $table) {
            $table->foreignId('id_lekarza')->constrained('lekarz');
            $table->foreignId('id_specjalizacji')->constrained('specjalizacja');
            $table->primary(['id_lekarza', 'id_specjalizacji']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('lekarz_specjalizacja');
    }
}
