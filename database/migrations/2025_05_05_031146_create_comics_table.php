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
        Schema::create('comics', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique(); // Đường dẫn SEO (ví dụ: "ten-truyen-2023")
            $table->text('description');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // Liên kết với bảng categories
            $table->string('cover_image'); // Ảnh bìa truyện
            $table->string('author')->nullable(); // Tác giả
            $table->string('publisher')->nullable(); // Nhà xuất bản
            $table->integer('chapters')->default(0); // Số chương
            $table->date('release_date')->nullable(); // Ngày phát hành
            $table->float('rating')->default(0); // Điểm đánh giá trung bình
            $table->integer('views')->default(0); // Số lượt xem
            $table->enum('status', ['ongoing', 'completed', 'draft'])->default('draft'); // Trạng thái truyện
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null'); // Người thêm truyện
            $table->boolean('is_featured')->default(false); // Truyện nổi bật
            $table->string('language')->nullable(); // Ngôn ngữ
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comics');
    }
};
