<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users' , function($table){
			$table->increments('id');
			$table->string('email');
			$table->string('password');
			$table->string('nama');
			$table->string('nik');
			$table->string('jabatan');
			$table->string('level_jabatan');
			$table->boolean('is_manager_utama');
			$table->boolean('can_be_poh');
			$table->string('role');
			$table->string('cluster');
			$table->integer('mitra');
			$table->integer('lokasi_kerja_id');
			$table->string('bank');
			$table->string('no_rekening');
			$table->string('no_hp');
			$table->string('remember_token');
			$table->boolean('need_signature');
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
		Schema::drop('users');
	}

}
