<?php

use App\Models\Nationality;
use App\Models\User;
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
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Nationality::class)->constrained()->cascadeOnDelete();
            $table->string('image');
            $table->date('birth_date');
            $table->enum('gender',['M','F']);
            $table->double('height');
            $table->double('width');
            $table->string('position');
            $table->double('max_fees');
            $table->enum('classefication',['pro', 'amateur']);
            $table->boolean('isHaveClub');
            $table->string('club_name')->nullable();
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
        Schema::dropIfExists('players');
    }
};
