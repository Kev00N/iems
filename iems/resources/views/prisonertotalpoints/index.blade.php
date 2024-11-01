<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
                {{ __('Ranking Report') }}
            </h2>
            <div class="flex items-center space-x-4">
                <button onclick="printTable()" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest bg-blue-600 hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 dark:bg-gray-700 dark:hover:bg-blue-700 dark:active:bg-blue-900 dark:text-white transition">Print</button>
            </div>
        </div>
    </x-slot>

    <div id="printableArea">
        <div class="py-12 bg-gray-100 dark:bg-gray-900">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <table id="rankingTable" class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 bg-white dark:bg-gray-800">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Rank</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Prisoner ID</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Total Points</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @php
                                $rank = 1;
                                $prisonersCollection = collect($prisonersTotalPoints)->sortByDesc('total_points');
                            @endphp
                            @foreach ($prisonersCollection as $prisonerTotalPoints)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">{{ $rank }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">{{ $prisonerTotalPoints['prisoner_id']}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">{{ $prisonerTotalPoints['name'] }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">{{ $prisonerTotalPoints['total_points'] }}</td>
                                </tr>
                                @php
                                    $rank++;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function printTable() {
            // Print only the content inside the printableArea div
            var printContents = document.getElementById("printableArea").innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
</x-app-layout>
