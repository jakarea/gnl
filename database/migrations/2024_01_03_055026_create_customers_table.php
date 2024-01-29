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
        Schema::create('customers', function (Blueprint $table) {
            $table->id('customer_id')->autoIncrement();
            $table->foreignId('lead_type_id')->nullable()->constrained('lead_types', 'lead_type_id')->cascadeOnDelete();
            $table->foreignId('service_type_id')->nullable()->constrained('service_types', 'service_type_id')->cascadeOnDelete();
            $table->string('name');
            $table->string('avatar')->nullable();
            $table->string('designation')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('location')->nullable();
            $table->string('status')->default(true);
            $table->string('kvk')->nullable();
            $table->string('service')->nullable();
            $table->string('company')->nullable();
            $table->string('website')->nullable();
            $table->longText('details')->nullable();
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
        Schema::dropIfExists('customers');
    }
};
