<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SiteContatoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_contato', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 255)->nullable();
            $table->string('telefone', 17)->nullable();
            $table->string('email', 170)->nullable();
            $table->longText('mensagem')->nullable();
            $table->string('motivo_contatos_id', 255)->nullable();
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
        Schema::dropIfExists('site_contato');
    }
}
