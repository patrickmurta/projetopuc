<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProdutoDetalheTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto_detalhe', function (Blueprint $table) {
            $table->id();
            $table->string('comprimento',255)->nullable();
            $table->string('largura',255)->nullable();
            $table->string('altura',255)->nullable();
            $table->unsignedBigInteger('unidade_id');
            $table->unsignedBigInteger('produto_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
            $table->foreign('produto_id')->references('id')->on('produtos');
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
        Schema::dropIfExists('produto_detalhe');
    }
}
