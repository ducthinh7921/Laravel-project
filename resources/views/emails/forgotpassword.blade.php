<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2> Xin chào <strong>{{ $user ->name}}!</strong> Bạn muốn đổi mật khẩu? </h2> 

    <p>
    Xin vui lòng Click <a href="{{ url('/forgotpassword/'.$user->code)}}">VÀO ĐÂY</a> để xác nhận đổi mật khẩu.
    </p>
</body>
</html>