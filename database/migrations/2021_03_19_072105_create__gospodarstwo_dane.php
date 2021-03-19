<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGospodarstwoDane extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gospodarstwo_dane', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Imie_Wlasciciel');
            $table->string('Nazwisko_Wlasciciel');
            $table->string('Miejscowosc');
            $table->char('Kod_Pocztowy');
            $table->string('Poczta_Miejscowosc');
            $table->integer('Telefon');
            $table->string('Email');
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
        Schema::dropIfExists('gospodarstwo_dane');
    }
}
