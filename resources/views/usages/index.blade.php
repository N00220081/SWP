<!-- resources/views/usages/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usage List') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Member Name
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Shower Length (minutes)
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Date
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Amount (litres)
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($usages as $usage)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $usage->member->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap"
                                        style="
                                            @php
                                                $lengthInMinutes = (int)substr($usage->length, 0, 2) * 60 + (int)substr($usage->length, 3, 2);
                                            @endphp
                                            @if ($lengthInMinutes <= 5)
                                                background-color: green;
                                            @elseif ($lengthInMinutes <= 20)
                                                background-color: #FFD700;
                                            @else
                                                background-color: red;
                                            @endif
                                        "
                                    >
                                        {{ $usage->length }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $usage->date }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $usage->amount }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
