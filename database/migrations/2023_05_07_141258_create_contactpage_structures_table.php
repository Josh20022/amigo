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
        Schema::create('contactpage_structures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('title_id');
            $table->unsignedBigInteger('description_id');
            $table->unsignedBigInteger('form_name_id');
            $table->unsignedBigInteger('form_email_id');
            $table->unsignedBigInteger('form_email_message_id');
            $table->unsignedBigInteger('form_message_id');
            $table->unsignedBigInteger('form_newsletter_id');
            $table->unsignedBigInteger('form_submit_id');
            $table->unsignedBigInteger('office_title_id');
            $table->unsignedBigInteger('office_desc_id');
            $table->unsignedBigInteger('phone_title_id');
            $table->unsignedBigInteger('phone_desc_id');
            $table->unsignedBigInteger('facebook_url_id');
            $table->unsignedBigInteger('instagram_url_id');
            $table->unsignedBigInteger('twitter_url_id');
            $table->unsignedBigInteger('linkedin_url_id');
            $table->timestamps();

            $table->foreign('title_id')
                ->references('id')
                ->on('contactpage_texts')
                ->onDelete('cascade');
    
            $table->foreign('description_id')
                ->references('id')
                ->on('contactpage_texts')
                ->onDelete('cascade');
            
            $table->foreign('form_name_id')
                ->references('id')
                ->on('contactpage_texts')
                ->onDelete('cascade');
            
            $table->foreign('form_email_id')
                ->references('id')
                ->on('contactpage_texts')
                ->onDelete('cascade');
            
            $table->foreign('form_email_message_id')
                ->references('id')
                ->on('contactpage_texts')
                ->onDelete('cascade');
            
            $table->foreign('form_message_id')
                ->references('id')
                ->on('contactpage_texts')
                ->onDelete('cascade');
            
            $table->foreign('form_newsletter_id')
                ->references('id')
                ->on('contactpage_texts')
                ->onDelete('cascade');
            
            $table->foreign('form_submit_id')
                ->references('id')
                ->on('contactpage_texts')
                ->onDelete('cascade');
            
            $table->foreign('office_title_id')
                ->references('id')
                ->on('contactpage_texts')
                ->onDelete('cascade');
            
            $table->foreign('office_desc_id')
                ->references('id')
                ->on('contactpage_texts')
                ->onDelete('cascade');
            
            $table->foreign('phone_title_id')
                ->references('id')
                ->on('contactpage_texts')
                ->onDelete('cascade');
            
            $table->foreign('phone_desc_id')
                ->references('id')
                ->on('contactpage_texts')
                ->onDelete('cascade');
            
            $table->foreign('facebook_url_id')
                ->references('id')
                ->on('contactpage_texts')
                ->onDelete('cascade');
            
            $table->foreign('instagram_url_id')
                ->references('id')
                ->on('contactpage_texts')
                ->onDelete('cascade');
            
            $table->foreign('twitter_url_id')
                ->references('id')
                ->on('contactpage_texts')
                ->onDelete('cascade');
            
            $table->foreign('linkedin_url_id')
                ->references('id')
                ->on('contactpage_texts')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contactpage_structures');
    }
};
