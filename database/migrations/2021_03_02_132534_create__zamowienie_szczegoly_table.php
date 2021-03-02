<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZamowienieSzczegolyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zamowienie_szczegoly', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('fk_produkt')->unsigned();
            $table->bigInteger('fk_zamowienie')->unsigned();
            $table->string('ProduktNazwa');
            $table->integer('ProduktCena');
            $table->integer('ProduktIlosc');
            $table->timestamps();
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
        Schema::dropIfExists('zamowienie_szczegoly');
    }
}
