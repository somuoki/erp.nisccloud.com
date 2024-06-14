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
        if (!Schema::hasTable('interview_schedules')) {
            Schema::create('interview_schedules', function (Blueprint $table) {
                $table->id();
                $table->integer('candidate');
                $table->integer('user_id')->default(0);
                $table->integer('employee')->default(0);
                $table->date('date');
                $table->time('time');
                $table->text('comment')->nullable();
                $table->string('employee_response')->nullable();
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
        Schema::dropIfExists('interview_schedules');
    }
};