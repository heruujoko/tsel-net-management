<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('activities',function($table){
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('site_id');
			$table->text('problem');
			$table->text('activity');
			$table->text('detail_activity');
			$table->date('mulai');
			$table->date('selesai');
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
		Schema::drop('activities');
	}

}
