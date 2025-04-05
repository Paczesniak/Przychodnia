<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacjentTable extends Migration
{
    public function up()
    {
        Schema::create('pacjent', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('imie');
            $table->string('nazwisko');
            $table->string('pesel')->unique();
            $table->string('telefon');
            $table->date('data_urodzenia');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pacjent');
    }
}
