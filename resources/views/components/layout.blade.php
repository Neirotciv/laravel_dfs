<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Document</title>
</head>
<body class="bg-slate-100">
    <header class="bg-slate-100 px-10 drop-shadow-md flex justify-between items-center sticky top-0 lg:bg-transparent lg:drop-shadow-none">
        <a href="/">
            <span class="material-symbols-outlined text-4xl m-4 hover:text-slate-400">home</span>
        </a>
        
        @if (session()->has('success'))
            <div class="bg-slate-400 text-white px-10 py-2 rounded-xl">
                <p>{{ session()->get('success') }}</p>
            </div>
        @endif

        <div id="user-actions" class="flex">
            <span class="material-symbols-outlined text-4xl m-4 hover:text-slate-400">
                shopping_cart
            </span>
            @auth
            <a href="{{ route('dashboard') }}" class="flex flex-col items-center mr-4">
                <span class="material-symbols-outlined text-4xl mx-4 mt-4 hover:text-slate-400">
                    account_circle
                </span>
                <span>{{ auth()->user()->name }}</span>
            </a>    
            @endauth
            @guest
                <a href="{{ route('register') }}">
                    <span class="material-symbols-outlined text-4xl mx-4 my-4 hover:text-slate-400">
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