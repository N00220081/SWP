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
            <form action="{{ route('members.store') }}" method="POST">
                @csrf

                {{-- Profile Picture --}}
                <div class="mb-4">
                    <label for="profile_pic" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Profile Picture URL</label>
                    <input type="text" name="profile_pic" id="profile_pic" class="form-input w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('profile_pic') }}" placeholder="Enter Profile Picture URL" required>
                </div>

                {{-- Member Name --}}
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Member Name</label>
                    <input type="text" name="name" id="name" class="form-input w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('name') border-red-500 @enderror" value="{{ old('name') }}" placeholder="Enter Name" required autofocus>
                    @error('name')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Pressure --}}
                <div class="mb-4">
                    <label for="pressure" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pressure</label>
                    <select name="pressure" id="pressure" class="form-select w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                        <option value="low">Low</option>
                        <option value="normal">Normal</option>
                        <option value="high">High</option>
                    </select>
                </div>

                {{-- Temperature --}}
                <div class="mb-4">
                    <label for="temperature" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Temperature</label>
                    <select name="temperature" id="temperature" class="form-select w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                        <option value="extra_cold">Extra Cold</option>
                        <option value="cold">Cold</option>
                        <option value="normal">Normal</option>
                        <option value="hot">Hot</option>
                        <option value="extra_hot">Extra Hot</option>
                        <option value="custom">Custom</option>
                    </select>
                </div>

                {{-- Default Timer --}}
                <div class="mb-4">
                    <label for="timer" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Default Timer (HH:MM)</label>
                    <input type="text" name="timer" id="timer" class="form-input w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('timer') }}" placeholder="Enter Timer (HH:MM)" required>
                </div>

                <button type="submit" class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Create
                </button>
            </form>
        </div>
    </div>
</x-app-layout>