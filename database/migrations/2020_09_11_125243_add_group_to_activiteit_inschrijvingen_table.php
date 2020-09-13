<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGroupToActiviteitInschrijvingenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('activiteit_inschrijvingen', function (Blueprint $table) {
            $table->unsignedSmallInteger('group')->default(0)->after('activiteit_id');
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
            //
        });
    }
}
