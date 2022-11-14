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
        Schema::create('federation_translations', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->foreignId('city_id')->constrained();
            $table->foreignId('country_id')->constrained();
            $table->foreignId('sport_id')->constrained();
            $table->foreignId('language_id')->constrained();
            $table->foreignId('federation_id')->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('federation_translations');
    }
};
