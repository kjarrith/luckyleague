@extends('layouts.master')

@section('content')

  <div id="main-section">

  <div id="nav">
      <ul>
        <a href="/"><li class="navlink availablebets selected transit05sec"><span></span><i class="fa fa-hand-o-left"></i> Go Back</li></a><li class="navlink placedbets transit05sec"><span><span class="count transit05sec"><span class="count-inner">{{$betcount}}</span></span></i></span>My Bets</li>
      </ul>
    </div>


    <div class="event-bets firstsection">

    <div id="stats">
        <div class="stats-scoreboard">{{ $eventling->event_name }}</div>
    </div>

    @foreach($bets as $bet)
        <div class="event-bet">

            <div class="event-bet-header">
            {{ $bet->description }}
            </div>

            <span class="betlings">


            @if ($bet->bet_type == 2)
                <?php $betClass='onehalf' ?>
            @elseif($bet->bet_type == 1)
                <?php $betClass='onefull' ?>            
            @else 
                <?php $betClass='onethird' ?>   
            @endif

            <?php $count = 0; ?>

            @foreach($bet->betlings as $betling)

            <?php 
                $x = $count / 3;
                $y = (string) $x;
                if ($count == 0 || ctype_digit($y) )
                {
                    $first='first';
                }

                $hasplaced = Betplaced::whereRaw(' betling_id = ? and user_id = ?', [$betling->id,$users->id])->count();
                $class ="";
                if ($hasplaced > 0) {
                    $class = "opacity";
                }

                $s = $betling->title;
            ?>

                <a class="event-bet-link">
                    <div class="event-bet-option {{$betClass}} {{{$class}}} transit05sec {{ $first }}" data-bet-id="{{$bet->id}}" data-betling-id="{{$betling->id}}">

                        <span class="bet-title">
                            {{$s}}
                            <span class="event-bet-odds">
                                {{$betling->odds}}
                            </span>
                        </span>

                    </div>
                </a>

                <?php $first='' ?>
                <?php $count = $count + 1?>
                @endforeach

            </span>

            <span class="bet-actions">
                <input type="tel" class="event-bet-input transit05sec" placeholder="ENTER A STAKE">
                <div class="event-bet-action placebet transit05sec"><i class="fa fa-circle-o-notch fa-spin fa-fw"></i><i class="fa fa-gavel"></i> </div>{{-- <div class="event-bet-action addtobetslip transit05sec "> <i class="fa fa-plus"></i> </div> --}}<div class="event-bet-action cancelbet transit05sec "> <i class="fa fa-times"></i> </div>
            </span>

        </div>
    @endforeach

	</div>

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
