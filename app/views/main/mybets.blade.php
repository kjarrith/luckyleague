@extends('/layouts.master')

@section('content')

  <div id="main-section">
    <ul class="center-ul">
      <li class="header-li">My Bets</li>

      @foreach($placedbets as $placedbet)

      <li>{{{$placedbet->bet_id}}}</li>

      @endforeach

    </ul>

  </div>

@stop

