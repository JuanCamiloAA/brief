<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TABLE_BRIEF', function (Blueprint $table) {
            $table->BigIncrements('Brief');
            $table->String('Solicitante',100);
            $table->String('Solicitante_name',100);
            $table->date('VigIni');
            $table->date('VigFin');
            $table->date('VigPag');
            $table->date('VigLiq');
            $table->String('ObjGen',1600)->nullable();
            $table->String('ObjEsp',1600)->nullable();
            $table->String('ForPagVe',50);
            $table->String('ForPagLab',50);
            $table->String('Cond',200)->nullable();
            $table->double('Pres',19,6);
            $table->String('Area',50)->nullable();
            $table->String('Conclucion',100)->nullable();
            $table->boolean('State');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('TABLE_BRIEF');
    }
};
