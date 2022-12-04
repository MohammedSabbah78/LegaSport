<?php

use App\Models\City;
use App\Models\Country;
use App\Models\Language;
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
        Schema::table('users', function (Blueprint $table) {
            $table->foreignIdFor(Country::class)->nullable()->after('status')->constrained()->cascadeOnDelete();
            $table->foreignIdFor(City::class)->nullable()->after('status')->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Language::class)->after('status')->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeignIdFor(Country::class);
            $table->dropForeignIdFor(City::class);
            $table->dropForeignIdFor(Language::class);
        });
    }
};
