<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameAndRebuildToIdentitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('leiding', 'identities');
        Schema::table('identities', function (Blueprint $table) {
            $table->string('email')->nullable()->change();
            $table->dropUnique('leiding_email_unique');
            $table->dropColumn('password');
            $table->dropColumn('remember_token');
            $table->dropColumn('is_el');
            $table->dropColumn('is_ael_leden');
            $table->dropColumn('is_ael_financien');
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
