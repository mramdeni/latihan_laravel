<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post</title>
</head>
<body>
    <form action="/post" method="POST">
        @csrf
    
        <input type="text" name="title" placeholder="title">
        <input type="text" name="description" placeholder="description">

        <button type="submit">submit</button>

    </form>
</body>
</html>