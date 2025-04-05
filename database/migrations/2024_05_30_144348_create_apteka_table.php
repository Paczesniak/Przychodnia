<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAptekaTable extends Migration
{
    public function up()
    {
        Schema::create('apteka', function (Blueprint $table) {
            $table->id();
            $table->string('miasto', 50);
            $table->string('ulica', 100);
            $table->string('numer', 10);
            $table->string('telefon', 9);
            $table->string('email', 50);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('apteka');
    }
}
