<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateAelInLeidingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('leiding', function (Blueprint $table) {
            $table->renameColumn('is_ael', 'is_ael_financien');
            $table->tinyInteger('is_ael_leden')->default(0)->after('is_el');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('leiding', function (Blueprint $table) {
            $table->renameColumn('is_ael_financien', 'is_ael');
        });
    }
}
