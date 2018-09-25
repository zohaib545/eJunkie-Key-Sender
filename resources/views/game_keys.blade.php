@foreach($game_keys as $game_key)
{{$game_key['name']}} Steam Key(s)
@foreach($game_key['keys'] as $code)
{{$code[0]}}
@endforeach

@endforeach