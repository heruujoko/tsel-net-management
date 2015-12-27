<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerjalananDinasLainTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pj_lain_lain' , function($table){
			$table->increments('id');
			$table->integer('pj_id');
			$table->string('detail');
			$table->integer('jumlah');
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
		Schema::drop('pj_lain_lain');
	}

}
