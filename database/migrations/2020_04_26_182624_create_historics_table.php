<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoricsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historics', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id')->unsigned(); // para trabalhar com chave estrangeira
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // chave estrangeira, da coluna ID da tabela users. Apaga o registro se for apagado a id do usuário 
            $table->enum('type', ['I','O','T']);
            $table->double('amount',10,2);
            $table->double('total_before',10,2);
            $table->double('total_after',10,2);
            $table->integer('user_id_transaction')->nullable();
            $table->date('date');
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
        Schema::dropIfExists('historics');
    }
}
