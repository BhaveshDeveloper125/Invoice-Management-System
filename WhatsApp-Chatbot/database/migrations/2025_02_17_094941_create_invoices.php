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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('Invoice_ID')->unique()->nullable();
            $table->text('Name');
            $table->string('Email');
            $table->date('Transaction_Date');
            $table->date('Birth_date');
            $table->float('Amount');
            $table->string('Status');
            $table->text('InvoicePDF');
            $table->string('phone', 10);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
