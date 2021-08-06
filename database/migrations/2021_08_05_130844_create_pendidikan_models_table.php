<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendidikanModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendidikan_models', function (Blueprint $table) {
            $table  ->id();
            $table  ->enum('type', ['sd', 'smp', 'sma', 'pg']);
            $table  ->string('nama');
            $table  ->string('th_lulus');
            $table  ->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendidikan_models');
    }
}
