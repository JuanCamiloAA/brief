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
            $table->String('Laboratorio',100);
            $table->String('Solicitante',100);
            $table->String('CodArticulo',50)->nullable();            
            $table->String('ItemName',100)->nullable();
            $table->String('SlpName',50)->nullable();
            $table->date('VigIni');
            $table->date('VigFin');
            $table->date('VigPag');
            $table->String('ObjGen',1600)->nullable();
            $table->String('ObjEsp',1600)->nullable();
            $table->String('Cond',200)->nullable();
            $table->String('ForPagVe',50)->nullable();
            $table->String('ForPagLab',50)->nullable();
            $table->double('Pres',19,6)->nullable();
            $table->double('Meta',19,6)->nullable();
            $table->String('Area',50)->nullable();

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
