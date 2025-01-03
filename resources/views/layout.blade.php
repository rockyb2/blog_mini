<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mon Blog')</title>
    @vite('resources/css/app.css')
    <!-- Ajoutez vos styles CSS ici -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header class="flex justify-between items-center p-4 bg-white text-black shadow-md">
        <img src="{{ asset('Preview.png') }}" alt="Logo" class="h-12 w-12">
        <nav>
            <a href="{{ route('posts.index') }}" class="m-2">Accueil</a>
            @auth
                <a href="{{ route('posts.create') }}" class="m-2">Créer un Article</a>
                <a href="{{ route('dashboard') }}" class="m-2">Tableau de Bord</a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="m-2">Déconnexion</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="m-2">Connexion</a>
                <a href="{{ route('register') }}" class="m-2">Inscription</a>
                <a href="#" class="m-2" onclick="showLoginPopup()">Créer un Article</a>
            @endauth
        </nav>
    </header>

    <main>
        @yield('content') <!-- Section où le contenu de la page sera inséré -->
    </main>

    <footer class="bg-gray-800 text-white py-4 mt-8">
        <div class="container mx-auto text-center">
            <p>&copy; {{ date('Y') }} <span class="text-lg font-bold">Rockyb2.dev</span>. Tous droits réservés.</p>
            <p class="text-sm">Développé avec ❤️ par Rockyb2</p>
        </div>
    </footer>

    <script>
        function showLoginPopup() {
            alert('Veuillez vous connecter pour créer un article.');
        }
    </script>
</body>
</html>
