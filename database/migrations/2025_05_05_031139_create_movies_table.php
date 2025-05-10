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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique(); // Đường dẫn SEO
            $table->text('description');
            $table->string('link'); // Link video
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // Sửa 'category' thành 'categories' theo chuẩn Laravel
            $table->string('image');
            $table->string('trailer');
            $table->integer('duration')->nullable(); // Thời lượng (phút)
            $table->date('release_date')->nullable(); // Ngày phát hành
            $table->float('rating')->default(0); // Điểm đánh giá trung bình
            $table->integer('views')->default(0); // Số lượt xem
            $table->enum('status', ['public', 'private', 'draft'])->default('draft'); // Trạng thái
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null'); // Người thêm phim
            $table->boolean('is_featured')->default(false); // Phim nổi bật
            $table->string('language')->nullable(); // Ngôn ngữ
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
    
};
