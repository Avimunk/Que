<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuestsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('guests', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id', true);
			$table->string('name', 255);
			$table->string('phone', 255);
			$table->dateTime('time_reg');
			$table->boolean('is_inside');
			$table->string('status', 255);
			$table->date('day_to_come');
			$table->time('time_to_come');
			$table->string('external_id', 255);
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
		Schema::drop('guests');
	}

}
