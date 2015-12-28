<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStpdTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stpd' , function($table){
			$table->increments('id');
			$table->integer('user_id');
			$table->string('tujuan_penugasan');
			$table->date('tanggal_berangkat');
			$table->date('tanggal_kembali');
			$table->string('kendaraan');
			$table->text('kegiatan');
			$table->string('jenis_uhpd');
			$table->integer('uhpd');
			$table->integer('trans_bandara');
			$table->integer('jumlah');
			$table->date('tanggal_stpd');
			$table->integer('user_menugaskan');
			$table->integer('user_mengetahui');
			$table->integer('pd_id');
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
		Schema::drop('stpd');
	}

}
