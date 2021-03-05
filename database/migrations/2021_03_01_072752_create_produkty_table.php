<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduktyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produkty', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Nazwa');
            $table->float('Cena', 10,2);
            $table->text('Zdjecie')->nullable();
            $table->integer('Ilosc');
            $table->string('JednostkaMiary');
            $table->text('Opis');
            $table->bigInteger('fk_kategorie')->unsigned();
            $table->tinyInteger('status');
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
        Schema::dropIfExists('produkty');
    }
}
