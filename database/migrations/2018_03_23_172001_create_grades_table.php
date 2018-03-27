<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateGradesTable.
 */
class CreateGradesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('grades', function(Blueprint $table) {
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

            $table->double('n1')->nullable()->default('0');
            $table->double('n2')->nullable()->default('0');
            $table->double('n3')->nullable()->default('0');
            $table->double('media')->nullable()->default('0');
            $table->integer('presence')->nullable()->default('0');
            $table->enum('status', ['standby', 'studying', 'completed'])->nullable()->default('studying');

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
		Schema::drop('grades');
	}
}
