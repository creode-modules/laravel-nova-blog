<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::drop('post_post_category');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('post_post_category', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->foreignId('post_category_id')->references('id')->on('post_categories')->onDelete('cascade');
            $table->timestamps();
        });
    }
};
