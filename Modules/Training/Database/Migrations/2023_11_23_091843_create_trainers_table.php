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
        if (!Schema::hasTable('trainers')) {
            Schema::create('trainers', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('branch');
                $table->string('firstname');
                $table->string('lastname');
                $table->string('contact');
                $table->string('email');
                $table->text('address')->nullable();
                $table->text('expertise')->nullable();
                $table->integer('workspace')->nullable();
                $table->integer('created_by');
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
        Schema::dropIfExists('trainers');
    }
};
