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
        Schema::create('comic_tags', function (Blueprint $table) {
            $table->foreignId('comic_id')->constrained('comics')->onDelete('cascade'); // Khóa ngoại liên kết với bảng comics
            $table->foreignId('tag_id')->constrained('tags')->onDelete('cascade'); // Khóa ngoại liên kết với bảng tags
            $table->primary(['comic_id', 'tag_id']); // Khóa chính ghép
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comic_tags');
    }
};
