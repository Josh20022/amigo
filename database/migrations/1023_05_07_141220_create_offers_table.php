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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->timestamp('datum')->useCurrent();
            $table->text('titel');
            $table->unsignedBigInteger('pl');
            $table->unsignedBigInteger('banner')->nullable();
            $table->integer('volgorde');
            $table->text('url');
            $table->longText('omschrijving');
            $table->text('metatitel');
            $table->text('metadesc');
            $table->text('metakeys');
            $table->unsignedBigInteger('hoofdcat')->nullable();
            $table->timestamps();

            $table->foreign('pl')->references('id')->on('plaatjes');
            $table->foreign('banner')->references('id')->on('plaatjes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
