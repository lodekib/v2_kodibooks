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
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_id');
            $table->unsignedBigInteger('manager_id');
            $table->unsignedBigInteger('tenant_id')->nullable();
            $table->string('property_name');
            $table->string('unit_name',20);
            $table->integer('unit_size')->nullable();
            $table->string('unit_type');
            $table->integer('rent');
            $table->integer('deposit');
            $table->string('unit_condition',20)->default('good');
            $table->string('status',20)->default('vacant');
            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
