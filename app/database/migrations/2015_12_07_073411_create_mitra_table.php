<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMitraTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mitra' , function($table){
			$table->increments('id');
			$table->string('nama');
			$table->string('cluster');
			$table->string('pic');
			$table->string('hp');
			$table->text('no_rekening');
			$table->text('nama_rekening');
			$table->string('bank');
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
		//
	}

}
