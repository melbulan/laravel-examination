
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update Property Types') }}
        </h2>
    </x-slot>
    <div class="max-w-4xl mx-auto mt-8">
        <div class="mb-4">
            <div class="flex justify-end mt-5">
                <a class="px-2 py-1 rounded-md bg-sky-500 text-sky-100 hover:bg-sky-600" href="{{ route('property-types.index') }}">Back</a>
            </div>
        </div>

        <div class="flex flex-col mt-5">
            <div class="flex flex-col">
                <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">

                    @if ($errors->any())
                        <div class="p-3 rounded bg-red-500 text-white m-3">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-1000/10">

                        <form action="{{ route('property-types.update',$propertyType->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="flex flex-row gap-10">
                                <div>
                                    <label class="block text-sm font-bold text-gray-700" for="name">Name</label>
                                    <input type="text" name="name" value="{{$propertyType->name}}" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Name">
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700" for="name">Status</label>
                                    <select class="block w-full mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="is_active">
                                        
                                            <option value="1" {{ $propertyType->is_active == 1 ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ $propertyType->is_active == 0 ? 'selected' : '' }}>Inactive</option>
                                        
                                    </select>
                                </div>
                            </div>
                            
                            <div class="mt-4">
                                <label class="block text-sm font-bold text-gray-700" for="title">Description</label>
                                <textarea class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="description" placeholder="Description">{{$propertyType->description}}</textarea>
                            </div>

                            <div class="flex items-center justify-start mt-4 gap-x-2">
                                <button type="submit" class="px-6 py-2 text-sm font-semibold rounded-md shadow-md text-green-100 bg-green-500 hover:bg-green-700 focus:outline-none focus:border-gray-1000 focus:ring ring-gray-300">Submit</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>