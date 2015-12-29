<?php
	
	class PerjalananDinas extends Eloquent {

		protected $table = 'perjalanan_dinas';

		public function lainlain(){
			return $this->HasMany('PJLain', 'pj_id', 'id');
		}

		public function user(){
			return $this->hasOne('User', 'id', 'user_id');	
		}

	}

?>