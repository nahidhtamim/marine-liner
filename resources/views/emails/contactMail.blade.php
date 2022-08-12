<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Query Email</title>
</head>
<body>
    <div class="card">
        <div class="card-header">
            Contact Email
        </div>
        <div class="card-header">
            <p>Name : {{$details['name']}}</p>
            <p>Email : {{$details['email']}}</p>
            <p>Phone : {{$details['phone']}}</p>
            <p>Company Name : {{$details['company_name']}}</p>
            <p>Content : {{$details['content']}}</p>
        </div>
    </div>
</body>
</html>