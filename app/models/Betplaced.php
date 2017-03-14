<?php

class Betplaced extends Eloquent {

	protected $table = 'betsplaced';

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function betling()
	{
		return $this->belongsTo('Betling');
	}
	
}