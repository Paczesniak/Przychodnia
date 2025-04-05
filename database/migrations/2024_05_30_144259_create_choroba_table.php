<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChorobaTable extends Migration
{
    public function up()
    {
        Schema::create('choroba', function (Blueprint $table) {
            $table->id();
            $table->string('nazwa', 100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('choroba');
    }
}
