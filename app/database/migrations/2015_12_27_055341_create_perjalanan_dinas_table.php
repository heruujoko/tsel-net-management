<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerjalananDinasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('perjalanan_dinas' , function($table){
			$table->increments('id');
			$table->string('nama');
			$table->string('kota_tujuan');
			$table->text('kegiatan');
			$table->date('tanggal_berangkat');
			$table->date('tanggal_kembali');
			$table->string('kendaraan');
			$table->string('jenis_uhpd');
			$table->integer('jumlah_uhpd');
			$table->integer('transport_bandara');
			$table->integer('hari_hotel');
			$table->integer('biaya_hotel');
			$table->string('tujuan_pesawat');
			$table->integer('biaya_pesawat');
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
		Schema::drop('perjalanan_dinas');
	}

}
