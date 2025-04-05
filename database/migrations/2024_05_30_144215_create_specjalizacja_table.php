<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecjalizacjaTable extends Migration
{
    public function up()
    {
        Schema::create('specjalizacja', function (Blueprint $table) {
            $table->id();
            $table->string('nazwa', 100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('specjalizacja');
    }
}

