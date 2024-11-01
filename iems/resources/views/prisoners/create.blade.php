<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Prisoner') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-sm mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-700 border-b border-gray-200 dark:border-gray-600">
                    <div class="form-container">
                        <form method="POST" action="{{ route('prisoners.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4">
                                <label for="name" class="block text-gray-700 dark:text-gray-300">Name:</label>
                                <input type="text" id="name" name="name" required autocomplete="name"
                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 dark:bg-gray-600 dark:border-gray-400 rounded-md shadow-sm focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                                @error('name')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="national_id" class="block text-gray-700 dark:text-gray-300">National ID:</label>
                                <input type="text" id="national_id" name="national_id" required autocomplete="off"
                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 dark:bg-gray-600 dark:border-gray-400 rounded-md shadow-sm focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                                @error('national_id')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="sentence_period" class="block text-gray-700 dark:text-gray-300">Sentence Period:</label>
                                <input type="text" id="sentence_period" name="sentence_period" required autocomplete="off"
                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 dark:bg-gray-600 dark:border-gray-400 rounded-md shadow-sm focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                                @error('sentence_period')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="admission_date" class="block text-gray-700 dark:text-gray-300">Admission Date:</label>
                                <input type="date" id="admission_date" name="admission_date" required autocomplete="off"
                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 dark:bg-gray-600 dark:border-gray-400 rounded-md shadow-sm focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                                @error('admission_date')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="date_to_be_released" class="block text-gray-700 dark:text-gray-300">Date to be Released:</label>
                                <input type="date" id="date_to_be_released" name="date_to_be_released" required autocomplete="off"
                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 dark:bg-gray-600 dark:border-gray-400 rounded-md shadow-sm focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                                @error('date_to_be_released')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="crime_id" class="block text-gray-700 dark:text-gray-300">Crime:</label>
                                <select id="crime_id" name="crime_id" required
                                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 dark:bg-gray-600 dark:border-gray-400 rounded-md shadow-sm focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                                    @foreach($crimes as $crime)
                                        <option value="{{ $crime->id }}">{{ $crime->crime }}</option>
                                    @endforeach
                                </select>
                                @error('crime_id')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit"
                                class="w-full px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                                Create Prisoner
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
        .dark input[type="text"], .dark select {
            background-color: #444;
            color: #fff;
        }
        .dark button {
            background-color: #3182ce;
            color: #fff;
        }
        .dark button:hover {
            background-color: #2c5282;
        }
    }
</style>
