<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __($member->name) }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <!-- Member Details Section -->
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold mb-2"> {{ __($member->name) }}'s Details</h3>
                        <div class="flex flex-col md:flex-row">
                            <div class="md:w-1/2 mb-4 md:mb-0">
                                <strong class="block mb-1">Preferred Pressure:</strong>
                                <span>{{ $member->pressure }}</span>
                            </div>
                            <div class="md:w-1/2 mb-4 md:mb-0">
                                <strong class="block mb-1">Preferred Temperature:</strong>
                                <span>{{ $member->temperature }}</span>
                            </div>
                        </div>
                        <div class="mt-4">
                            <strong class="block mb-1">Latest Timer Set:</strong>
                            <span>{{ $member->timer }}</span>
                        </div>
                    </div>

                    <!-- Usage Details Section -->
                    <div>
                        <h3 class="text-lg font-semibold mb-2">Usage Details</h3>
                        @if ($member->usages->count() > 0)
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Shower Length</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount (litres)</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($member->usages as $usage)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $usage->date }}</td>
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
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $usage->amount }} litres</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p>No usage data available for this member.</p>
                        @endif
                    </div>

                    <!-- Button Section -->
                    <div class="mt-6 flex justify-end">
                        <x-primary-button class="mr-4">
                            <a href="{{ route('members.edit', $member) }}">Edit</a>
                        </x-primary-button>
                        <form action="{{ route('member.destroy', $member) }}" method="post">
                            @method('delete')
                            @csrf
                            <x-primary-button onclick="return confirm('Are you sure you want to delete?')">Delete</x-primary-button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
