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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('manager_id');
            $table->unsignedBigInteger('tenant_id');
            $table->string('tenant_name');
            $table->string('national_id', 20);
            $table->string('receipt_number', 40);
            $table->string('reference_number', 40);
            $table->string('mode_of_payment', 30);
            $table->integer('amount');
            $table->integer('balance');
            $table->string('status', 30);
            $table->date('paid_date');
            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
