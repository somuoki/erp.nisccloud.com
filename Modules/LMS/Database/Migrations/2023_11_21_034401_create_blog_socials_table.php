<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('blog_socials'))
        {
            Schema::create('blog_socials', function (Blueprint $table) {
                $table->id();
                $table->string('enable_social_button')->default('off')->nullable();
                $table->string('enable_email')->default('off')->nullable();
                $table->string('enable_twitter')->default('off')->nullable();
                $table->string('enable_facebook')->default('off')->nullable();
                $table->string('enable_googleplus')->default('off')->nullable();
                $table->string('enable_linkedIn')->default('off')->nullable();
                $table->string('enable_pinterest')->default('off')->nullable();
                $table->string('enable_stumbleupon')->default('off')->nullable();
                $table->string('enable_whatsapp')->default('off')->nullable();
                $table->integer('workspace_id')->default(0);
                $table->integer('created_by')->default(0);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_socials');
    }
};
