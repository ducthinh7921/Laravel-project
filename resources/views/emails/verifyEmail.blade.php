<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2> Chào mừng <strong>{{ $user ->name}}</strong> đã đến với <strong>Twatch </strong> </h2>
    <p>
        Xin vui lòng Click <a href="{{ url('/verify/'.$user->verifyUser->token)}}">VÀO ĐÂY</a> để xác thực Email. 
    </p>
</body>
</html>