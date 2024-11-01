<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
                {{ __('Rehabilitated Prisoners') }}
            </h2>
            <div class="flex items-center space-x-4">
                <button onclick="window.print()" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest bg-blue-600 hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 dark:bg-gray-700 dark:hover:bg-blue-700 dark:active:bg-blue-900 dark:text-white transition">Print</button>
                <a href="{{ route('rehabilitated.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring focus:ring-indigo-300 disabled:opacity-25 transition">{{ __('Create New') }}</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 bg-white dark:bg-gray-800">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Prisoner ID 
                            </th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Prisoner Name
                            </th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Rehabilitated
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($rehabilitatedPrisoners as $rehabilitatedPrisoner)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    {{ $rehabilitatedPrisoner->prisoner_id }} 
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    {{ $rehabilitatedPrisoner->prisoner->name }} 
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    {{ $rehabilitatedPrisoner->rehabilitated ? 'Yes' : 'No' }}
                                </td>                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
