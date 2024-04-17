<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Members') }}
        </h2>
    </x-slot>

    <div class="bg-gray-100 dark:bg-gray-900 min-h-screen flex justify-center items-top my-10">
        <div class="max-w-7xl sm:px-6 lg:px-8">
            <div class="flex flex-wrap justify-start">
                @foreach ($members as $member)
                    <div class="w-1/3 p-4"> <!-- Adjust width based on desired number of items per row -->
                        <div class="bg-white shadow-md rounded-lg overflow-hidden">
                            <div class="px-6 py-6">
                                <a href="{{ route('members.show', ['member' => $member]) }}" class="block text-center">
                                    <img class="w-50 h-50 object-cover rounded-full mx-5" src="{{ $member->profile_pic }}" alt="{{ $member->name }}">
                                    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mt-4">{{ $member->name }}</h2>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="flex justify-center">
                <x-primary-button>
                    <a href="{{ route('members.create') }}">
                        {{ __('Create a new Member') }}
                    </a>
                </x-primary-button>
            </div>
        </div>
    </div>
</x-app-layout>
