<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLekarzTable extends Migration
{
    public function up()
    {
        Schema::create('lekarz', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('imie', 40);
            $table->string('nazwisko', 40);
            $table->string('telefon', 9);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lekarz');
    }
}

