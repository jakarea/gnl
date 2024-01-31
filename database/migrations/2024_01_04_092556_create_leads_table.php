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
        Schema::create('leads', function (Blueprint $table) {
            $table->id('lead_id');
            $table->string('avatar')->nullable();
            $table->string('name');
            $table->unsignedBigInteger('lead_type_id');
            $table->string('phone')->nullable();
            $table->string('email');
            $table->string('linkedin')->nullable();
            $table->string('instagram')->nullable(); 
            $table->string('company')->nullable();
            $table->string('website')->nullable();
            $table->string('kvk')->nullable();
            $table->string('state')->nullable()->default('new');
            $table->string('lead_order')->nullable();
            $table->string('status')->nullable()->default('active');
            $table->text('note')->nullable();
            $table->timestamps();

            $table->foreign('lead_type_id')->references('lead_type_id')->on('lead_types')->onDelete('cascade'); // Cascade deletion of associated leads


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leads');
    }
};
