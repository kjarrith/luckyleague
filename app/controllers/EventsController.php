<?php

class EventsController extends BaseController {

	public function index($id)
	{
		$users = Auth::user();

		$isactive = Eventling::where('id', '=', $id)->where('is_active','=','1')->count();

		if ($isactive < 1) {
			return Redirect::to('/');
		}

		$eventling = Eventling::where('id', '=', $id)->first();

		$bets = Bet::whereRaw('event_id = ? and is_active = 1', array($id))->with('betlings')->get();

		$betcount = Betplaced::whereRaw('user_id = ? and status = 1', array($users->id))->count();

		$level = Level::where('level', '=', $users->level)->first();

		$activebets = Betplaced::whereRaw('user_id = ? and status = 1', array($users->id))->get();

		$allbets = Betplaced::whereRaw('user_id = ? and status = 1 LIMIT 10', array($users->id))->get();

		$xpbarlength = ($users->current_xp / $level->xp_limit)*100;

		$leaderboardsRich = DB::table('users')
                    ->orderBy('current_balance', 'desc')
                    ->take(5)
                    ->get();

        $leaderboardsLevel = DB::table('users')
                    ->orderBy('current_xp', 'desc')
                    ->take(5)
                    ->get();

        if ($betcount > 9)
		{
			$betcount = "+";
		}

		//return $betlings;

		return View::make('events.index', compact('eventling', 'users', 'bets', 'leaderboardsRich', 'xpbarlength','level','betcount','activebets','allbets', 'leaderboardsLevel'));
	}

    /**
     * WHEN A BETSLIP POST IS POSTED
     *
     * @return mixed
     */
	public function addToBetslip()
	{

		$newbetslip = "";

		if (isset($_COOKIE["betslip"])) {
			$betslip = $_COOKIE["betslip"];
		}else {
			$betslip = "";
		}

		$stake = Input::get('stake');

		$newbetslip = $betslip . '&'.$stake;

		$minutes = 600;

		Cookie::forever('betslip', $newbetslip);

		return $stake;

	}

	public function placeBet()
	{
		$xpgained = 5;

		$stake = $_POST['stake'];

		$betId = $_POST['betId'];

		$betlingId = $_POST['betlingId'];

		$odds = Betling::where('id', '=', $betlingId)->first()->odds;

		$userId = Auth::user()->id;

		if ($stake <= Auth::user()->current_balance) {
				DB::insert('insert into betsplaced (stake,odds,bet_id,betling_id,user_id,status) values (?,?,?,?,?,1)', array($stake,$odds,$betId,$betlingId,$userId));
				DB::update('update users set current_balance = current_balance - ?, current_xp = current_xp + ? where id = ?', array($stake,$xpgained,$userId));
				echo 'true';
		} else {
			echo "You don't have enough coins.";
		}

	}

	public function levelUp()
	{
		$userId = Auth::user()->id;
		DB::table('users')
            ->where('id', '=', $userId)
            ->increment('level', 1);

        $level = Level::where('level', '=', Auth::user()->level + 1)->first();
        echo json_encode( $level );
	}

}
