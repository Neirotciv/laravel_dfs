<x-layout>
    <div class="inline-grid lg:grid-cols-2 grid-cols-1 w-full">
        <form method="POST" action="{{ route('register') }}" class="mx-4 mt-8 flex flex-col bg-white p-8 rounded-xl drop-shadow-md ">
            <fieldset>
                <legend class="text-xl underline">Inscription</legend>
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        
                <div class="mt-4 flex flex-col">
                    <label for="name">Nom</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required class="border border-slate-200 mt-1">
                    @error('name')
                        <p class="text-red-700">{{ $message }}</p>
                    @enderror
                </div>
        
                <div class="mt-4 flex flex-col">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" value="{{ old('email') }}" required class="border border-slate-200 mt-1">
                    @error('email')
                        <p class="text-red-700">{{ $message }}</p>
                    @enderror
                </div>
        
                <div class="mt-4 flex flex-col">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" value="{{ old('password') }}" required class="border border-slate-200 mt-1">
                    @error('password')
                        <p class="text-red-700">{{ $message }}</p>
                    @enderror
                </div>
        
                <button type="submit" class="mt-4 py-2 px-4 bg-slate-200 rounded-md hover:bg-slate-400 hover:text-white">Valider</button>
            </fieldset>
        </form>
        <form method="POST" action="{{ route('login') }}" class="mx-4 flex flex-col bg-white p-8 mt-8 rounded-xl drop-shadow-md  ">
            <fieldset>
                <legend class="text-xl underline">Connexion</legend>
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        
                <div class="mt-4 flex flex-col">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" value="{{ old('email') }}" required class="border border-slate-200 mt-1">
                    @error('email')
                        <p class="text-red-700">{{ $message }}</p>
                    @enderror
                </div>
        
                <div class="mt-4 flex flex-col">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" value="{{ old('password') }}" required class="border border-slate-200 mt-1">
                    @error('password')
                        <p class="text-red-700">{{ $message }}</p>
                    @enderror
                </div>
        
                <button type="submit" class="mt-4 py-2 px-4 bg-slate-200 rounded-md hover:bg-slate-400 hover:text-white">Se connecter</button>
            </fieldset>
        </form>
        <form method="GET" action="{{ route('redirect')}}" class="mx-4 flex flex-col bg-white p-8 mt-8 rounded-xl drop-shadow-md  ">
            <button type="submit" class="mt-4 py-2 px-4 bg-slate-200 rounded-md hover:bg-slate-400 hover:text-white">Connexion a google</button>
        </form>
        <form method="GET" action="{{ route('github.register')}}" class="mx-4 flex flex-col bg-white p-8 mt-8 rounded-xl drop-shadow-md  ">
            <button type="submit" class="mt-4 py-2 px-4 bg-slate-200 rounded-md hover:bg-slate-400 hover:text-white">Connexion a Github</button>
        </form>
    </div>
    
</x-layout>