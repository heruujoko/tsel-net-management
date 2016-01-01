<?php

	class FPJP extends Eloquent {

		protected $table = 'fpjp';

		public function user(){
			return $this->hasOne('User', 'id', 'user_id');
		}

		public function mengetahui(){
			return $this->hasOne('User', 'id', 'user_mengetahui');
		}

		public function uraians(){
			return $this->hasMany('FPJPUraian','fpjp_id','id');
		}

	}

?>
