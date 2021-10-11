<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Keys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produkty', function (Blueprint $table){
            $table->foreign('fk_kategorie')->references('id')->on('kategorie');

        });

     
        Schema::table('zamowienie', function (Blueprint $table){
            $table->foreign('fk_uzytkownik')->references('id')->on('users');

        });

        Schema::table('zamowienie', function (Blueprint $table){
            $table->foreign('fk_platnosc')->references('id')->on('platnosc');

        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produkty');
        Schema::dropIfExists('zamowienie');
        Schema::dropIfExists('platnosc');
        Schema::dropIfExists('users');
        Schema::dropIfExists('kategorie');
    }
}
