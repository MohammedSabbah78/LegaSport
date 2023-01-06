<?php

use App\Models\Country;
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
        Schema::create('request_verifications', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Country::class)->constrained()->cascadeOnDelete();
            $table->string('full_name');
            $table->string('birth_certificate');
            $table->string('personal_id_image');
            $table->string('citizenchip_certificate');
            $table->enum('blood_type',['A+','A-','O+','O-','B+','B-','AB']);
            $table->string('postal_code');
            $table->string('social_acount1');
            $table->string('social_acount2');
            $table->double('cost')->nullable();
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
        Schema::dropIfExists('request_verifications');
    }
};
