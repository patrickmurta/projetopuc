<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 255)->nullable();
            $table->string('descricao', 255)->nullable();
            $table->string('peso', 255)->nullable();
            $table->unsignedBigInteger('unidade_id');
            $table->unsignedBigInteger('fornecedor_id');
//            $table->foreign('unidade_id')->references('id')->on('unidades');
//            $table->foreign('fornecedor_id')->references('id')->on('fornecedores');
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
        Schema::dropIfExists('produtos');
    }
}
