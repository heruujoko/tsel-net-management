<?php
	
	class FPL extends Eloquent {
		
		protected $table = 'fpl';

		public function perbaikans(){
			return $this->HasMany('FPLPerbaikan', 'fpl_id', 'id');	
		}

		public function pembelians(){
			return $this->HasMany('FPLPembelian', 'fpl_id', 'id');	
		}

		public function kebutuhans(){
			return $this->HasMany('FPLKebutuhan', 'fpl_id', 'id');	
		}

		public function specs(){
			return $this->HasMany('FPLSpec', 'fpl_id', 'id');	
		}

		public function mengetahui(){
			return $this->BelongsToMany('User', 'mengetahui_fpl', 'fpl_id' , 'user_id');
		}
	}

?>