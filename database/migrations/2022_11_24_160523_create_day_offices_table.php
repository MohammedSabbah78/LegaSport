<?php

use App\Models\Day;
use App\Models\Office;
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
        Schema::create('day_offices', function (Blueprint $table) {
            $table->id();
            $table->time('work_from')->nullable();
            $table->time('work_to')->nullable();
            $table->foreignIdFor(Day::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Office::class)->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('day_offices');
    }
};
