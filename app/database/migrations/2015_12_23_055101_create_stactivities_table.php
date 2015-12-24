<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStactivitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('st_activities' , function($table){
			$table->increments('id');
			$table->integer('st_id');
			$table->integer('site_id');
			$table->date('mulai');
			$table->date('selesai');
			$table->string('activity');
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
		Schema::drop('st_activities');
	}

}
