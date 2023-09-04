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
        Schema::create('managers', function (Blueprint $table) {
            $table->id();
            $table->string('contact_number',20);
            $table->string('national_id',30);
            $table->string('residence',100);
            $table->string('type',30);
            $table->string('org_brand');
            $table->string('org_address');
            $table->string('org_email',50);
            $table->string('org_logo')->nullable();
            $table->integer('commision')->nullable();
            $table->boolean('paid_subscription')->default(false);
            $table->string('payment_method',40);
            $table->string('card_number')->nullable();
            $table->integer('cvc')->nullable();
            $table->date('expiry_date')->nullable();
            $table->boolean('is_invoiced');
            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('managers');
    }
};
