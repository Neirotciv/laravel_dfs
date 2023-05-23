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
    @foreach ($products as $product)
        <div class="card ">
            <h1>{{ $product->name }}</h1>
            <p class="text-ellipsis">
                {{ $product->description }}
            </p>
            <p>
                {{ $product->category->name }}
            </p>
        </div>
    @endforeach
</body>
</html>