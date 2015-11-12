<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('companies', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name', 25)->unique();
            $table->text('content')->nullable();
            $table->string('image', 55)->nullable();
            $table->boolean('active')->nullable();
            $table->boolean('homepage')->nullable();
            $table->string('url', 225)->nullable();
            $table->string('percent', 25)->nullable();
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
        Schema::drop('companies');
	}

}
