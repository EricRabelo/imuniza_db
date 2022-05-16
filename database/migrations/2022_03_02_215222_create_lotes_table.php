<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lotes', function (Blueprint $table) {
            $table->integer('idLote');
            $table->date('dataRecebimento')->nullable(false);
            $table->primary(['idLote', 'dataRecebimento']);
            $table->bigInteger('id_Vacina')->unsigned();
            $table->foreign('id_Vacina')->references('idVacina')->on('vacinas')->onDelete('cascade')->onUpdate('cascade');
            $table->string('id_Fabricante',14);
            $table->foreign('id_Fabricante')->references('cnpj')->on('fabricantes')->onDelete('cascade')->onUpdate('cascade');
            $table->string('origem', 255)->nullable(false);
            $table->date('dataValidade')->nullable(false);
            $table->integer('qtdDosesRec')->nullable(false);
            $table->integer('qtdDosesDisp')->nullable(false);
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
        Schema::dropIfExists('lotes');
    }
}
