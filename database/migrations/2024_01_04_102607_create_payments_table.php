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
        Schema::create('payments', function (Blueprint $table) {
            $table->id('payment_id')->autoIncrement();
            $table->foreignId('customer_id')->constrained('payments', 'customer_id')->cascadeOnDelete();
            $table->decimal('amount', 8, 2);
            $table->decimal('tax', 8, 2);
            $table->string('pay_status');
            $table->string('payment_service');
            $table->string('pay_date');
            $table->string('pay_type');
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
        Schema::dropIfExists('payments');
    }
};
