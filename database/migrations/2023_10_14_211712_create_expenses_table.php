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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('expense_type_id')->unsigned()->nullable();
            $table->foreign('expense_type_id')->references('id')->on('expense_types')->onDelete('cascade');
            $table->bigInteger('transaction_method_id')->unsigned()->nullable();
            $table->foreign('transaction_method_id')->references('id')->on('transaction_methods')->onDelete('cascade');
            $table->string('expense_name')->nullable();
            $table->double('expense_amount',10,2)->nullable();
            $table->string('expense_date')->nullable();
            $table->text('expense_description')->nullable();
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
        Schema::dropIfExists('expenses');
    }
};
