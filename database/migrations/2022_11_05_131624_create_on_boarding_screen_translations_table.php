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
        Schema::create('on_boarding_screen_translations', function (Blueprint $table) {
            $table->id();
            $table->string('title',50);
            $table->mediumText('body');
            $table->foreignId('language_id')->constrained();
            $table->foreignId('on_boarding_screen_id')->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('on_boarding_screen_translations');
    }
};
