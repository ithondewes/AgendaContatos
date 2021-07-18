<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contato_id')->unsigned();
            $table->foreign('contato_id')->references('id')->on('contatos');
            $table->char('CEP', 8);
            $table->string('logradouro', 200);
            $table->char('numero', 10);
            $table->string('bairro', 100);
            $table->string('complemento', 100);
            $table->string('cidade', 100);
            $table->string('uf', 50);        
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
        Schema::dropIfExists('enderecos');
    }
}
