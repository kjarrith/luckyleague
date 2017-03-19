<!DOCTYPE html>
<head>
	@include('layouts.partials.head')
	<title>Lucky League</title>
</head>

<body class="loginbody transit05sec">
	@include('layouts.partials.header')

	<div id="login-wrap">
	<div id="hero">WELCOME TO THE <span class="future">FUTURE</span> OF BETTING
	</div>
		<div id="login-form" class="transit05sec">
		<div id="login-lucky"><img src="/img/logo.png" style="width:80px; display:block;"></div>
		<button type="button" class="login-nav signup selected transit05sec">SIGN UP</button>
		<button type="button" class="login-nav login transit05sec">LOGIN</button>

			<ul class="login-form">
			{{ Form::open(['route' => 'sessions.store'])}}
				<li>
					<div class="form-group">
		              <label>Email</label>
		              {{ Form::text('email', NULL, ['class' => ' transit05sec form-control w100'])}}
		            </div>
				</li>

				<li>
					<div class="form-group">
			              <label>Password</label>
			              {{ Form::password('password', [ 'class' => 'transit05sec form-control w100'])}}
			        </div>
				</li>
				<li>
					<button type="submit" class="firstsubmit  login selected  transit05sec">
	                  LOGIN
	              </button>
				</li>

				@if (Session::get('flash_message'))
					<div class="flash">
						{{ Session::get('flash_message')}}
					</div>
				@endif
				{{ Form::close()}}
			</ul>

			<ul class="signup-form">
			{{ Form::open(['url' => '/newuser'])}}
				<li>
					<div class="form-group">
		              <label>Name or Nickname</label>
		              {{ Form::text('firstname', NULL, ['class' => ' transit05sec form-control w100'])}}
					</div>
				</li>
				<li>
					<div class="form-group">
		              <label>Email</label>
		              {{ Form::text('email', NULL, ['class' => ' transit05sec form-control w100'])}}
		            </div>
				</li>

				<li>
					<div class="form-group">
			              <label>Password</label>
			              {{ Form::password('password', [ 'class' => 'transit05sec form-control w100'])}}
			        </div>
				</li>
				<li>
					<div class="form-group">
			              <label>Invite Code</label>
			              {{ Form::text('invite', NULL, [ 'class' => 'transit05sec form-control w100'])}}
			        </div>
				</li>
				<li>
					<button type="submit" class="firstsubmit signup selected transit05sec">
	                  SIGN UP
	              </button>
				</li>

				@if (Session::get('flash_message'))
					<div class="flash">
						{{ Session::get('flash_message')}}
					</div>
				@endif
				{{ Form::close()}}
			</ul>
		</div>
	</div>
	<script src="/js/login.js"></script>
</body>