<?php

class Category extends Eloquent {

	protected $table = 'categories';

	 public function eventlings()
	 {
	 	return $this->hasMany('Eventling');
	 }
	
}