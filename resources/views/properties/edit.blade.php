
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __(' Update Property') }}
        </h2>
    </x-slot>
    <div class="max-w-4xl mx-auto mt-8">
        <div class="mb-4">
            <div class="flex justify-end mt-5">
                <a class="px-2 py-1 rounded-md bg-sky-500 text-sky-100 hover:bg-sky-600" href="{{ route('properties.index') }}">Back</a>
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

                        <form action="{{ route('properties.update',$property->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="flex flex-row gap-10">
                                <div>
                                    <label class="block text-sm font-bold text-gray-700" for="name">Name</label>
                                    <input type="text" name="name" value="{{$property->name}}" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Name">
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700" for="name">Slug</label>
                                    <input type="text" name="slug" value="{{$property->slug}}" class="block  mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Slug">
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700" for="name">Property Type</label>
                                    <select class="block w-full mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="property_type_id">
                                        @foreach ($types as $type)
                                            <option value="{{ $type->id }}" {{ $type->id == $property->property_type_id ? 'selected' : '' }}>{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="flex flex-row gap-10">
                                <div>
                                    <label class=" text-sm font-bold text-gray-700" for="bedrooms">Bedrooms</label>
                                    <input type="number" name="bedrooms" value="{{$property->bedrooms}}" class="block mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="No. of Bedrooms">
                                </div>
                                <div>
                                    <label class=" text-sm font-bold text-gray-700" for="bathrooms">Bathrooms</label>
                                    <input type="number" name="bathrooms" value="{{$property->bathrooms}}" class="block mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="No. of Bathrooms">
                                </div>
                                <div>
                                    <label class=" text-sm font-bold text-gray-700" for="size">Size</label>
                                    <input type="number" value="{{$property->size}}" name="size" class="block  mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Size">
                                </div>
                            </div>
                            <div class="flex flex-row gap-10">
                                <div>
                                    <label class=" text-sm font-bold text-gray-700" for="bedrooms">Price</label>
                                    <input type="number" value="{{$property->price}}" name="price" class="block mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Price">
                                </div>
                                <div>
                                    <label class=" text-sm font-bold text-gray-700" for="bathrooms">Council Tax Band</label>
                                    <input type="text" value="{{$property->council_tax_band}}" name="council_tax_band" class="block mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Council Tax Band">
                                </div>
                                <div>
                                    <label class=" text-sm font-bold text-gray-700" for="size">Tenure</label>
                                    <input type="text" value="{{$property->tenure}}" name="tenure" class="block  mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Tenure">
                                </div>
                            </div>
                            <div class="mt-4">
                                <label class="block text-sm font-bold text-gray-700" for="title">Description</label>
                                <textarea class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="description" placeholder="Description">{{$property->description}}</textarea>
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