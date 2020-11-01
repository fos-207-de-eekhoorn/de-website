<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddKorteNaamRenameVanafAddJaartalEindToTakkenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('takken', function (Blueprint $table) {
            $table->string('korte_naam')->after('naam');
            $table->integer('jaartal_begin')->unsigned()->after('vanaf');
            $table->integer('jaartal_eind')->unsigned()->after('jaartal_begin');
            $table->dropColumn('vanaf');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('takken', function (Blueprint $table) {
            $table->dropColumn('korte_naam');
            $table->dropColumn('jaartal_begin');
            $table->dropColumn('jaartal_eind');
            $table->integer('vanaf')->unsigned()->after('activiteiten_beschrijving');
        });
    }
}
