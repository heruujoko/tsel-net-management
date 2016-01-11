<?php
class Signature extends Eloquent {
	protected $table = 'signature';

	public function user(){
			return $this->hasOne('User', 'id', 'user_id');	
	}
}
