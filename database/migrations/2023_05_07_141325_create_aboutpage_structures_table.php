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
        Schema::create('aboutpage_structures', function (Blueprint $table) {
            $table->id();
            $table->text('structure');
            $table->unsignedBigInteger('title_id');
            $table->unsignedBigInteger('description1_id');
            $table->unsignedBigInteger('description2_id');
            $table->unsignedBigInteger('team_title_id');
            $table->timestamps();

            $table->foreign('title_id')->references('id')->on('aboutpage_texts')->onDelete('cascade');
            $table->foreign('description1_id')->references('id')->on('aboutpage_texts')->onDelete('cascade');
            $table->foreign('description2_id')->references('id')->on('aboutpage_texts')->onDelete('cascade');
            $table->foreign('team_title_id')->references('id')->on('aboutpage_texts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aboutpage_structures');
    }
};
