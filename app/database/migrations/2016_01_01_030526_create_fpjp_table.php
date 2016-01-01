<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFpjpTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fpjp' , function($table){
			$table->increments('id');
			$table->integer('user_id');
			$table->date('tanggal');
			$table->string('departemen');
			$table->integer('total');
			$table->string('total_huruf');
			$table->integer('user_mengetahui');
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
		Schema::drop('fpjp');
	}

}
