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
        Schema::create('outsource_invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('manager_id');
            $table->unsignedBigInteger('watervend_id');
            $table->string('vend_name');
            $table->string('national_number');
            $table->string('invoice_number');
            $table->string('invoice_type');
            $table->string('invoice_description');
            $table->string('amount_invoiced');
            $table->string('balance');
            $table->string('invoice_status')->default('unpaid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outsource_invoices');
    }
};
