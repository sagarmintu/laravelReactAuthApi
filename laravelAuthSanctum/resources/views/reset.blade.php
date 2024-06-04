<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body style="margin: 100px;">
    <h1>You Have Requested To Reset Your Password</h1>
    <hr>
    <p>We cannot simply send you your old password. A unique link to reset your password has been generated for you. To reset your, click the following link and follow the instructions.</p>
    <h1><a href="http://127.0.0.1:3000/api/user/reset/{{$token}}">Click Here To Reset Your Password.</a></h1>
</body>
</html>