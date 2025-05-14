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
        Schema::create('infos', function (Blueprint $table) {
            $table->uuid('id')->primary(); // เปลี่ยนจาก $table->id() เป็น uuid
            $table->uuid('user_id');
            $table->integer('type')->nullable();
            $table->text('one')->nullable(); // หลักการและเหตุผล
            $table->text('two')->nullable(); // วัตถุประสงค์
            $table->text('three')->nullable(); // ขั้นตอน
            $table->text('four')->nullable(); // ระยะเวลา
            $table->text('five')->nullable(); // งบประมาณ
            $table->text('six')->nullable(); // สถานที่
            $table->text('seven')->nullable(); // ผลที่คาด
            $table->text('eight')->nullable(); // ข้อเสนอแนะ
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
        Schema::dropIfExists('infos');
    }
};
