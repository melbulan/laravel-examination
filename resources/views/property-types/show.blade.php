
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Property Type Details') }}
        </h2>
    </x-slot>
    <div class="max-w-4xl mx-auto mt-8">
        <div class="mb-4">
            
            <div class="flex justify-end mt-5">
                <a class="px-2 py-1 rounded-md bg-sky-500 text-sky-100 hover:bg-sky-600" href="{{ route('property-types.index') }}">Back</a>
            </div>
        </div>
    
        <div class="flex flex-col mt-5">
            <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-1000/10">
                <h3 class="text-2xl font-semibold">{{ $propertyType->name }}</h3>
                <p class="text-base text-gray-700 mt-5">Property Type: {{ $propertyType->name }}</p>
                <p class="text-base text-gray-700 mt-5">Status: {{ $propertyType->is_active ? 'Active' : 'Inactive' }}</p>
                <p class="text-base text-gray-700 mt-5">Description: {{ $propertyType->description }}</p>
            </div>
        </div>
    </div>
    
</x-app-layout>