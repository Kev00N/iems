<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Prisoner Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('prisoners.update', $prisoner->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mt-4">
                            <x-label for="name" :value="__('Name')" />
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ old('name', $prisoner->name) }}" required autofocus />
                        </div>

                        <div class="mt-4">
                            <x-label for="national_id" :value="__('National ID')" />
                            <x-input id="national_id" class="block mt-1 w-full" type="text" name="national_id" value="{{ old('national_id', $prisoner->national_id) }}" required />
                        </div>

                        <div class="mt-4">
                            <x-label for="sentence_period" :value="__('Sentence Period')" />
                            <x-input id="sentence_period" class="block mt-1 w-full" type="text" name="sentence_period" value="{{ old('sentence_period', $prisoner->sentence_period) }}" required />
                        </div>

                        <div class="mt-4">
                            <x-label for="admission_date" :value="__('Admission Date')" />
                            <x-input id="admission_date" class="block mt-1 w-full" type="date" name="admission_date" value="{{ old('admission_date', date('Y-m-d', strtotime($prisoner->admission_date))) }}" required />
                        </div>

                        <div class="mt-4">
                            <x-label for="date_to_be_released" :value="__('Date to be Released')" />
                            <x-input id="date_to_be_released" class="block mt-1 w-full" type="date" name="date_to_be_released" value="{{ old('date_to_be_released', date('Y-m-d', strtotime($prisoner->date_to_be_released))) }}" required />
                        </div>

                        <div class="mt-4">
                            <x-label for="crime_id" :value="__('Crime')" />
                            <select id="crime_id" name="crime_id" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @foreach($crimes as $crime)
                                    <option value="{{ $crime->id }}" @if($crime->id == $prisoner->crime_id) selected @endif>{{ $crime->crime }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Update') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
