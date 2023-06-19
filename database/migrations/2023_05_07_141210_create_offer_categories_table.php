<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('offer_categories', function (Blueprint $table) {
            $table->id();
            $table->timestamp('datum')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->text('titel');
            $table->unsignedBigInteger('pl');
            $table->integer('volgorde');
            $table->text('url');
            $table->longText('omschrijving');
            $table->text('metatitel');
            $table->text('metadesc');
            $table->text('metakeys');
            $table->unsignedBigInteger('hoofdcat');
            $table->timestamps();

            $table->foreign('pl')->references('id')->on('plaatjes');
            $table->foreign('hoofdcat')->references('id')->on('offers');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offer_categories');
    }
};
