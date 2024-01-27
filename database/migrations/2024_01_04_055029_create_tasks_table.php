<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id('task_id')->autoIncrement();
            $table->foreignId('customer_id')->constrained('customers', 'customer_id')->cascadeOnDelete();
            $table->foreignId('project_id')->constrained('projects', 'project_id')->cascadeOnDelete();
            $table->json('customer_id');
            $table->string('title');
            $table->string('priority');
            $table->string('date');
            $table->string('start_time');
            $table->string('end_time');
            $table->string('file')->nullable();
            $table->string('created_by');
            $table->longText('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
