<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.2/dist/flowbite.min.css"/>
    <script src="https://unpkg.com/flowbite@1.5.2/dist/flowbite.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#7790ef",
                    },
                },
            },
        };
    </script>
    <link rel="icon" href="{{ url('images/icon.png') }}">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    @livewireStyles
    <title>FinHub</title>
</head>
<body class="mb-48">

@include('partials._nav-bar')

<main>
    {{$slot}}
</main>
<x-flash-message></x-flash-message>
@include('partials._footer')
@livewireScripts
</body>
</html>
