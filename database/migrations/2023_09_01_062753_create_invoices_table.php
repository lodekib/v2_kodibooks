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
            $table->unsignedBigInteger('manager_id');
            $table->unsignedBigInteger('tenant_id');
            $table->string('tenant_name',100);
            $table->string('property_name');
            $table->string('unit_name',30);
            $table->string('national_id',20);
            $table->string('invoice_number',50);
            $table->string('invoice_type',40);
            $table->text('invoice_description');
            $table->string('invoice_status',30);
            $table->integer('amount_invoiced');
            $table->integer('balance');
            $table->date('due_date');
            $table->date('from');
            $table->date('to');
            $table->timestamps();

            $table->softDeletes();
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
