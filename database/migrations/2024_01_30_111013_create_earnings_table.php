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
        Schema::create('earnings', function (Blueprint $table) {
            $table->id('earning_id')->autoIncrement();
            $table->foreignId('customer_id')->constrained('customers','customer_id')->onDelete('cascade');
            $table->decimal('amount', 8, 2);
            $table->decimal('tax', 8, 2);
            $table->string('pay_status');
            $table->string('pay_services');
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
        Schema::dropIfExists('earnings');
    }
};
