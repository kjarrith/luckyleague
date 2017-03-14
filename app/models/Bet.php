<?php

class Bet extends Eloquent {

	protected $table = 'bets';

	public function betlings()
	{
		return $this->hasMany('Betling')->orderBy('odds', 'asc');
	}
	
}