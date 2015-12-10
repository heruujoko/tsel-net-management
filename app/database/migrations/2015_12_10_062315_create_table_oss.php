<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOss extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('oss' , function($table){
			$table->increments('id');
			$table->date('tanggal');
			$table->text('oss_type'); //material / spj bantek
			$table->integer('site'); // relation with mastertp
			$table->text('permasalahan');
			$table->text('action');
			$table->integer('harga');
			$table->integer('user_mengetahui'); //relation with user
			$table->integer('user_mengerjakan'); //relation with user
			// $table->integer('menyetujui'); //relation with signature
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
		Schema::drop('oss');
	}

}
