<!DOCTYPE html>
<html lang="fr" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - Mon Blog Admin</title>

    <!-- Tailwind CSS via CDN (v3.4+) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'ui-sans-serif', 'system-ui', ...]
                    }
                }
            }
        }
    </script>
    <link href="https://rsms.me/inter/inter.css" rel="stylesheet">

    <!-- Icônes Heroicons (optionnel mais joli) -->
    <script src="https://unpkg.com/heroicons@2.1.1/dist/heroicons.min.js"></script>

    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>

<body class="h-full">

<div class="min-h-full">
    <!-- Navbar fixe -->
    <header class="bg-white shadow-sm border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <h1 class="text-xl font-semibold text-gray-900">
                        <a href="{{ route('articles.index') }}">Blog Admin</a>
                    </h1>
                </div>

                <div class="flex items-center space-x-6">
                    @auth
                        <span class="text-sm text-gray-700">
                            Connecté : <strong>{{ auth()->user()->name }}</strong>
                            ({{ ucfirst(auth()->user()->role) }})
                        </span>

                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit"
                                    class="text-sm text-gray-500 hover:text-gray-700 underline">
                                Déconnexion
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-blue-600 hover:text-blue-800">
                            Connexion
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <!-- Contenu principal -->
    <main class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Messages flash (erreurs, succès, etc.) -->
            @if(session('error'))
                <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                    {{ session('error') }}
                </div>
            @endif

            @if($errors->any())
                <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Contenu dynamique -->
            @yield('content')
        </div>
    </main>
</div>

<!-- Scripts en bas de page -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@yield('scripts')

</body>
</html>
