<?php

  class Activity extends Eloquent {

    public function sites(){
			return $this->HasOne('Mastertp', 'id', 'site_id');
		}

    public function user(){
			return $this->HasOne('User', 'id', 'user_id');
		}

  }

?>
