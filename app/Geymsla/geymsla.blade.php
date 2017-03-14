//FORMS 

{{ Form::open(array('url' => '')) }}
    {{ Form::text('username', NULL, ['placeholder' => 'Nafn', 'class' => 'input big'])}} 
    {{ Form::submit('go', ['class' => 'input big']) }} 
{{ Form::close() }}

// Sækja eitt input

return Input::get('stake');

//Hash-a passwords

Hash::make(Input::get('password'));

//CREATING COOKIES

$expire=time()+60*60*24*10000;
setcookie("uid", $id, $expire);