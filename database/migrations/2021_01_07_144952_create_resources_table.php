<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title', 256);
            $table->string('author', 256)->nullable();
            $table->string('year', 10)->nullable();
            $table->string('published_in', 256)->nullable()->index();
            $table->char('language', 4)->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_public')->default(false);
            $table->boolean('approved')->default(true);
            $table->unsignedTinyInteger('type');

            $table->unsignedBigInteger('views')->default(0);
            $table->unsignedBigInteger('downloads')->default(0);

            $table->foreignUuid('file_id')->nullable()->references('id')->on('files');
            $table->foreignUuid('cover_id')->nullable()->references('id')->on('files');
            $table->foreignUuid('category_id')->nullable()->references('id')->on('categories');
            $table->foreignUuid('theme_id')->nullable()->references('id')->on('themes');

            $table->timestamps();
            $table->userstamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resources');
    }
}
