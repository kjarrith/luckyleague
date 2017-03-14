<?php

class Eventling extends Eloquent {

	protected $table = 'events';

	public function category()
	{
		return $this->belongsTo('Category');
	}
}