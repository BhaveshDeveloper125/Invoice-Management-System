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
        Schema::create('invoices_datas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone', 10);
            $table->string('item1');
            $table->string('item2');
            $table->text('media')->nullable();
            $table->text('URL')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices_datas');
    }
};
