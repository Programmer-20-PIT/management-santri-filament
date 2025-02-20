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

        Schema::create('assessments', function (Blueprint $table) {
            $table->id();
            $table->string('santri_id')->nullable();
            $table->unsignedBigInteger('lesson_id')->nullable();
            $table->decimal('score', 5, 2)->nullable();
            $table->text('evaluation')->nullable();
            $table->dateTime('date')->nullable();
            $table->timestamps();

            // Foreign key constraints
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('subject_id')->references('id')->on('lessons')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assessments');
    }
};
