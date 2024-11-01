<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Rehabilitated Prisoner') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-sm mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-700 border-b border-gray-200 dark:border-gray-600">
                    <div class="form-container">
                        <form method="POST" action="{{ route('rehabilitated.store') }}">
                            @csrf
                            <div class="mb-4">
                                <label for="prisoner_id" class="block text-gray-700 dark:text-gray-300">Prisoner ID:</label>
                                <input type="text" id="prisoner_id" name="prisoner_id" required
                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 dark:bg-gray-600 dark:border-gray-400 rounded-md shadow-sm focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                                @error('prisoner_id')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="rehabilitated" class="block text-gray-700 dark:text-gray-300">Rehabilitated:</label>
                                <select id="rehabilitated" name="rehabilitated" required
                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 dark:bg-gray-600 dark:border-gray-400 rounded-md shadow-sm focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                                    <option value="1">Yes</option>
                                </select>
                                @error('rehabilitated')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <p class="text-red-700 dark:text-red-300">* Must have served 80% of sentence.</p>
                                <p class="text-red-700 dark:text-red-300">* Must have earned at least 1 merit.</p>
                                <p class="text-red-700 dark:text-red-300">* Must have 0 demerits.</p>
                                <p class="text-red-700 dark:text-red-300">* Only 1 instance per prisoner.</p>
                            </div>
                            <button type="submit"
                                class="w-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                                Create
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
    @media (prefers-color-scheme: dark) {
        .dark {
            background-color: #333;
            color: #fff;
        }
        .dark input[type="text"],
        .dark select {
            background-color: #444;
            color: #fff;
        }
        .dark button {
            background-color: #4caf50;
            color: #fff;
        }
        .dark button:hover {
            background-color: #45a049;
        }
    }
</style>
