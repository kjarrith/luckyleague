<!DOCTYPE html>
<head>
  @include('layouts.partials.head')
  <title>Lucky League</title>
</head>

<body class="normalbody">
<div id="header">
  <div id="header-wrap">
    <div id="phone-menu">
      <ul>
        <li class="phone-li leaderboards"><i class="fa fa-list"></i></li>
        <li class="phone-li userinfo"><i class="fa fa-user"></i></li>
        <a href="/logout"><li class="phone-li" style="color:#999;"><i class="fa fa-power-off"></i></li></a>
      </ul>
    </div>

    <a href="/"><div id="logo"><img src="/img/logo.png" id="logo-img" style="width:40px;"></div></a>

    @if (Auth::check())
    <a href="/logout"><div id="signup" class="transit05sec">LOGOUT</div></a>
    @else
      <a href="/gamansaman"><div id="login" class="transit05sec">LOGIN</div></a>
      <a href="/gamansaman"><div id="signup" class="transit05sec">SIGN UP</div></a>
    @endif
  </div>
</div>

 <div id="page-wrap">

  <div id="left-sidebar">

  <div class="betslip">
      <div class="betslip-header golden">RICHEST</div>
      <ul class="betslip-ul">
        <?php $number=1?>
        @foreach($leaderboardsRich as $leader)
          <li class="betslip-li">
            <strong>{{$number}}.</strong> {{{$leader->first_name}}}<br/>
            <strong style="color:#e57373">{{{$leader->current_balance}}} coins</strong>
          </li>
          <?php $number=$number+1?>
        @endforeach
      </ul>

      <div class="betslip-header red">MOST ACTIVE</div>
      <ul class="betslip-ul">
        <?php $number2=1?>
        @foreach($leaderboardsLevel as $leader)
          <li class="betslip-li">
            <strong>{{$number2}}.</strong> {{{$leader->first_name}}}<br/>
            <strong style="color:#e57373">{{{$leader->current_xp}}} xp</strong> <strong>@</strong> <strong style="color:#81C784">level {{{$leader->level}}}</strong>
          </li>
          <?php $number2=$number2+1?>
        @endforeach
      </ul>
    </div>

    {{-- <div class="betslip">
      <div class="betslip-header red">YOUR BETSLIP</div>
      <ul class="betslip-ul">
        <span class="betslip-li-wrap">

          <li class="betslip-li">
            <span class="betslip-title">Manchester wins</span>
            <span class="remove-from-betslip transit05sec"><i class="fa fa-times"></i></span><br/>
            <span class="to-win">To Win: <span class="reward"> enter a stake</span> </span>
            <span class="betslip-odds">14/1</span>
          </li>

          <div class="betslip-stake">
            {{ Form::open(['url' => '', 'data-async', 'name' => 'add_to_betslip']) }}
              {{ Form::text('stake', NULL, ['placeholder' => 'Your stake', 'class' => 'betslip-input'])}}
               <button type="submit" class="betslip-submit">
                  <i class="fa fa-gavel"></i>
              </button>
            {{ Form::close() }}
          </div>
        </span>
      </ul>
      <div class="betslip-totalstake">no stake... yet</div>
      <div class="betslip-footer">
        <a href="#"><span class="betslip-removeAll transit05sec">Remove All</span></a>
        <a href="#"><div class="betslip-place red transit05sec">Place Bet</div></a>
      </div>
    </div> --}}

  </div>

    @yield('content')

  <div id="right-sidebar">
    <div class="profile">
      <span class="profile-name">{{{ $users->first_name}}}</span>
      <span class="profile-level">Level {{{ $users->level}}}</span>
      <div class="profile-photo">
      @if($users->profile_img)
        <img src="{{{ $users->profile_img}}}">
      @else
        <i class="fa fa-user"></i>
      @endif
      </div>
      <span id="profile-new-xp"></span>
      <div class="profile-xp-bar">
        <div class="profile-xp transit05sec" style="width: {{{$xpbarlength}}}%;"></div>
      </div>
      <span class="profile-xp-score"><span class="current-xp">{{{ $users->current_xp}}}</span> / <span class="needed-xp">{{{$level->xp_limit}}}</span> xp</span><br/>
      <span class="bet-limit">Current bet limit : <span id="current-bet-limit">{{{$level->bet_limit}}} </span> coins</span>
    </div>
    <a href="#"><div class="sidebar-button transit05sec">Balance: <span class="goldenfont currentUserBalance">{{{ $users->current_balance}}}</span> coins</div></a>
{{--     <a href="#"><div class="sidebar-button red transit05sec">LEADERBORDS</div></a>
    <a href="#"><div class="sidebar-button golden transit05sec">BET STORE</div></a> --}}
        <div class="adbox">
      <img src="http://revive.menn.is/www/images/c5cd93da866dc4b470633250f4162f53.jpeg">
    </div>
  </div>
</div>

<script src="/js/lucky.js"></script>

<div id="attentionBox">Bet Placed!</div>

</body>

</html>