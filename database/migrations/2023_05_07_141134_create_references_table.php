<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('references', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('logo');
            $table->text('url');
            $table->unsignedBigInteger('testimonial_id')->nullable();

            $table->timestamps();

            $table->foreign('testimonial_id')
                ->references('id')
                ->on('testimonials')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('references');
    }
};
