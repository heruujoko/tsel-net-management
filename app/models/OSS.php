<?php
	
	class OSS extends Eloquent {

		protected $table = 'oss';

		public function sites(){
			return $this->HasOne('Mastertp', 'id', 'site');	
		}

		public function dikerjakan(){
			return $this->HasOne('User', 'id', 'user_mengerjakan');	

		}

		public function shoplists(){
			return $this->HasMany('OSShop', 'oss_shoplist', 'oss_id', 'shoplist_id');
		}
	}

?>