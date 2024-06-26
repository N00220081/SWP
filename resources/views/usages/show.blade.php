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
                    
                </div>
            
                <form action="{{ route('usage.destroy', $member)}}" method="post">
                    @method('delete')
                    @csrf
                    <x-primary-button onclick="return confirm('Are you sure you want to Delete?')">Delete</x-primary-button>
                </form>

                
            </div>
        </div>
    </div>
</x-app-layout>
