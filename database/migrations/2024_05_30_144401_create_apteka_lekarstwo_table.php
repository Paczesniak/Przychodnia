<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAptekaLekarstwoTable extends Migration
{
    public function up()
    {
        Schema::create('apteka_lekarstwo', function (Blueprint $table) {
            $table->foreignId('id_apteki')->constrained('apteka');
            $table->foreignId('id_lekarstwa')->constrained('lekarstwo');
            $table->primary(['id_apteki', 'id_lekarstwa']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('apteka_lekarstwo');
    }
}
