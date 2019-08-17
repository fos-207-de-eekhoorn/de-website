<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActiviteitenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activiteiten', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tak_id')->unsigned();
            $table->foreign('tak_id')->references('id')->on('takken');
            $table->text('omschrijving');
            $table->date('datum');
            $table->time('start_uur')->default('14:00:00');
            $table->time('eind_uur')->default('17:00:00');
            $table->string('locatie')->default('Lokaal');
            $table->integer('prijs')->unsigned()->default(0);
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activiteiten');
    }
}
