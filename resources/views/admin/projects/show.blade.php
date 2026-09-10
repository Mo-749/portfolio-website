<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Project bekijken
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                    {{ $project->title }}
                </h1>

                <p class="mt-4 text-gray-600 dark:text-gray-300">
                    {{ $project->description }}
                </p>

                            @if ($project->image)
                <div class="mt-6">
                    <img
                        src="{{ asset('storage/' . $project->image) }}"
                        alt="{{ $project->title }}"
                        class="max-w-full h-auto rounded-lg shadow"
                    >
                </div>
            @endif

                <div class="mt-6 flex gap-3">
                    <a href="{{ route('projects.index') }}"
                       class="px-4 py-2 bg-gray-500 text-white rounded">
                        Terug
                    </a>

                    <a href="{{ route('projects.edit', $project) }}"
                       class="px-4 py-2 bg-yellow-500 text-white rounded">
                        Bewerken
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>