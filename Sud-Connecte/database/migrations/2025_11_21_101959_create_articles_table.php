<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('articles', function (Blueprint $table) {
        $table->id('article_id');
        $table->string('title');
        $table->string('slug')->unique();
        $table->text('content');
        $table->string('image')->nullable();
        $table->unsignedInteger('views')->default(0);

        // Use bigIncrements() reference correctly + make nullable
        $table->unsignedBigInteger('author_id');
        $table->unsignedBigInteger('category_id')->nullable(); // ← MUST be nullable!

        $table->enum('status', ['pending', 'published', 'archived'])->default('pending');
        $table->boolean('is_moderated')->default(false);
        $table->timestamp('published_at')->nullable();
        $table->softDeletes();
        $table->timestamps();

        // Foreign keys
        $table->foreign('author_id')
            ->references('user_id')
            ->on('users')
            ->onDelete('cascade');

    // This now works because category_id is nullable
    $table->foreign('category_id')
            ->references('category_id')
            ->on('categories')
            ->onDelete('set null');
    });
}
};
