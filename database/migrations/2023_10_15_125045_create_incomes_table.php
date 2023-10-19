<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('income_type_id')->unsigned()->nullable();
            $table->foreign('income_type_id')->references('id')->on('income_types')->onDelete('cascade');
            $table->bigInteger('transaction_method_id')->unsigned()->nullable();
            $table->foreign('transaction_method_id')->references('id')->on('transaction_methods')->onDelete('cascade');
            $table->string('income_name')->nullable();
            $table->double('income_amount',10,2)->nullable();
            $table->string('income_date')->nullable();
            $table->text('income_description')->nullable();
            $table->boolean('status')->default(1);
            $table->string('updated_by')->nullable();
            $table->string('created_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incomes');
    }
};
