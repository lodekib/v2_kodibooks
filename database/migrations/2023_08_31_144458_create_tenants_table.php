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
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('manager_id');
            $table->unsignedBigInteger('property_id');
            $table->string('full_names');
            $table->string('email',50);
            $table->string('phone_number',20);
            $table->string('id_number',15);
            $table->string('property_name',100);
            $table->string('unit_name',15);
            $table->integer('arrears');
            $table->integer('surplus');
            $table->integer('rent');
            $table->integer('deposit');
            $table->integer('balance');
            $table->date('entry_date');
            $table->string('status',15)->default('inactive');
            $table->boolean('is_paid')->default(false);
            $table->boolean('is_water_invoiced')->default(false);
            $table->boolean('is_rent_invoiced')->default(false);
            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
};
