<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZamowienieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zamowienie', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('fk_uzytkownik')->unsigned();
            $table->bigInteger('fk_platnosc')->unsigned();
            $table->string('ZamowienieStatus');
            $table->float('ZamowienieKoszt',10,2);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zamowienie');
    }
}
