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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('chart_of_account_id')->unsigned()->nullable();
            $table->foreign('chart_of_account_id')->references('id')->on('chart_of_accounts')->onDelete('cascade');
            $table->bigInteger('transaction_method_id')->unsigned()->nullable();
            $table->foreign('transaction_method_id')->references('id')->on('transaction_methods')->onDelete('cascade');
            $table->string('voucher_type')->nullable();
            $table->string('tran_type')->nullable();
            $table->string('acc_head')->nullable();
            $table->double('amount',10,2)->nullable();
            $table->string('date')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('vouchers');
    }
};
