<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ConsultaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->id();
            $table->boolean('febre')->default(0);
            $table->boolean('coriza')->default(0);
            $table->boolean('nariz_entupido')->default(0);
            $table->boolean('cansaco')->default(0);
            $table->boolean('tosse')->default(0);
            $table->boolean('dor_cabeca')->default(0);
            $table->boolean('dor_corpo')->default(0);
            $table->boolean('mal_estar_geral')->default(0);
            $table->boolean('dor_garganta')->default(0);
            $table->boolean('dificuldade_respirar')->default(0);
            $table->boolean('falta_paladar')->default(0);
            $table->boolean('falta_olfato')->default(0);
            $table->boolean('dificuldade_locomocao')->default(0);
            $table->boolean('diarreia')->default(0);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
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
    }
}
