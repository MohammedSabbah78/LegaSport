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
        Schema::create('sport_translations', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50);
            $table->foreignId('language_id')->constrained();
            $table->foreignId('city_id')->constrained();
            $table->foreignId('country_id')->constrained();
            $table->foreignId('sport_id')->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('sport_translations');
    }
};
