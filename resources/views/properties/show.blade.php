
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Property Details') }}
        </h2>
    </x-slot>
    <div class="max-w-4xl mx-auto mt-8">
        <div class="mb-4">
            
            <div class="flex justify-end mt-5">
                <a class="px-2 py-1 rounded-md bg-sky-500 text-sky-100 hover:bg-sky-600" href="{{ route('properties.index') }}">Back</a>
            </div>
        </div>
    
        <div class="flex flex-col mt-5">
            <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-1000/10">
                <h3 class="text-2xl font-semibold">Property: {{ $property->name }}</h3>

                <div class="flex flex-row gap-10 bordered">
                    <div>
                        <p class="text-base text-gray-700 mt-5">
                            <strong> Type: </strong> {{ $property->propertyType->name }}
                        </p>
                    </div>
                    <div>
                        <p class="text-base text-gray-700 mt-5">
                            <strong>No. of Bedreooms:</strong> {{ $property->bedrooms }}
                        </p>
                    </div>
                    <div>
                        <p class="text-base text-gray-700 mt-5">
                            <strong>No. of Bathrooms:</strong> {{ $property->bathrooms }}
                        </p>
                    </div>
                    <div>
                        <p class="text-base text-gray-700 mt-5">
                            <strong>Size(sqm):</strong> {{ $property->size }} sqm
                        </p>
                    </div>
                </div>
                <div class="flex flex-row gap-11 bordered">
                    <div>
                        <p class="text-base text-gray-700 mt-5">
                            <strong>Price:</strong> {{ $property->price }}
                        </p>
                    </div>
                    <div>
                        <p class="text-base text-gray-700 mt-5">
                            <strong>Council Tax Band:</strong> {{ $property->council_tax_band }}
                        </p>
                    </div>
                    <div>
                        <p class="text-base text-gray-700 mt-5">
                            <strong>Tenure:</strong> {{ $property->tenure }}
                        </p>
                    </div>
                </div>
                
                
                
                
                
                
               
                <p class="text-base text-gray-700 mt-5"><strong>Description:</strong> {{ $property->description }}</p>
                <p class="text-base text-gray-700 mt-5"><strong>Address Line 1:</strong> {{ $address->address_line_1 }}</p>
                <p class="text-base text-gray-700 mt-5"><strong>Address Line 2:</strong> {{ $address->address_line_2 }}</p>
                <p class="text-base text-gray-700 mt-5"><strong>City:</strong> {{ $address->city }}</p>
                <p class="text-base text-gray-700 mt-5"><strong>County:</strong> {{ $address->county }}</p>
                <p class="text-base text-gray-700 mt-5"><strong>Postcode:</strong> {{ $address->postcode }}</p>
                <p class="text-base text-gray-700 mt-5"><strong>Latitude:</strong> {{ $address->latitude }}</p>
                <p class="text-base text-gray-700 mt-5"><strong>Longitude: </strong>{{ $address->longitude }}</p>
            </div>
        </div>

        <div  class="flex flex-col mt-5">
            <div class="mb-3">
                <div class="flex justify-start mt-5">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Gallery') }}
                    </h2>
                </div>
            </div>
            
            <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-1000/10">
                <div class="flex gap-4">
                    @foreach ($property->getMedia('media') as $image)
                    <img src="{{ $image->getUrl() }}" alt="{{ $image->getUrl() }}"
                        class="w-20 h-20 shadow">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>