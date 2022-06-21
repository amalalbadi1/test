<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <!-- if user loggin -->
    @if ( Auth::check() )
        your name is : {{ Auth::user()->name }}
        <br>
        your email is : {{ Auth::user()->email }}

    @else
        you are not logged in
    @endif

</body>
</html>