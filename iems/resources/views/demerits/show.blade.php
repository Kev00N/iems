<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
                {{ __('Demerits') }}
            </h2>
            <a href="{{ route('demerits.index') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest bg-blue-600 hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 transition">Demerits Report</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-5">
                <h3>Demerits for Prisoner: <b>{{ $prisoner->name }}</b></h3>
                @php
                    $totalPoints = 0;
                @endphp
                @foreach($demerits as $key => $demerit)
                    <div>
                        <p>{{ $key + 1 }}. Description: {{ $demerit->description }}</p>
                        <p>Points: {{ $demerit->points }}</p>
                        @php
                            $totalPoints += $demerit->points;
                        @endphp
                    </div>
                @endforeach
                <p><b>Total Demerits Points: {{ $totalPoints }}</b></p>
                
                <div class="mt-4 flex justify-center">
                    @if ($previousPrisoner)
                        <a href="{{ route('demerits.show', $previousPrisoner->id) }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest bg-gray-600 hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 dark:bg-gray-700 dark:hover:bg-gray-700 dark:active:bg-gray-900 dark:text-white transition mr-2"> <!-- Adjust padding -->
                            &lt; Previous
                        </a>
                    @endif
                    @if ($nextPrisoner)
                        <a href="{{ route('demerits.show', $nextPrisoner->id) }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest bg-gray-600 hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 dark:bg-gray-700 dark:hover:bg-gray-700 dark:active:bg-gray-900 dark:text-white transition ml-2"> <!-- Adjust padding -->
                            Next &gt;
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
