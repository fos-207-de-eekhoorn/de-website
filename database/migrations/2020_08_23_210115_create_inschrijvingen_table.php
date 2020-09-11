<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInschrijvingenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inschrijvingen', function (Blueprint $table) {
            $table->increments('id');
            $table->string('voornaam');
            $table->string('achternaam');
            $table->string('email')->nullable();
            $table->string('telefoon')->nullable();
            $table->string('geslacht');
            $table->date('geboortedatum');
            $table->string('straat');
            $table->string('nummer');
            $table->string('bus')->nullable();
            $table->string('postcode');
            $table->string('plaats');
            $table->string('land');
            $table->text('medisch')->nullable();
            $table->tinyInteger('beeldmateriaal')->default(0);
            $table->string('voogd_1_voornaam');
            $table->string('voogd_1_achternaam');
            $table->string('voogd_1_email');
            $table->string('voogd_1_telefoon');
            $table->string('voogd_1_straat')->nullable();
            $table->string('voogd_1_nummer')->nullable();
            $table->string('voogd_1_bus')->nullable();
            $table->string('voogd_1_postcode')->nullable();
            $table->string('voogd_1_plaats')->nullable();
            $table->string('voogd_1_land')->nullable();
            $table->string('voogd_2_voornaam')->nullable();
            $table->string('voogd_2_achternaam')->nullable();
            $table->string('voogd_2_email')->nullable();
            $table->string('voogd_2_telefoon')->nullable();
            $table->string('voogd_2_straat')->nullable();
            $table->string('voogd_2_nummer')->nullable();
            $table->string('voogd_2_bus')->nullable();
            $table->string('voogd_2_postcode')->nullable();
            $table->string('voogd_2_plaats')->nullable();
            $table->string('voogd_2_land')->nullable();
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
        Schema::dropIfExists('inschrijvingen');
    }
}
