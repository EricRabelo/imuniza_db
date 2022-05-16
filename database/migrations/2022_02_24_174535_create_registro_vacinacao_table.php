<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroVacinacaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro_vacinacao', function (Blueprint $table) {
            $table->string('id_Pessoa',11);
            $table->foreign('id_Pessoa')->references('cpf')->on('pessoas')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('id_Vacina')->unsigned();
            $table->foreign('id_Vacina')->references('idVacina')->on('vacinas')->onDelete('cascade')->onUpdate('cascade');
            $table->date('dataVacinacao')->nullable(false);
            $table->primary(['id_Pessoa', 'id_Vacina', 'dataVacinacao']);
            $table->integer('id_Lote')->references('idLote')->on('lotes')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('registro_vacinacao');
    }
}
