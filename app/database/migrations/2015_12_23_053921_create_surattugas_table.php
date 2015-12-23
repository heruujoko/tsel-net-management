<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurattugasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('surat_tugas' , function($table){
			$table->increments('id');
			$table->string('no_surat');
			$table->date('tempat_tanggal');
			//many to many bantek ke table STBantek
			//many to one ke table STActivities
			$table->integer('menyetujui');
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
		Schema::drop('surat_tugas');
	}

}
