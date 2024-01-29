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
        Schema::create('projects', function (Blueprint $table) {
            $table->id('project_id')->autoIncrement();
            $table->foreignId('customer_id')->nullable()->constrained('customers', 'customer_id')->cascadeOnDelete();
            $table->string('thumbnail')->nullable();
            $table->string('title');
            $table->decimal('amount', 8, 2);
            $table->decimal('tax', 8, 2);
            $table->string('start_date');
            $table->string('end_date');
            $table->string('note')->nullable();
            $table->string('priority');
            $table->longText('description')->nullable();
            $table->string('status')->default('in_progress');
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
        Schema::dropIfExists('projects');
    }
};
