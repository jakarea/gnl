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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id('expense_id')->autoIncrement();
            $table->foreignId('lead_type_id')->nullable()->constrained('lead_types', 'lead_type_id')->cascadeOnDelete();
            $table->string('title');
            $table->string('pay_date');
            $table->string('service_type');
            $table->decimal('amount', 8,2);
            $table->decimal('tax', 8, 2);
            $table->string('type');
            $table->longText('description')->nullable();
            $table->string('file')->nullable();
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
        Schema::dropIfExists('expenses');
    }
};
