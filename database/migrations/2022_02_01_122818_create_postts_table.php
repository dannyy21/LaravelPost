<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePosttsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');
            // mengubungkan tabel postt dan category
            $table->foreignId('user_id');
            $table->string('title'); 
            $table->string('slug')->unique();
            $table->text('excerpt');
            $table->text('body');
            $table->timestamp('published_at')->nullable();
            // keliatan kapan dipublish 
            $table->timestamps();
            // timestamp ini dibikin kapan
        });
    }
   
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('postts');
    }
}