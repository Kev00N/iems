<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
                    .card-title {
                        text-align: center;
                        margin-bottom: 30px;
                        font-size: 24px;
                    }
                    .button-container {
                        display: flex;
                        flex-wrap: wrap;
                        justify-content: space-between;
                        margin: 0 -5px;
                    }
                    .card-button {
                        background-color: #3182ce;
                        color: white;
                        border: none;
                        border-radius: 5px;
                        padding: 15px 15px;
                        margin: 10px 5px;
                        cursor: pointer;
                        transition: background-color 0.3s;
                        flex: 1 1 48%;
                        text-align: center;
                    }
                    .card-button:hover {
                        background-color: #2c5282;
                    }
                    .card-button.report {
                        flex: 0 1 15%;
                        margin: 30px auto 10px;
                        text-align: center;
                    }
                    .dark .card-button {
                        background-color: #4c51bf;
                    }
                    .dark .card-button:hover {
                        background-color: #434190;
                    }
                </style>
                <div class="card">
                    <h1 class="card-title">Inmate Evaluation and Management System</h1>
                    <div class="button-container">
                        <a href="{{ route('prisoners.show', 1) }}" class="card-button">Prisoners</a>
                        <a href="{{ route('crimes.index') }}" class="card-button">Crimes</a>
                        <a href="{{ route('evaluation.index') }}" class="card-button">Evaluation</a>
                        <a href="{{ route('rehabilitated.index') }}" class="card-button">Rehabilitation</a>
                        <a href="/report" class="card-button report">Report</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
