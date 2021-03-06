<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->longText('body');
            $table->enum('status', [1,2])->default(1); /* 1: BORRADOR, 2:PUBLICADO */

            /* LLAVES FORANEAS/RELACIONES */
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');

            /* RESTRICCIÓN DE LLAVE FORANEA */
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
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
};
