<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
                {{ __('Crimes') }}
            </h2>
            <div class="flex items-center space-x-4">
                <button onclick="window.print()" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest bg-blue-600 hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 dark:bg-gray-700 dark:hover:bg-blue-700 dark:active:bg-blue-900 dark:text-white transition">Print</button>
                <a href="{{ route('crimes.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring focus:ring-indigo-300 disabled:opacity-25 transition">{{ __('Create New') }}</a>
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
                                Crime
                            </th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($crimes->sortBy('crime') as $crime)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    {{ $crime->crime }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <div class="flex justify-center items-center">
                                        <a href="{{ route('crimes.edit', $crime->id) }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring focus:ring-indigo-300 disabled:opacity-25 dark:bg-gray-700 dark:hover:bg-indigo-700 dark:active:bg-indigo-900 dark:text-white transition mr-2">Edit</a>
                                        <form action="{{ route('crimes.destroy', $crime->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this crime?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest bg-red-600 hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring focus:ring-red-300 disabled:opacity-25 dark:bg-gray-700 dark:hover:bg-red-700 dark:active:bg-red-900 dark:text-white transition">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
