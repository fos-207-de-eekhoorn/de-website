<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeidingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leiding', function (Blueprint $table) {
            $table->increments('id');
            $table->string('voornaam');
            $table->string('achternaam');
            $table->string('totem')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('telefoon')->nullable();
            $table->string('foto');
            $table->tinyInteger('is_el')->default(0);
            $table->tinyInteger('is_ael')->default(0);
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
        Schema::dropIfExists('leiding');
    }
}


