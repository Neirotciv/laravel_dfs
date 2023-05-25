<nav class="border-b-2 pb-4 mx-8">
    <h2 class="mb-4 font-bold text-2xl">Catégories</h2>
    <ul class="flex overflow-auto no-scrollbar">
        <a href="/" class="rounded-md hover:bg-slate-400 hover:text-white">
            <li class="mx-8">Toutes</li>
        </a>
        @foreach ($categories as $category)
            <a href="/categories/{{ $category->id }}" class="rounded-md hover:bg-slate-400 hover:text-white">
                <li class="mx-8">{{ $category->name }}</li>
            </a>
        @endforeach
    </ul>
</nav>
