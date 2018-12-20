<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagWishTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_wish', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();

            # `wish_id` and `tag_id` will be foreign keys, so they have to be unsigned
            #  Note how the field names here correspond to the tables they will connect...
            # `wish_id` will reference the `wishes table` and `tag_id` will reference the `tags` table.
            $table->integer('tag_id')->unsigned();
            $table->integer('wish_id')->unsigned();

            # Make foreign keys
            $table->foreign('wish_id')->references('id')->on('wishes');
            $table->foreign('tag_id')->references('id')->on('tags');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tag_wish');
    }
}
