<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="{{url('formlogin')}}" method="POST">
    @csrf
        tài khoản: <input type="text" name="username" ><br>
        mật khẩu: <input type="text" name="password" ><br>
        <button type="submit">Login</button>
    </form>
</body>

</html>
