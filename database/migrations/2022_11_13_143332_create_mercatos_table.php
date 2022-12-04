<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mercatos', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['permanet', 'trmporary']);
            $table->string('image');
            $table->integer('form');
            $table->integer('to');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('salary');
            $table->time('time');
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
        Schema::dropIfExists('mercatos');
    }
};
