<h1>Edit bet</h1>


{{ Form::open(array('url' => 'editBetlingPost', 'method' => 'post')) }}

	{{ Form::hidden('betlingID', $data->id) }}
	<input type="text" name="betlingTitle" value="{{$data->title}}">

	<input type="text" name="betlingOdds" value="{{$data->odds}}">

	<button type="submit">STAÐFESTA</button>
{{ Form::close() }}
