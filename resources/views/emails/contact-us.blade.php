<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Contact Message</title>
</head>

<body>
    <div style="padding: 25px; font-size:16px; text-align:center;background-color:green; color:white">Traders Income
        Fund Global.</div> <br>
    <h1> You have a new contact message from {{ $data['name'] }}.
    </h1>
    <h4>Message Details, <br></h4>
    <p>
        Name: {{ $data['name'] }} <br>
        Email: {{ $data['email'] }} <br>
        Mail Subject: {{ $data['subject'] }} <br>
        Mail message: {{ $data['message'] }} <br>

    </p>


    Thanks,<br>
    <div style="padding: 25px; font-size:16px; text-align:center;background-color:#f4f4f4; color:black">&copy; 2020
        Traders Income Fund
        Global. <br>All Rights Reserved</div>
</body>

</html>
