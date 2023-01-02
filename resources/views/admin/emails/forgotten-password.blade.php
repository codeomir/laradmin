<!DOCTYPE html>
<html>
<head>
    <title>Password Reset Notification</title>
</head>
<body>
    <h1>Hello!</h1>
    <p>We have received a request to reset your password. If you did not request a password reset, please ignore this message.</p>
    <p>To reset your password, please follow the link: <a href="{{env('APP_URL')}}/admin/retrieve-password/{{$token}}">{{env('APP_URL')}}/admin/retrieve-password/{{$token}}</a></p>
</body>
</html>