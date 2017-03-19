<h1>HELLO WORLD</h1>


{{ Form::open(array('url' => 'editBetling', 'method' => 'post')) }}
	<input type="text" name="betlingTitle" value="{{$data->title}}">

	<input type="text" name="betlingOdds" value="{{$data->odds}}">

	<button type="submit">STAÐFESTA</button>
{{ Form::close() }}
