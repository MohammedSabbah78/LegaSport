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
        Schema::create('club_translations', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('name_manger', 50);
            $table->foreignId('city_id')->constrained();
            $table->foreignId('language_id')->constrained();
            $table->foreignId('club_id')->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('club_translations');
    }
};
