<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateStudentsTable.
 */
class CreateStudentsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('students', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nome')->nullable();
            $table->integer('matricula')->nullable();
            $table->string('filiacao')->nullable();
            $table->string('dt_nasc')->nullable();
            $table->string('natural')->nullable();
            $table->string('cpf')->nullable();
            $table->string('rg')->nullable();
            $table->string('org_exp')->nullable();
            $table->string('est_civil')->nullable();
            $table->string('escolaridade')->nullable();
            $table->string('endereco')->nullable();
            $table->string('local_trabalho')->nullable();
            $table->string('data_conversao')->nullable();
            $table->string('batismo')->nullable();
            $table->string('membro')->nullable();
            $table->string('batismo_espirito')->nullable();
            $table->string('nome_igreja')->nullable();
            $table->string('end_igreja')->nullable();
            $table->string('nome_pastor')->nullable();
            $table->string('tel_pastor')->nullable();
            $table->string('chamado_ministerial')->nullable();
            $table->string('comunhao_igreja')->nullable();
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
		Schema::drop('students');
	}
}
