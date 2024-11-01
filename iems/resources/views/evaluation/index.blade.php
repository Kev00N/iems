<x-app-layout>
    <x-slot name="header">
    <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
                {{ __('Evaluation') }}
            </h2>
            <div class="flex items-center space-x-4">
                <a href="{{ route('merits.index') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest bg-blue-600 hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 transition">Merits Report</a>
                <a href="{{ route('demerits.index') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest bg-blue-600 hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 transition">Demerits Report</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-5">
                <style>
                    .card {
                        background-color: #ffffff;
                        color: #333333;
                        border: 1px solid #e2e8f0;
                        border-radius: 8px;
                        padding: 20px;
                        margin-bottom: 20px;
                        padding-bottom: 40px;
                    }

                    .dark .card {
                        background-color: #2d3748;
                        color: #cbd5e0;
                        border-color: #4a5568;
                    }

                    .button-container {
                        display: flex;
                        justify-content: center;
                        margin-bottom: 10px;
                    }

                    .card-button {
                        flex: 1;
                        background-color: #3182ce;
                        color: white;
                        border: none;
                        border-radius: 5px;
                        padding: 15px;
                        margin: 0 5px;
                        cursor: pointer;
                        transition: background-color 0.3s;
                        text-align: center;
                    }

                    .card-button:hover {
                        background-color: #2c5282;
                    }
                </style>
                <div class="card">
                    <div class="button-container">
                        <a href="{{ route('merits.show', $prisoner->id) }}" class="card-button">Merits</a>
                        <a href="{{ route('demerits.show', $prisoner->id) }}" class="card-button">Demerits</a>
                    </div>
                    <div class="button-container">
                        <a href="{{ route('merits.create') }}" class="card-button">Add Merit</a>
                        <a href="{{ route('demerits.create') }}" class="card-button">Add Demerit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
