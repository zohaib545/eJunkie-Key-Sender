<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Game Keys</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    @foreach($game_keys as $game_key)
    <p><b>{{$game_key['name']}} Steam Key(s)</b></p>
    @foreach($game_key['keys'] as $code)
    {{$code[0]}}<br>
    @endforeach
    <br>
    @endforeach
</body>

</html>