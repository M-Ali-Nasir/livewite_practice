<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <style>
        .fade-out {
            animation: fadeOut 10s forwards;
        }

        .fade-in-out {
            animation: fadeInOut 6s forwards;
        }

        @keyframes fadeInOut {
            0% {
                opacity: 0;
            }

            15% {
                opacity: 1;
            }

            100% {
                opacity: 0;
            }
        }
    </style>

</head>

<body class="antialiased">

    <div class="flex">

        <div class="w-2/4">
            @livewire('users-list')
        </div>
        <div class="w-2/4">
            @livewire('register-form')
        </div>

    </div>

</body>

</html>