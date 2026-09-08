<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <div class="min-h-screen bg-gray-100">

        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
                <h1 class="text-xl font-bold">
                    Portfolio Admin
                </h1>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit">
                        Uitloggen
                    </button>
                </form>
            </div>
        </header>

        <main class="max-w-7xl mx-auto px-6 py-8">

            <h2 class="text-3xl font-bold mb-2">
                Dashboard
            </h2>

            <p class="mb-8">
                Welkom, {{ auth()->user()->name }}!
            </p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <a href="#" class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-xl font-bold">Projecten</h3>
                    <p class="mt-2">
                        Projecten bekijken en beheren.
                    </p>
                </a>

                <a href="#" class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-xl font-bold">Project toevoegen</h3>
                    <p class="mt-2">
                        Een nieuw project toevoegen.
                    </p>
                </a>

                <a href="#" class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-xl font-bold">Tags</h3>
                    <p class="mt-2">
                        Projecttags beheren.
                    </p>
                </a>

            </div>

        </main>

    </div>

</body>
</html>