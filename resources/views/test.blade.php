<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ url('/test') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden">
        <button type="submit">Test</button>
    </form>
</body>
</html>