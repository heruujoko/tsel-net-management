<?php

	class Versheet extends Eloquent {

		protected $table = 'versheet';

		public function docs(){
			return $this->HasMany('VersheetDocs', 'versheet_id', 'id');
		}

		public function user(){
			return $this->hasOne('User', 'id', 'user_id');
		}

		public function menyetujui(){
			return $this->hasOne('User', 'id', 'user_menyetujui');
		}

	}

?>
