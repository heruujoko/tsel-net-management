<?php
	
	class PerjalananDinas extends Eloquent {

		protected $table = 'perjalanan_dinas';

		public function lainlain(){
			return $this->HasMany('PJLain', 'pj_id', 'id');
		}

		public function user(){
			return $this->hasOne('User', 'id', 'user_id');	
		}

		public function stpd(){
			return $this->hasOne('STPD', 'pd_id', 'id');		
		}

		public function versheet(){
			return $this->hasOne('Versheet', 'pd_id', 'id');			
		}

		public function fpjp(){
			return $this->hasOne('FPJP', 'pd_id', 'id');			
		}

	}

?>