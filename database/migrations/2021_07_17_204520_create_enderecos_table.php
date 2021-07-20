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
            $table->foreign('contato_id')->references('id')->on('contatos')->onDelete('cascade');
            $table->char('CEP', 8)->nullable();
            $table->string('logradouro', 200)->nullable();
            $table->char('numero', 10)->nullable();
            $table->string('bairro', 100)->nullable();
            $table->string('complemento', 100)->nullable();
            $table->string('cidade', 100)->nullable();
            $table->string('uf', 50)->nullable();
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
