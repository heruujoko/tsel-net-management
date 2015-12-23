<?php
	
	class SuratTugas extends Eloquent {

		protected $table = "surat_tugas";

		public function banteks(){
			return $this->BelongsToMany('Bantek', 'st_bantek', 'st_id' , 'bantek_id');
		}

	}

?>