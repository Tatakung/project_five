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
        Schema::create('user_addresses', function (Blueprint $table) {
            $table->uuid('id')->primary();                     // ไอดี (UUID)
            $table->uuid('user_id');                            // ไอดีผู้ใช้ (UUID)
            $table->text('house_no_encrypted')->nullable();    // บ้านเลขที่ (เข้ารหัส)
            $table->text('village_no_encrypted')->nullable();  // หมู่บ้านเลขที่ (เข้ารหัส)
            $table->text('subdistrict_encrypted')->nullable(); // ตำบล (เข้ารหัส)
            $table->text('district_encrypted')->nullable();    // อำเภอ (เข้ารหัส)
            $table->text('province_encrypted')->nullable();    // จังหวัด (เข้ารหัส)
            $table->text('id_card_encrypted')->nullable();     // เลขบัตรประชาชน (เข้ารหัส)
            $table->unsignedInteger('registered_count')->nullable(); // จำนวนสมาชิกที่ลงทะเบียน
            $table->timestamps();                               // เวลาสร้างและแก้ไขข้อมูล

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // ความสัมพันธ์กับตาราง users
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_addresses');
    }
};
