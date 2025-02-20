<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('santri_families', function (Blueprint $table) {
            $table->id();
            $table->string('santri_id')->nullable();
            $table->string('no_kk');
            $table->string('father_name');
            $table->string('father_job');
            $table->integer('father_birth');
            $table->string('father_phone');
            $table->string('mother_name');
            $table->string('mother_job');
            $table->integer('mother_birth');
            $table->string('mother_phone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('santri_families');
    }
};
