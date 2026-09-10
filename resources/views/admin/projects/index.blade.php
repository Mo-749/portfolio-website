<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Projecten
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-semibold">
                            Mijn projecten
                        </h3>

                        <a href="{{ route('projects.create') }}"
                           class="px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-700">
                            + Project toevoegen
                        </a>
                    </div>

                    @if ($projects->count())
                        <div class="space-y-4">
                            @foreach ($projects as $project)
                                <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4">

                                    @if ($project->image)
                                        <img
                                            src="{{ asset('storage/' . $project->image) }}"
                                            alt="{{ $project->title }}"
                                            class="w-48 h-32 object-cover rounded-lg mb-4"
                                        >
                                    @endif

                                    <h4 class="text-lg font-semibold">
                                        {{ $project->title }}
                                    </h4>

                                    <p class="mt-2 text-gray-600 dark:text-gray-300">
                                        {{ $project->description }}
                                    </p>

                                    <div class="mt-4 flex gap-2">
                                        <a href="{{ route('projects.show', $project) }}"
                                           class="px-3 py-2 bg-blue-600 text-white rounded">
                                            Bekijken
                                        </a>

                                        <a href="{{ route('projects.edit', $project) }}"
                                           class="px-3 py-2 bg-yellow-500 text-white rounded">
                                            Bewerken
                                        </a>

                                        <form action="{{ route('projects.destroy', $project) }}"
                                              method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="px-3 py-2 bg-red-600 text-white rounded">
                                                Verwijderen
                                            </button>
                                        </form>
                                    </div>

                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-600 dark:text-gray-300">
                            Er zijn nog geen projecten toegevoegd.
                        </p>
                    @endif

                </div>
            </div>

        </div>
    </div>
</x-app-layout>