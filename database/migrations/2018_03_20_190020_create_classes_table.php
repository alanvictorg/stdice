<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateClassesTable.
 */
class CreateClassesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('classes', function(Blueprint $table) {
            $table->increments('id');

            $table->integer('course_id')->unsigned();
            $table->foreign('course_id')->
            references('id')->
            on('courses')->
            onDelete('cascade');

            $table->integer('teacher_id')->unsigned();
            $table->foreign('teacher_id')->
            references('id')->
            on('teachers')->
            onDelete('cascade');

            $table->string('name');
            $table->string('turno');
            $table->string('credit');
            $table->string('hour_lesson');
            $table->string('year');
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
		Schema::drop('classes');
	}
}
