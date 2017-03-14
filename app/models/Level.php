<?php

class Level extends Eloquent {

	protected $table = 'levels';

	 public function users()
	 {
	 	return $this->hasMany('User');
	 }
	
}