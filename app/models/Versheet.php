<?php
	
	class Versheet extends Eloquent {

		protected $table = 'versheet';

		public function docs(){
			return $this->HasMany('VersheetDocs', 'versheet_id', 'id');	
		}
	}

?>