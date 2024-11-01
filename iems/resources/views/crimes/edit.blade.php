<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Crime') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-sm mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-700 border-b border-gray-200 dark:border-gray-600">
                    <div class="form-container">
                        <form method="POST" action="{{ route('crimes.update', $crime->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="crime" class="block text-gray-700 dark:text-gray-300">Crime:</label>
                                <input type="text" id="crime" name="crime" value="{{ $crime->crime }}" required
                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 dark:bg-gray-600 dark:border-gray-400 rounded-md shadow-sm focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                            </div>
                           

                            <button type="submit"
                                class="w-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 transition-colors">
                                Update Crime
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
        .dark input[type="text"] {
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
