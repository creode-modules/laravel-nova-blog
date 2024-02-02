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
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign('posts_author_id_foreign');
            $table->dropIndex('posts_author_id_foreign');
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('author_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->foreignId('author_id')->references('id')->on('users');
        });
    }
};
