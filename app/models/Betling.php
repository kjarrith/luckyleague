<?php

class Betling extends Eloquent {

	protected $table = 'betlings';

	public function bet()
	{
		return $this->belongsTo('Bet');
	}

	public function betsplaced()
	{
		return $this->hasMany('Betplaced');
	}
	
}