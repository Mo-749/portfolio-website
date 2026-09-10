<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Project bewerken
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if ($errors->any())
                    <div class="mb-4 text-red-600">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('projects.update', $project) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="title" class="block font-medium text-sm text-gray-700 dark:text-gray-300">
                            Titel
                        </label>

                        <input
                            id="title"
                            type="text"
                            name="title"
                            value="{{ old('title', $project->title) }}"
                            class="block mt-1 w-full rounded-md border-gray-300"
                            required
                        >
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block font-medium text-sm text-gray-700 dark:text-gray-300">
                            Beschrijving
                        </label>

                        <textarea
                            id="description"
                            name="description"
                            rows="6"
                            class="block mt-1 w-full rounded-md border-gray-300"
                            required
                        >{{ old('description', $project->description) }}</textarea>
                    </div>

                    <div class="flex gap-3">
                        <a href="{{ route('projects.index') }}"
                           class="px-4 py-2 bg-gray-500 text-white rounded">
                            Annuleren
                        </a>

                        <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded">
                            Wijzigingen opslaan
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>