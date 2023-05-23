<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
    <h1>Bienvenue</h1>
    <div class="flex flex-wrap">
        @foreach ($products as $product)
            <div class="bg-slate-100 w-96 h-48 m-10 flex flex-col items-center">
                <h1 class="font-bold">{{ $product->name }}</h1>
                <p>
                    {{ $product->description }}
                </p>
            <p>
               catégorie : {{ $product->category->name }}
            </p>
            </div>
        @endforeach
    </div>
</body>
</html>