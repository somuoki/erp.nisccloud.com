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
        if (!Schema::hasTable('trainings')) {
            Schema::create('trainings', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->integer('user_id');
                $table->integer('branch');
                $table->integer('trainer_option');
                $table->integer('training_type');
                $table->integer('trainer');
                $table->float('training_cost')->default(0.00);
                $table->integer('employee');
                $table->date('start_date');
                $table->date('end_date');
                $table->longText('description')->nullable();
                $table->integer('performance')->default(0);
                $table->integer('status')->default(0);
                $table->text('remarks')->nullable();
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
        Schema::dropIfExists('trainings');
    }
};
