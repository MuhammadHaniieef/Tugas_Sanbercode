<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id(); // Kolom ID (primary key)
            $table->string('title'); // Kolom untuk judul post
            $table->text('content'); // Kolom untuk konten post
            $table->string('image')->nullable(); // Kolom untuk gambar, nullable artinya opsional
            $table->unsignedBigInteger('category_id'); // Kolom untuk relasi dengan kategori (foreign key)
            $table->timestamps(); // Kolom created_at dan updated_at

            // Menambahkan foreign key
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
