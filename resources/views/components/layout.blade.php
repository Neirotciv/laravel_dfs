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
    <header class="flex justify-end sticky top-0">
        <span class="material-symbols-outlined text-4xl m-4">shopping_cart</span>
        <span class="material-symbols-outlined text-4xl my-4 mr-4">account_circle</span>
    </header>
    {{ $slot }}
</body>
</html>