<?php

class SessionsController extends \BaseController {

	/**
	 * Show the login form
	 * GET /sessions/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sessions.create');
	}

	/**
	 * Store a new session
	 * POST /sessions
	 *
	 * @return Response
	 */
	public function store()
	{

		//validate

		$input = Input::all();

		$attempt = Auth::attempt([
			'email' => $input['email'],
			'password' => $input['password']
		]);

		if ($attempt) return Redirect::intended('/');

		return Redirect::back()->with('flash_message', 'Wrong info');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /sessions
	 *
	 * @return Response
	 */

	public function newuser()
	{

		$input = Input::all();

		$passwordhash = Hash::make($input['password']);

		$invites = DB::table('invitecodes')->where('code', $input['invite'])->count();
		$hasemail = DB::table('users')->where('email', $input['email'])->count();

		if ($hasemail > 0)
		{
			return Redirect::back()->with('flash_message', 'Email is taken')->withInput();
		}
		else if ($invites > 0)
		{
			$defaultImg = "http://vi.is/myndir/undirs%C3%AD%C3%B0ur/2014_10_17_verzlo_logo.png";

			DB::insert('insert into users (profile_img,email,password,first_name,level,current_xp,current_balance, bet_limit) values (?,?,?,?,1,0,5000, 500)', array($defaultImg, $input['email'],$passwordhash,$input['firstname']));

			$attempt = Auth::attempt([
				'email' => $input['email'],
				'password' => $input['password']
			]);

			if ($attempt) return Redirect::intended('/');

		}
		else
		{
			return Redirect::back()->with('flash_message', 'False invite?')->withInput();
		}
	}

    /**
     * Destroy a session and redirect user to homepage
     *
     * DELETE /sessions/{id}
     * @return Response
     * @internal param int $id
     */
	public function destroy()
	{
		Auth::logout();

		return Redirect::to('/');
	}

}