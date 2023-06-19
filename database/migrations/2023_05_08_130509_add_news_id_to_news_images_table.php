<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('news_images', function (Blueprint $table) {
            $table->unsignedBigInteger('news_id')->default(0);
            $table->foreign('news_id')->references('id')->on('news')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::table('news_images', function (Blueprint $table) {
            $table->dropForeign(['news_id']);
            $table->dropColumn('news_id');
        });
    }    
};
