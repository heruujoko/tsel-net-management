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
			$table->string('no_oss');
			$table->integer('user_id');
			$table->date('tanggal');
			$table->text('oss_type'); //material / spj bantek
			$table->integer('site'); // relation with mastertp
			$table->text('permasalahan');
			$table->text('action');
			$table->date('mulai');
			$table->date('selesai');
			$table->text('transport');
			$table->text('jarak');
			$table->integer('harga');
			$table->text('kode_rks');
			$table->text('deskripsi_rks');
			$table->integer('harga_rks');
			$table->integer('harga_fee');
			$table->integer('bantek');
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
