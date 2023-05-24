<article class="bg-white w-80 m-4 rounded-xl flex flex-col items-center transition duration-300 hover:scale-105 hover:shadow-2xl hover:ease-in">
    <figure>
        <img class="rounded-t-xl object-contain" src="https://picsum.photos/seed/{{ $product->id }}/400.webp" alt="{{ $product->name }}">
    </figure>

    <h2 class="font-bold">{{ $product->name }}</h2>
    <p>{{ $product->description }}</p>
    <span>{{ $product->price }}</span>
    <div>
        <button>Ajouter au panier</button>
    </div>
</article>