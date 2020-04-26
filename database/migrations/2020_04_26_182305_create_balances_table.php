<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balances', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned(); // para trabalhar com chave estrangeira
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // chave estrangeira, da coluna ID da tabela users. Apaga o registro se for apagado a id do usuário 
            $table->double('amount',10,2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('balances');
    }
}
