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
        Schema::create('actionplans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id');
            $table->float('target_a', 10, 2)->nullable();
            $table->float('budget_a', 10, 2)->nullable();
            $table->float('target_b', 10, 2)->nullable();
            $table->float('budget_b', 10, 2)->nullable();
            $table->float('target_c', 10, 2)->nullable();
            $table->float('budget_c', 10, 2)->nullable();
            $table->float('target_d', 10, 2)->nullable();
            $table->float('budget_d', 10, 2)->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actionplans');
    }
};
