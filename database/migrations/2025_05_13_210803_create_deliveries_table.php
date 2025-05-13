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
        Schema::create('deliveries', function (Blueprint $table) {
            $table->uuid('id')->primary(); // เปลี่ยนจาก $table->id() เป็น uuid
            $table->uuid('user_id');
            $table->integer('type')->nullable();
            $table->integer('count_one')->nullable(); //จำนวนสมาชิกในสถาบันทั้งหมด
            $table->integer('count_two')->nullable(); //เกษตรกรทั้งหมดที่ขึ้นทะเบียนกับ กยท.
            $table->integer('time')->nullable(); // ระบะเวลาในการดำเนินงาน
            $table->string('file_path')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deliveries');
    }
};
