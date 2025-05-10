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
        Schema::create('chapters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('comic_id')->constrained('comics')->onDelete('cascade'); // Khóa ngoại liên kết với bảng comics
            $table->string('title'); // Tiêu đề chương (ví dụ: "Chương 1")
            $table->integer('chapter_number'); // Số thứ tự chương (ví dụ: 1, 2, 3...)
            $table->text('content')->nullable(); // Nội dung chương (có thể là văn bản hoặc HTML)
            $table->string('images')->nullable(); // Đường dẫn đến hình ảnh chương (nếu có)
            $table->integer('views')->default(0); // Số lượt xem chương
            $table->date('release_date')->nullable(); // Ngày phát hành chương
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chapters');
    }
};
