<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChorobaLekarstwoTable extends Migration
{
    public function up()
    {
        Schema::create('choroba_lekarstwo', function (Blueprint $table) {
            $table->foreignId('id_choroby')->constrained('choroba');
            $table->foreignId('id_lekarstwa')->constrained('lekarstwo');
            $table->primary(['id_choroby', 'id_lekarstwa']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('choroba_lekarstwo');
    }
}
