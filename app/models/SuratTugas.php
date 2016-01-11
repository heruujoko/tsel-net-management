<?php
	
	class SuratTugas extends Eloquent {

		protected $table = "surat_tugas";

		public function banteks(){
			return $this->BelongsToMany('Bantek', 'st_bantek', 'st_id' , 'bantek_id');
		}

		public function activities(){
			return $this->HasMany('STActivity', 'st_id', 'id');
		}

		public function setuju(){
			return $this->HasOne('User', 'id', 'menyetujui');	
		}
	}

?>