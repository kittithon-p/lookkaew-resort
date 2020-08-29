<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<body>
    <dev id="app">
        <navigate-component></navigate-component>
        <router-view></router-view>
    </dev>
    <script src="{{asset('js/app.js')}}"></script>
</body>

</html>