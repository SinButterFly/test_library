<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('books');
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('book_name');
            $table->string('author');
            $table->string('photo');
            $table->timestamps();
        });

        Schema::table('books', function (Blueprint $table) {
            $table->foreignId('shelf_id')
                ->constrained()
                ->onDelete('cascade');;
        });
        Schema::table('books', function (Blueprint $table) {
            $table->foreignId('category_id')
                ->constrained()
                ->onDelete('cascade');;
        });
        Schema::table('books', function (Blueprint $table) {
            $table->foreignId('tag_id')
                ->constrained()
                ->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
