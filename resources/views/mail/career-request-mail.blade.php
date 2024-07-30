<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Mail</title>
    </head>
    <body>
    {{-- @dd($info) --}}
    <h1>all clear</h1>
        <h1>Receved a new career request for {{$info['role']}}</h1>
        <p>Receved by {{$info['email']}}</p>
        <h4>Text:</h4>
        <p>{{$info['message']}}</p>
    </body>
</html>