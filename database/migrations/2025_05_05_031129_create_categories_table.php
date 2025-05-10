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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();              // Khóa chính, tự động tăng
            $table->string('name');    // Tên danh mục (ví dụ: "Hành động")
            $table->string('slug')->unique();  // Đường dẫn thân thiện SEO (ví dụ: "hanh-dong")
            $table->timestamps();      // Thời gian tạo và cập nhật
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
    
};
