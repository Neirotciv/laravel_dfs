<article class="bg-white w-80 m-8 rounded-xl flex flex-col items-center shadow transition duration-300 hover:scale-105 hover:shadow-2xl hover:ease-in">
    <figure>
        <img class="rounded-t-xl object-contain" src="https://picsum.photos/seed/{{ $product->id }}/400.webp" alt="{{ $product->name }}">
    </figure>

    <div class="flex justify-between items-center w-full p-4">
        <div class="infos">
            <h3 class="font-bold text-xl">{{ $product->name }}</h3>
            <span>{{ $product->price }}€</span>
        </div>
        <div class="action">
            <a href="">
                <span class="material-symbols-outlined text-2xl m-2 px-4 py-2 rounded-md bg-slate-200 hover:bg-slate-400 hover:text-white">
                    add_shopping_cart
                </span>
            </a>
        </div>
    </div>
</article>