<?php
	
	class OSS extends Eloquent {

		protected $table = 'oss';

		public function sites(){
			return $this->HasOne('Mastertp', 'id', 'site');	
		}

		public function mengetahui(){
			return $this->hasOne('User', 'id', 'user_mengetahui');	
		}

		public function banteks(){
			return $this->hasOne('Bantek', 'id', 'bantek');	
		}

		public function dikerjakan(){
			return $this->HasOne('User', 'id', 'user_mengerjakan');	
		}

		public function shoplists(){
			return $this->BelongsToMany('Shoplist', 'oss_shoplist', 'oss_id', 'shoplist_id');
		}

		public function menyetujui(){
			return $this->BelongsToMany('User', 'menyetujui_oss', 'oss_id' , 'user_id');
		}
	}

?>