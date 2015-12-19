<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFplTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fpl' , function($table){
			$table->increments('id');
			$table->integer('id_pemohon');
			$table->date('tanggal_permintaan');
			$table->string('no_ref_ga')->nullable();
			$table->string('pic')->nullable();
			$table->text('jenis_permintaan')->nullable();
			//perbaikan & pemeliharaan pake reference table PerbaikanFPL
			//pemeblian FPL pake reference PembelianFPL
			$table->string('trx_id')->nullable();
			$table->string('periode_trx_id')->nullable();
			$table->string('no_acc')->nullable();
			//alasan kebutuhan pakai reference tabel KebutuhanFPL
			//spek pakai referensi tabel SpecFPL
			$table->text('jumlah_dan_estimasi');
			$table->integer('user_menyetujui');
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
		Schema::drop('fpl');
	}

}
