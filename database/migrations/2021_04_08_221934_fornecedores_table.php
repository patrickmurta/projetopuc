<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FornecedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('fornecedores', function (Blueprint  $table){
            $table->id();
            $table->string('nome', 255)->nullable();
            $table->string('site', 255)->nullable();
            $table->string('uf', 2)->nullable();
            $table->string('eamil', 255)->nullable();
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
        //
        Schema::dropIfExists('fornecedores');
    }
}
