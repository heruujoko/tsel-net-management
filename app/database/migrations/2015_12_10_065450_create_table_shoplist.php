<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableShoplist extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('shoplist' , function($table){
			$table->increments('id');
			$table->string('kode');
			$table->string('deskripsi');
			$table->string('satuan');
			$table->integer('harga');
			$table->string('type');
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
		Schema::drop('shoplist');
	}

}
