<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Member') }}
        </h2>
    </x-slot>

    <div class="py-6 px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
            <h3 class="text-lg font-semibold mb-4">Edit Member</h3>

            <!-- Display form validation errors -->
            @if ($errors->any())
                <div class="alert alert-danger mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Member update form -->
            <form action="{{ route('members.update', $member) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Profile Picture --}}
                <div class="mb-4">
                    <x-input-label for="profile_pic" :value="__('Profile Picture')" />
                    <x-text-input id="profile_pic" type="text" name="profile_pic" :value="$member->profile_pic" required />
                </div>

                {{-- Member Name --}}
                <div class="mb-4">
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" type="text" name="name" :value="$member->name" required />
                </div>

                {{-- Pressure --}}
                <div class="mb-4">
                    <x-input-label for="pressure" :value="__('Pressure')" />
                    <x-select-input id="pressure" name="pressure" :options="['low' => 'Low', 'normal' => 'Normal', 'high' => 'High']" :selected="$member->pressure" required />
                </div>

                {{-- Temperature --}}
                <div class="mb-4">
                    <x-input-label for="temperature" :value="__('Temperature')" />
                    <x-select-input id="temperature" name="temperature" :options="['extra_cold' => 'Extra Cold', 'cold' => 'Cold', 'normal' => 'Normal', 'hot' => 'Hot', 'extra_hot' => 'Extra Hot', 'custom' => 'Custom']" :selected="$member->temperature" required />
                </div>

                {{-- Default Timer --}}
                <div class="mb-4">
                    <x-input-label for="timer" :value="__('Timer')" />
                    <x-text-input id="timer" type="time" name="timer" :value="$member->timer" placeholder="HH:MM" required />
                </div>

                <x-primary-button type="submit" class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Save
                </x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>
