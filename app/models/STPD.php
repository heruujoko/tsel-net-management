<?php
	
	class STPD extends Eloquent {

		protected $table = "stpd";

		public function user(){
			return $this->hasOne('User', 'id', 'user_id');	
		}

		public function menugaskan(){
			return $this->hasOne('User', 'id', 'user_menugaskan');	
		}

		public function mengetahui(){
			return $this->hasOne('User', 'id', 'user_mengetahui');	
		}

	}

?>