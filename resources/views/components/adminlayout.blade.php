<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="icon" type="image/png" href="{{asset('image/instalogo.png')}}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body >
    <x-adminheader/>
    <main>
        <x-sidebar/>
        <div class="contents">
            {{ $slot}}
        </div>
    </main>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>