<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pages', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('name', 25);
            $table->text('content')->nullable();
            $table->string('slug', 25)->nullable()->unique();
            $table->boolean('active')->nullable();
            $table->boolean('is_home')->nullable();
            $table->string('title', 225)->nullable();
            $table->string('description', 225)->nullable();
            $table->string('keywords', 225)->nullable();
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
		Schema::drop('pages');
	}

}
