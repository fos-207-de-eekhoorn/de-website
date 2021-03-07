<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameAndRebuildToLeidingTakTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('leiding_tak', function (Blueprint $table) {
            $table->dropForeign('leiding_tak_tak_id_foreign');
            $table->dropForeign('leiding_tak_leider_id_foreign');
        });
        Schema::rename('leiding_tak', 'tak_identities');
        Schema::table('tak_identities', function (Blueprint $table) {
            $table->renameColumn('leider_id', 'identity_id');
            $table->dropColumn('is_tl');
            $table->foreign('tak_id')->references('id')->on('takken');
            $table->foreign('identity_id')->references('id')->on('identities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
