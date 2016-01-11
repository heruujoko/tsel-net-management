<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVersheetTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('versheet' , function($table){
			$table->increments('id');
			$table->string('no_invoice')->nullable();
			$table->integer('user_id');
			$table->integer('pd_id');
			//kelengkapan dokumen ada di versheet docs
			$table->string('untuk_pembayaran');
			$table->integer('jumlah_pembayaran');
			$table->string('trxid')->nullable();
			$table->string('cost_centre')->nullable();
			$table->integer('budget_account')->nullable();
			$table->string('activity_code')->nullable();
			$table->integer('user_menyetujui');
			$table->string('kepada_nama');
			$table->string('kepada_bank');
			$table->string('kepada_rekening');
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
		Schema::drop('versheet');
	}

}
