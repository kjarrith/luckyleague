<?php

class HomeController extends BaseController {

	public function index()
	{
		//CHECK IF USER DESERVES MONEY
		$lastlogin = Auth::user()->last_online_day;
		$today = date('Y-m-d');

		if( $lastlogin < $today ) { 
		    // it's sooner than one week ago
		    Auth::user()->increment('current_balance', 500);
		}

		//update user last_online_day
		Auth::user()->touchOnline();

		$betslip = Cookie::get('betslip');

		$users = Auth::user();

		$date = date('Y-m-d');

		$eventlings = Eventling::whereRaw('close_date > ? and open_date < ?', [$date,$date])->get();

		$categories = Category::whereHas('eventlings', function($q)
		{
		    $q->where('is_active', '<', '3');

		})->get();

		$betcount = Betplaced::whereRaw('user_id = ? and status = 1', array($users->id))->count();

		$level = Level::where('level', '=', $users->level)->first();

		$leaderboards = DB::table('users')
                    ->orderBy('level', 'desc')
                    ->orderBy('current_balance', 'desc')
                    ->take(10)
                    ->get();

		$xpbarlength = ($users->current_xp / $level->xp_limit)*100;

		$allbets = Betplaced::whereRaw('user_id = ? and status = 1', array($users->id))->get();
		
		if ($betcount > 9) 
		{
			$betcount = "+";
		}
		return View::make('index', compact('users', 'eventlings', 'betslip','categories','betcount','level','xpbarlength','leaderboards','allbets'));
	}


	public function mybets()
	{
		$betslip = Cookie::get('betslip');

		$users = Auth::user();

		$date = date('Y-m-d');

		$placedbets = Betplaced::where('user_id', '=', $users->id)->get();

		$betcount = Betplaced::where('user_id', '=', $users->id)->count();

		if ($betcount > 9) {
			$betcount = '+';
		}

		return View::make('main.mybets', compact('users','betslip','betcount', 'placedbets'));
	}

}
