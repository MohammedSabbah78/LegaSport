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
        Schema::create('office_translations', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('address1');
            $table->string('address2');
            
            $table->foreignId('language_id')->constrained();
            $table->foreignId('office_id')->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('office_translations');
    }
};
