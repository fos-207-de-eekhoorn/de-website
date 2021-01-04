<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropUniqueUrlOnEvenementenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('evenementen', function (Blueprint $table) {
            $sm = Schema::getConnection()->getDoctrineSchemaManager();
            $doctrineTable = $sm->listTableDetails('evenementen');

            if ($doctrineTable->hasIndex('url_UNIQUE')) $table->dropUnique('url_UNIQUE');
            if ($doctrineTable->hasIndex('evenementen_url_unique')) $table->dropUnique('evenementen_url_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('evenementen', function (Blueprint $table) {
            //
        });
    }
}
