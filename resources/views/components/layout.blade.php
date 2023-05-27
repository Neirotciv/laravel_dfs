<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('app.css') }}">
</head>

<body class="bg-slate-100">
    <header
        class="sticky top-0 flex items-center justify-between px-10 bg-slate-100 drop-shadow-md lg:bg-transparent lg:drop-shadow-none">
        <a href="/">
            <span class="m-4 text-4xl material-symbols-outlined hover:text-slate-400">home</span>
        </a>

        @if (session()->has('success'))
            <div class="px-10 py-2 text-white bg-slate-400 rounded-xl">
                <p>{{ session()->get('success') }}</p>
            </div>
        @endif

        <div id="user-actions" class="flex">
            <a href="{{ route('rgpd') }}" target="_blank" rel="noopener noreferrer">
                <span class="m-4 text-4xl material-symbols-outlined hover:text-slate-400">
                    description
                </span>
            </a>

            <div class="">
                <a href="{{ route('order.show') }}">
                    <span class="m-4 text-4xl material-symbols-outlined hover:text-slate-400">
                        shopping_cart
                    </span>
                </a>
                @if (session()->has('product_count'))
                    <span class="absolute top-0">{{ session()->get('product_count') }}</span>
                @endif
            </div>

            @auth
                <a href="{{ route('dashboard') }}" class="flex flex-col items-center mr-4">
                    <span class="mx-4 mt-4 text-4xl material-symbols-outlined hover:text-slate-400">
                        account_circle
                    </span>
                    <span class="hidden md:inline">{{ auth()->user()->name }}</span>
                </a>
            @endauth

            @guest
                <a href="{{ route('register') }}">
                    <span class="mx-4 my-4 text-4xl material-symbols-outlined hover:text-slate-400">
                        account_circle
                    </span>
                </a>
            @endguest
        </div>
    </header>
    <div class="container mx-auto">
        {{ $slot }}
        <div>
</body>

</html>
