<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Admin</title>
</head>

<body>
    <div style="padding: 25px; text-align:center;font-size:16px;background-color:green; color:white">Traders Income Fund
        Global.</div> <br>
    <h1>Important Message!.
    </h1>
    <p>Greetings {{ $user['name'] }}, <br>
    </p>

    <p>Thank you trading with us at Traders Income Fund, it is our pleasure to let you know that you have been made an
        Admin at Traders Income Fund.
        We wish you happy future tradings with us.
        Please note that you will still use your login details to login to your dashboard.
    </p>
    <br>
    <p style="text-align:center">Just in case you want a quick login to you dashboard, you can visit this link below.
        <br> <br>
        <a href="{{ env('APP_URL') }}/admin"
            style="padding:10px; border-radius:25px; background-color:rgb(22, 21, 21); color:white; text-align:center ">Login
            to
            Dashboard</a>
    </p>

    <br>

    Thanks,<br>
    <div style="padding: 25px; text-align:center;font-size:16px;background-color:#f4f4f4; color:black">&copy; 2020
        Traders Income Fund
        Global. <br>All Rights Reserved</div>
</body>

</html>
