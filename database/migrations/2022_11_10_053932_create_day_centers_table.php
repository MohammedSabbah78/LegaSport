<?php

use App\Models\Center;
use App\Models\Day;
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
        Schema::create('day_centers', function (Blueprint $table) {
            $table->id();
            $table->time('start_time')->nullable();
            $table->time('close_time')->nullable();
            $table->foreignIdFor(Day::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Center::class)->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('day_centers');
    }
};
