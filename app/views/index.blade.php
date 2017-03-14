@extends('layouts.master')

@section('content')

  <div id="main-section">
      <div id="nav">
      <ul>
        <li class="navlink availablebets selected transit05sec"><span></i></span>Available bets</li><li class="navlink placedbets transit05sec"><span><span class="count transit05sec"><span class="count-inner">{{$betcount}}</span></span></i></span>My Bets</li>
      </ul>
    </div>

    <ul class="available-ul firstsection">

      @foreach($categories as $category)
      @if(count($category->eventlings) > 0)

       <li class="section-li" style="background-image:url('{{{$category->img_url}}}')">{{{$category->cat_name}}}</li>

        @foreach($category->eventlings as $event)
        <?php
          $hasplaced = Betplaced::where('user_id', '=', $users->id)->count();
          $BetCount = Bet::whereRaw('event_id = ? and is_active = 1', [$event->id])->count();

          $class = "";
          if ($BetCount == 0) {
            $class = "opacity";
          }
          if ($event->is_active == 2) {
            $class = "opacity closed";
          }
        ?>

        @if ($event->is_active < 3)
          <a href="/events/{{ $event->id }}">
            <li class="bet-li {{{$class}}}">
              <div class="event_name"> {{$event->event_name}}</div>
            </li>
          </a>
        @endif
        
        @endforeach 

        @endif

      @endforeach

    </ul>

    <ul class="placed-ul secondsection">

    <li class="section-li soccer"></i>ACTIVE</li>

      @foreach($allbets as $activebet)
      
        <?php
          $Betling = Betling::where('id', '=', $activebet->betling_id)->first();
          $Bet = Bet::where('id', '=', $activebet->bet_id)->first();
        ?>

        @if(isset($Bet))

        <?php
          $Event = Eventling::where('id', '=', $Bet->event_id)->first();
          $Category = Category::where('id', '=', $Event->category_id)->first();
          $ToReturn = $activebet->odds * $activebet->stake;
         ?>

          @if($Betling->status == 0)
            <li class="placedbet-li">
            <div class="placedbet-wrap">
              <div class="placedbet_name"><strong>{{{$Betling->title}}}</strong> <br/>{{{$Bet->description}}}<br/><strong style="font-size:0.8em;">{{{$Event->event_name}}} - {{{$Category->cat_name}}}</strong></div>
              <span class="placedbet-stakes">Stake : <strong>{{{$activebet->stake}}}</strong><br/><strong style="color:#FFB300"> x {{{$activebet->odds}}}</strong><br/><strong style="color:#81C784"> = {{{$ToReturn}}}</strong><br/></span>
            </div>
            </li>
          @endif
        @endif
      @endforeach

      <li class="section-li won"></i>WON</li>

        @foreach($allbets as $wonbet)
      
        <?php
          $Betling = Betling::where('id', '=', $wonbet->betling_id)->first();
          $Bet = Bet::where('id', '=', $wonbet->bet_id)->first();
        ?>

        @if(isset($Bet))

        <?php 
          $Event = Eventling::where('id', '=', $Bet->event_id)->first();
          $Category = Category::where('id', '=', $Event->category_id)->first();
          $ToReturn = $wonbet->odds * $wonbet->stake;
        ?>
          @if($Betling->status == 1)
            <li class="placedbet-li">
            <div class="placedbet-wrap">
              <div class="placedbet_name"><strong>{{{$Betling->title}}}</strong> <br/>{{{$Bet->description}}}<br/><strong style="font-size:0.8em;">{{{$Event->event_name}}} - {{{$Category->cat_name}}}</strong></div>
              <span class="placedbet-stakes">Stake : <strong>{{{$wonbet->stake}}}</strong><br/><strong style="color:#FFB300"> x {{{$wonbet->odds}}}</strong><br/><strong style="color:#81C784"> = {{{$ToReturn}}}</strong><br/></span>
            <div class="placedbet-wrap">
            </li>
          @endif
        @endif

      @endforeach

    </ul>

  </div>

@stop

