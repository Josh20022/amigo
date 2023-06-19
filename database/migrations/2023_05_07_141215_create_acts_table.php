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
        Schema::create('acts', function (Blueprint $table) {
            $table->id();
            $table->timestamp('datum')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->text('titel');
            $table->longText('omschrijving');
            $table->text('soort');
            $table->text('tijdsduur');
            $table->longText('bijzonderheden');
            $table->text('youtube');
            $table->decimal('prijs', 6, 2);
            $table->unsignedBigInteger('pl1')->nullable();
            $table->unsignedBigInteger('pl2')->nullable();
            $table->unsignedBigInteger('pl3')->nullable();
            $table->unsignedBigInteger('pl4')->nullable();
            $table->unsignedBigInteger('pl5')->nullable();
            $table->text('txt1');
            $table->text('txt2');
            $table->text('txt3');
            $table->text('txt4');
            $table->text('txt5');
            $table->integer('volgorde');
            $table->text('metatitel');
            $table->text('metadesc');
            $table->text('metakeys');
            $table->text('url');
            $table->unsignedBigInteger('cat');
            $table->decimal('meerprijs', 6, 2);
            $table->tinyInteger('ticker');
            $table->timestamps();

            $table->foreign('pl1')->references('id')->on('plaatjes');
            $table->foreign('pl2')->references('id')->on('plaatjes');
            $table->foreign('pl3')->references('id')->on('plaatjes');
            $table->foreign('pl4')->references('id')->on('plaatjes');
            $table->foreign('pl5')->references('id')->on('plaatjes');
            $table->foreign('cat')->references('id')->on('offer_categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acts');
    }
};
