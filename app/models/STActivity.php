<?php
	
	class STActivity extends Eloquent{

		protected $table = 'st_activities';

		public function sites(){
			return $this->HasOne('Mastertp', 'id', 'site_id');	
		}
	}

?>