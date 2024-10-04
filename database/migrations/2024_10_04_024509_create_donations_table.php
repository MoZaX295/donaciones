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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('status');
            $table->Integer('quantity');
            $table->timestamp('date');
            $table->string('description', 100);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('donation_type_id');
            $table->unsignedBigInteger('region_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('donation_type_id')->references('id')->on('donation_types');
            $table->foreign('region_id')->references('id')->on('regions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
