<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTakLeidingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tak_leiding', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tak_id')->unsigned();
            $table->foreign('tak_id')->references('id')->on('takken');
            $table->integer('leiding_id')->unsigned();
            $table->foreign('leiding_id')->references('id')->on('leiding');
            $table->tinyInteger('is_tl')->default(0);
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
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
        Schema::dropIfExists('tak_leiding');
    }
}
