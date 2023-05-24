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
    <header class="flex justify-between items-center sticky top-0">
        <a href="/">
            <span class="material-symbols-outlined text-4xl m-4">home</span>
        </a>
        
        @if (session()->has('success'))
            <div class="bg-slate-400 text-white px-10 py-2 rounded-xl">
                <p>{{ session()->get('success') }}</p>
            </div>
        @endif

        <div id="user-actions">
            <span class="material-symbols-outlined text-4xl m-4">shopping_cart</span>
            <a href="{{ route('register') }}">
                <span class="material-symbols-outlined text-4xl my-4 mr-4">account_circle</span>
            </a>
        </div>
    </header>
    
    {{ $slot }}
</body>
</html>