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
        Schema::create('detalle_brief', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->unsignedBigInteger('Brief_id');  
            $table->foreign('Brief_id')->references('Brief')->on('TABLE_BRIEF');
            $table->string('vendedor_id')->nullable();
            $table->string('articulo_id')->nullable();
            $table->double('Meta',19,6)->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_brief');
    }
};
