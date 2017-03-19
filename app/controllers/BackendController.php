<?php

class BackendController extends BaseController {


	public function editBetling()
	{
		return View::make('backend.editBetling');
	}


	public function editBetlingStore()
	{
		DB::table('betlings')
            ->where('id', '=', $_POST['betlingID'])
            ->update(array('title' => $_POST['betlingTitle'], 'odds' => $_POST['betlingOdds']));

            return Redirect::back();
	}

	public function live()
	{
		$categories = Category::where('status', '=', 1)->get();

		$eventlings = Category::whereHas('eventlings', function($q)
		{
		    $q->where('is_active', '<', '3');
		})->get();

		return View::make('backend.live',compact('categories','eventlings'));
	}

	public function index()
	{
		$categories = Category::where('status', '=', 1)->get();

		return View::make('backend.index',compact('categories'));
	}

	public function bet($id)
	{
		$eventling = Eventling::where('id', '=', $id)->first();

		$bets = Bet::where('event_id', '=', $id)->get();

		$eventID = $id;

		$betlings = Bet::with('betlings')->get();

		return View::make('backend.bet', compact('eventID','eventling','bets','betlings'));
	}

	public function category()
	{

		$categories = Category::where('status', '=', 1)->get();

		return View::make('backend.category',compact('categories'));
	}

	public function createEvent()
	{
		$eventName = $_POST['eventName'];

		$openDate = $_POST['openDate'];

		$closeDate = $_POST['closeDate'];

		$closeTime = $_POST['closeTime'];

		$category = $_POST['category'];

		$closeTimeReal = $closeDate." ".$closeTime;

		DB::insert('insert into events (event_name,open_date,close_date,close_time,is_active,category_id) values (?,?,?,?,1,?)', array($eventName,$openDate,$closeDate,$closeTimeReal,$category));

		$lastID = DB::getPdo()->lastInsertId();

		header("Location: bet/".$lastID);
		exit();
	}

	public function createNewBet()
	{
		$betName = $_POST['betName'];

		$betType = $_POST['betType'];

		$eventID = $_POST['eventID'];

		DB::insert('insert into bets (event_id,description,bet_type,is_active) values (?,?,?,1)', array($eventID,$betName,$betType));

		$lastID = DB::getPdo()->lastInsertId();

		return $lastID;
	}

	public function betWinner()
	{
		$betlingID = $_POST['betlingID'];

		$betID = $_POST['betID'];

		DB::table('betlings')
            ->where('id', '=', $betlingID)
            ->update(array('status' => 1));

        DB::table('betlings')
            ->where('bet_id', $betID)
            ->where('status', '=' , 0)
            ->update(array('status' => 2));

        DB::table('bets')
            ->where('id', $betID)
            ->update(array('is_active' => 0));

        $moneylines = Betplaced::where('betling_id', '=', $betlingID)->get();

        foreach ($moneylines as $moneyline) {

        	$odds = floatval($moneyline->odds);

        	$toWin = $odds * $moneyline->stake;
        	$toWin = round($toWin);
        	$toWin = (int)$toWin;

        	DB::table('users')
            ->where('id', '=' ,$moneyline->user_id)
            ->increment('current_balance', $toWin);
        }

	}

	public function betRemoveWinner()
	{
		$betlingID = $_POST['betlingID'];

		$betID = $_POST['betID'];

		DB::table('betlings')
            ->where('id', '=', $betlingID)
            ->update(array('status' => 2));
	}



	public function deleteBetling()
	{
		DB::table('betlings')
            ->where('id', '=', $_POST['betlingID'])
            ->update(array('is_active' => 0));

            return Redirect::back();
	}

	public function createCategory()
	{
		$catName = $_POST['catName'];

		$catDescription = $_POST['catDescription'];

		$catURL = $_POST['catURL'];

		DB::insert('insert into categories (cat_name,cat_description,img_url,status) values (?,?,?,1)', array($catName,$catDescription,$catURL));

        return Redirect::to('category');
	}

	public function createNewBetling()
	{
		$betlingTitle = $_POST['betlingTitle'];

		$eventID = $_POST['eventID'];

		$betlingOdds = $_POST['betlingOdds'];

		$betID = $_POST['betID'];

		DB::insert('insert into betlings (event_id,bet_id,title,odds,is_active) values (?,?,?,?,1)', array($eventID,$betID,$betlingTitle,$betlingOdds));

		$lastID = DB::getPdo()->lastInsertId();

		return $lastID;
	}

	public function deleteEvent()
	{
		$input = Input::all();

		DB::table('events')
            ->where('id', '=', $input['eventID'])
            ->update(array('is_active' => 3));

		return Redirect::to('live');
	}

	public function closeBetting()
	{
		$input = Input::all();

		DB::table('events')
            ->where('id', '=', $input['eventID'])
            ->update(array('is_active' => 2));

		return Redirect::back();
	}

	public function deleteBet()
	{
		$input = Input::all();

		DB::table('bets')->where('id', '=', $input['betID'])
						 ->update(array('is_active' => 0));

		return Redirect::back();
	}

}
