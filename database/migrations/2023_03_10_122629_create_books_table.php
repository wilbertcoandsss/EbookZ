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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('bookName');
            $table->string('bookAuthor');
            $table->unsignedBigInteger('bookPrice');
            $table->text('bookDescription');
            $table->date('bookPublishDate');
            $table->unsignedBigInteger('bookPage');
            $table->string("ISBN");
            $table->integer("bookStock");
            $table->string('bookCover');
            $table->string('bookPdf')->nullable();
            $table->boolean('isDiscount')->nullable();
            $table->unsignedBigInteger('publisherID');
            $table->unsignedBigInteger('genreID');
            $table->boolean('isOpened')->nullable();
            $table->foreign("publisherID")->references('id')->on('publishers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign("genreID")->references('id')->on('genres')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
