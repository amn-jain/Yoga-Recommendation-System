<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsanasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asanas', function (Blueprint $table) {
            $table->id('AID');
            $table->string('AName')->nullable();
            $table->longText('Description')->nullable();
            $table->longText('Benefits')->nullable();
            $table->longText('ContraIndications')->nullable();
            $table->longText('Breathing')->nullable();
            $table->longText('Awareness')->nullable();
            $table->string('Youtube-Link')->nullable();
            $table->string('Photo')->nullable();
            $table->string('References')->nullable();
            $table->longText('Variations')->nullable();
            $table->string('Level')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asanas');
    }
}
