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
        Schema::create('guests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('phone', 20);
            $table->timestamp('time_reg')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->boolean('is_inside')->nullable()->default(0);
            $table->string('status', 20)->nullable();
            $table->date('day_to_come')->nullable();
            $table->time('time_to_come')->nullable();
            $table->string('external_id')->nullable();
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
