<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
                {{ __('Prisoner Details') }}
            </h2>
            <div class="flex items-center space-x-4">
                <a href="{{ route('prisoners.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest bg-blue-600 hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 transition">{{ __('Create New') }}</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                
                <div class="p-6">
                    <div class="border-b border-gray-200 dark:border-gray-700 pb-4">
                        <h3 class="text-lg font-bold mb-2">{{ $prisoner->name }}</h3>
                        <p class="text-gray-600 dark:text-gray-300">Prisoner ID: {{ $prisoner->id }}</p>
                    </div>
                    <div class="pt-4">
                        <p class="text-gray-600 dark:text-gray-300"><span class="font-bold">National ID:</span> {{ $prisoner->national_id }}</p>
                        <p class="text-gray-600 dark:text-gray-300"><span class="font-bold">Sentence Period:</span> {{ $prisoner->sentence_period }}</p>
                        <p class="text-gray-600 dark:text-gray-300"><span class="font-bold">Admission Date:</span> {{ date('Y-m-d', strtotime($prisoner->admission_date)) }}</p>
                        <p class="text-gray-600 dark:text-gray-300"><span class="font-bold">Date to be Released:</span> {{ date('Y-m-d', strtotime($prisoner->date_to_be_released)) }}</p>
                        <p class="text-gray-600 dark:text-gray-300"><span class="font-bold">Crime:</span> {{ $prisoner->crime->crime }}</p>
                    </div>
                    <div class="flex justify-between items-center mt-6">
                        <a href="{{ route('prisoners.edit', $prisoner->id) }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest bg-blue-600 hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 dark:bg-gray-700 dark:hover:bg-blue-700 dark:active:bg-blue-900 dark:text-white transition">Edit</a>
                        <div class="flex items-center">
                            @if ($previousPrisoner)
                                <a href="{{ route('prisoners.show', $previousPrisoner->id) }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest bg-gray-600 hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 dark:bg-gray-700 dark:hover:bg-gray-700 dark:active:bg-gray-900 dark:text-white transition mx-1"><-</a>
                            @endif
                            @if ($nextPrisoner)
                                <a href="{{ route('prisoners.show', $nextPrisoner->id) }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest bg-gray-600 hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 dark:bg-gray-700 dark:hover:bg-gray-700 dark:active:bg-gray-900 dark:text-white transition mx-1">-></a>
                            @endif
                        </div>
                        <a href="{{ route('prisoners.index') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest bg-gray-600 hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 dark:bg-gray-700 dark:hover:bg-gray-700 dark:active:bg-gray-900 dark:text-white transition">Show All</a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
