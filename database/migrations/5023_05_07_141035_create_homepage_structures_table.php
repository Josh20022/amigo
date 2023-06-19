<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomepageStructuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homepage_structures', function (Blueprint $table) {
            $table->id();
            $table->text('section');
            $table->unsignedBigInteger('header_text_id')->nullable();
            $table->unsignedBigInteger('title_text_id')->nullable();
            $table->unsignedBigInteger('button1_id')->nullable();
            $table->unsignedBigInteger('button2_id')->nullable();
            $table->unsignedBigInteger('quality_title_id')->nullable();
            $table->unsignedBigInteger('quality_1_id')->nullable();
            $table->unsignedBigInteger('quality_2_id')->nullable();
            $table->unsignedBigInteger('quality_3_id')->nullable();
            $table->unsignedBigInteger('quality_4_id')->nullable();
            $table->unsignedBigInteger('quality_5_id')->nullable();
            $table->unsignedBigInteger('reference_title_id')->nullable();
            $table->timestamps();

            $table->foreign('header_text_id')
                  ->references('id')
                  ->on('homepage_texts')
                  ->onDelete('cascade');

            $table->foreign('title_text_id')
                  ->references('id')
                  ->on('homepage_texts')
                  ->onDelete('cascade');

            $table->foreign('button1_id')
                  ->references('id')
                  ->on('homepage_buttons')
                  ->onDelete('cascade');

            $table->foreign('button2_id')
                  ->references('id')
                  ->on('homepage_buttons')
                  ->onDelete('cascade');

            $table->foreign('quality_title_id')
                  ->references('id')
                  ->on('homepage_texts')
                  ->onDelete('cascade');

            $table->foreign('quality_1_id')
                  ->references('id')
                  ->on('homepage_texts')
                  ->onDelete('cascade');

            $table->foreign('quality_2_id')
                  ->references('id')
                  ->on('homepage_texts')
                  ->onDelete('cascade');

            $table->foreign('quality_3_id')
                  ->references('id')
                  ->on('homepage_texts')
                  ->onDelete('cascade');

            $table->foreign('quality_4_id')
                  ->references('id')
                  ->on('homepage_texts')
                  ->onDelete('cascade');

            $table->foreign('quality_5_id')
                  ->references('id')
                  ->on('homepage_texts')
                  ->onDelete('cascade');

            $table->foreign('reference_title_id')
                  ->references('id')
                  ->on('homepage_texts')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('homepage_structures');
    }
}
