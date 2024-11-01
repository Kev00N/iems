<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Demerit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-sm mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-700 border-b border-gray-200 dark:border-gray-600">
                    <div class="form-container">
                        <form method="POST" action="{{ route('demerits.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4">
                                <label for="prisoner_id" class="block text-gray-700 dark:text-gray-300">Prisoner ID:</label>
                                <input type="text" id="prisoner_id" name="prisoner_id" required autocomplete="prisoner_id"
                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 dark:bg-gray-600 dark:border-gray-400 rounded-md shadow-sm focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                                @error('prisoner_id')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="description" class="block text-gray-700 dark:text-gray-300">Description:</label>
                                <textarea id="description" name="description" required autocomplete="description"
                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 dark:bg-gray-600 dark:border-gray-400 rounded-md shadow-sm focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"></textarea>
                                @error('description')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="points" class="block text-gray-700 dark:text-gray-300">Points:</label>
                                <input type="text" id="points" name="points" required autocomplete="points"
                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 dark:bg-gray-600 dark:border-gray-400 rounded-md shadow-sm focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                                @error('points')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            

                            <button type="submit"
                                class="w-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                                Create Demerit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
