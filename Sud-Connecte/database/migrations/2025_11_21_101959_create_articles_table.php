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

        // $table->string('image')->nullable();
        // $table->unsignedInteger('views')->default(0);
        // $table->boolean('is_moderated')->default(false);
        // $table->timestamp('published_at')->nullable();

        $table->unsignedBigInteger('author');
        $table->foreign('author_id')
            ->references('user_id')
            ->on('users')
            ->onDelete('cascade');

        $table->enum('status', ['draft', 'published'])->default('draft');
    });
}
};
