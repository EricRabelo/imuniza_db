<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->string('cpf',11)->unique();
            $table->primary('cpf');
            $table->timestamps();
            $table->date('dataNascimento')->nullable(false);
            $table->integer('numeroSus')->unique()->nullable(false);
            $table->string('nome',255)->nullable(false);
            $table->string('nomeMae',255)->nullable(false);
            $table->string('sexo',1)->nullable(false);
            $table->string('cidade',255)->nullable(false);
            $table->string('estado',2)->nullable(false);
            $table->string('rua',255)->nullable(false);
            $table->string('bairro',255)->nullable(false);
            $table->integer('num')->nullable(false);
            $table->string('estadoCivil',255)->nullable(false);
            $table->string('etnia',45)->nullable(false);
            $table->boolean('planoSaude')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoas');
    }
}
