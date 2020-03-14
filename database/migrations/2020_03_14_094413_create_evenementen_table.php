<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvenementenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evenementen', function (Blueprint $table) {
            $table->increments('id');
            $table->string('naam');
            $table->text('omschrijving');
            $table->date('start_datum');
            $table->date('eind_datum');
            $table->time('start_uur');
            $table->time('eind_uur');
            $table->string('locatie');
            $table->float('prijs', 5, 2)->unsigned()->default(0);
            $table->tinyInteger('active')->default(0);
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
        Schema::dropIfExists('evenementen');
    }
}
