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
        Schema::create('mpesa_b2c', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('partner_id');
            $table->string('ResultType')->nullable();
            $table->string('ResultCode')->nullable();
            $table->string('ResultDesc')->nullable();
            $table->string('OriginatorConversationID')->nullable();
            $table->string('ConversationID')->nullable();
            $table->string('TransactionID')->nullable();
            $table->string('TransactionAmount')->nullable();
            $table->string('RegisteredCustomer')->nullable();
            $table->string('ReceiverPartyPublicName')->nullable();
            $table->string('B2CChargesPaidAccountAvailableFunds')->nullable();
            $table->string('B2CUtilityAccountAvailableFunds')->nullable();
            $table->string('B2CWorkingAccountAvailableFunds')->nullable();
            $table->string('TransactionDateTime')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mpesa_b2_c_s');
    }
};
