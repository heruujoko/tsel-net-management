<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpphTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('spph' , function($table){
			$table->increments('id');
			$table->string('no_surat');
			$table->string('tempat_tanggal');
			$table->string('kepada');
			$table->string('perihal');
			$table->text('kegiatan');
			$table->integer('jangka_waktu');
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
		Schema::drop('spph');
	}

}
