<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Member') }}
        </h2>
    </x-slot>

    <div class="py-6 px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
            <h3 class="text-lg font-semibold mb-4">New Member</h3>

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

            <!-- Member creation form -->
            <form action="{{ route('members.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Profile Picture --}}
                <div class="mb-4">
                    <x-input-label for="profile_pic" :value="__('Profile Picture')" />
                    <x-text-input id="profile_pic" type="text" name="profile_pic" required />
                </div>

                {{-- Member Name --}}
                <div class="mb-4">
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" type="text" name="name" required />
                </div>

                {{-- Pressure --}}
                <div class="mb-4">
                    <x-input-label for="pressure" :value="__('Pressure')" />
                    <x-select-input id="pressure" name="pressure" :options="['low' => 'Low', 'normal' => 'Normal', 'high' => 'High']" required />
                </div>

                {{-- Temperature --}}
                <div class="mb-4">
                    <x-input-label for="temperature" :value="__('Temperature')" />
                    <x-select-input id="temperature" name="temperature" :options="['extra_cold' => 'Extra Cold', 'cold' => 'Cold', 'normal' => 'Normal', 'hot' => 'Hot', 'extra_hot' => 'Extra Hot', 'custom' => 'Custom']" required />
                </div>

                {{-- Default Timer --}}
                <div class="mb-4">
                    <x-input-label for="timer" :value="__('Timer')" />
                    <x-text-input id="timer" type="time" name="timer" placeholder="HH:MM" required />
                </div>

                <x-primary-button type="submit">
                    Create
                </x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>
