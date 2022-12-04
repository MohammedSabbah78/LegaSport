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
        Schema::create('academies', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Nationality::class)->constrained()->cascadeOnDelete();
            $table->string('latitude');
            $table->string('longitude');
            $table->integer('num_sports');
            $table->string('accdemy_conditions');
            $table->string('accrediation');
            $table->enum('accept_gender',['M','F']);
            $table->date('date_establishment');
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
        Schema::dropIfExists('academies');
    }
};
