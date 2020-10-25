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
            $table->string('url')->unique();
            $table->tinyInteger('has_static_page')->default(0);
            $table->text('snelle_info')->nullable();
            $table->text('omschrijving')->nullable();
            $table->date('start_datum');
            $table->date('eind_datum');
            $table->time('start_uur')->nullable();
            $table->time('eind_uur')->nullable();
            $table->string('locatie')->nullable();
            $table->float('prijs', 5, 2)->unsigned()->nullable();
            $table->string('kleur', 127)->default('green');
            $table->string('banner_patroon', 127)->default('1');
            $table->string('banner_sterkte', 127)->default('light');
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
