<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateStudentClassesTable.
 */
class CreateStudentClassesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('student_classes', function(Blueprint $table) {
            $table->increments('id');

            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')->
            references('id')->
            on('students')->
            onDelete('cascade');

            $table->integer('classe_id')->unsigned();
            $table->foreign('classe_id')->
            references('id')->
            on('classes')->
            onDelete('cascade');
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
		Schema::drop('student_classes');
	}
}
