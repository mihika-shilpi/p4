<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectWritersAndWishes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wishes', function (Blueprint $table) {

            # Add a new INT field called `writer_id` that has to be unsigned (i.e. positive)
            $table->integer('writer_id')->unsigned();

            # This field `writer_id` is a foreign key that connects to the `id` field in the `writers` table
            $table->foreign('writer_id')->references('id')->on('writers');

        });
    }

    public function down()
    {
        Schema::table('wishes', function (Blueprint $table) {

            # ref: http://laravel.com/docs/migrations#dropping-indexes
            # combine tablename + fk field name + the word "foreign"
            $table->dropForeign('wishes_writer_id_foreign');

            $table->dropColumn('writer_id');
        });
    }
}
