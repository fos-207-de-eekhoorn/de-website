<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToActiviteitInschrijvingenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('activiteit_inschrijvingen', function (Blueprint $table) {
            $table->foreign('activiteit_id')->references('id')->on('activiteiten');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('activiteit_inschrijvingen', function (Blueprint $table) {
            $table->dropForeign('activiteit_inschrijvingen_activiteit_id_foreign');
        });
    }
}
