<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLekarstwoTable extends Migration
{
    public function up()
    {
        Schema::create('lekarstwo', function (Blueprint $table) {
            $table->id();
            $table->string('nazwa', 100);
            $table->boolean('dostepnosc');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lekarstwo');
    }
}
