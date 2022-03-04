<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCombatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('combates', function (Blueprint $table) {
            $table->bigInteger('id_Vacina')->unsigned();
            $table->foreign('id_Vacina')->references('idVacina')->on('vacinas')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('id_Doenca')->unsigned();
            $table->foreign('id_Doenca')->references('idDoenca')->on('doencas')->onDelete('cascade')->onUpdate('cascade');
            $table->primary(['id_Vacina', 'id_Doenca']);
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
        Schema::dropIfExists('combates');
    }
}
