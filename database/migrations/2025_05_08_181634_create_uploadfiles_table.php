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
        Schema::create('uploadfiles', function (Blueprint $table) {
            $table->uuid('id')->primary(); // เปลี่ยนจาก $table->id() เป็น uuid
            $table->uuid('user_id');       // ต้องใช้ uuid ให้ตรงกับ users.id
            $table->string('file_path');
            $table->integer('type_file')->nullable();
            $table->unsignedBigInteger('file_size')->nullable(); // ขนาดไฟล์ (bytes)
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uploadfiles');
    }
};
