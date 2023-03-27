
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('List of Properties') }}
        </h2>
    </x-slot>
    <div class="max-w-4xl mx-auto mt-12">

        <div class="flex justify-end mt-10">
            <a href="{{ route('properties.create') }}" class="px-2 py-1 rounded-md bg-blue-500 text-sky-100 hover:bg-blue-700">+ Add New Property</a>
        </div>
    
        <div class="flex flex-col mt-10">
            <div class="flex flex-col">
                <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
    
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                
                    <table class="min-w-full">
                        <thead>
                            <tr class="text-center font-bold">
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Name</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Bedrooms</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Bathrooms</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Size</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Price</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Council Tax</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Tenure</th>
                                <th width="280px" class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Action</th>
                            </tr>
                        </thead>
                        
                        @forelse ($properties as $property)
                        <tr>
                            <td class="px-6 whitespace-no-wrap border-b border-gray-200 bg-gray-50">{{ $property->name }}</td>
                            <td class="px-6 whitespace-no-wrap border-b border-gray-200 bg-gray-50">{{ $property->bedrooms }}</td>
                            <td class="px-6 whitespace-no-wrap border-b border-gray-200 bg-gray-50">{{ $property->bathrooms }}</td>
                            <td class="px-6 whitespace-no-wrap border-b border-gray-200 bg-gray-50">{{ $property->size }}</td>
                            <td class="px-6 whitespace-no-wrap border-b border-gray-200 bg-gray-50">{{ $property->price }}</td>
                            <td class="px-6 whitespace-no-wrap border-b border-gray-200 bg-gray-50">{{ $property->council_tax_band }}</td>
                            <td class="px-6 whitespace-no-wrap border-b border-gray-200 bg-gray-50">{{ $property->tenure }}</td>
                            <td class="px-6 whitespace-no-wrap border-b border-gray-200 bg-gray-50">
                                <form action="{{ route('properties.destroy',$property->id) }}" method="POST">
                
                                    <a class="text-indigo-600 hover:text-indigo-1000" href="{{ route('properties.show',$property->id) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.1043 7.523 5 12 5c4.478 0 8.268 2.1043 10.542 7-1.274 4.057-5.064 7-10.542 7-4.477 0-8.268-2.1043-10.542-7z" />
                                        </svg>
                                    </a>
                    
                                    <a href="{{ route('properties.edit',$property->id) }}" class="text-green-600 hover:text-indigo-1000 text-gray-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-10.414a2 2 0 112.828 2.828L11.828 15H10v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                
                                    @csrf
                                    @method('DELETE')
                    
                                    <button type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 stroke-red-600 hover:text-red-800 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M110 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.105-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 bg-gray-50" colspan="8">
                                No Data
                            </td>
                        </tr>
                        @endforelse
                    </table>
                    <div class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 bg-gray-50">
                        {!! $properties->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>




