<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Nouvelle categorie') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="card">
                    <div class="card-header">
                        <div class="flex">
                            <h3 class="flex-1 mt-4 ml-4">Creation</h3>
                            <a href="{{ route('product.index') }}"
                                class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mx-4">
                                Back
                            </a>
                        </div>
                    </div>
                    <div class="card-body">

                        <form method="POST" enctype="multipart/form-data" action="{{ route('product.store') }}">
                            @csrf
                            <div class="p-5">
                                <label for="name">Nom de la produit</label>
                                <input type="text" name="name" class="block mt-1 rounded-md border-gray-300 w-full">
                                @error('name')
                                <small class="text text-red-500">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="p-5">
                                <label for="slug">Slug</label>
                                <input type="text" name="slug" class="block mt-1 rounded-md border-gray-300 w-full">
                                @error('slug')
                                <small class="text text-red-500">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="p-5">
                                <label for="image">Image produit</label>
                                <input type="file" multiple name="image[]"
                                    class="block mt-1 rounded-md border-gray-300 w-full">
                                @error('image')
                                <small class="text text-red-500">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="p-5">
                                <label for="description">Description</label>
                                <input type="text" name="description"
                                    class="block mt-1 rounded-md border-gray-300 w-full">
                                @error('description')
                                <small class="text text-red-500">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="p-5">
                                <label for="unit_price">Unit price</label>
                                <input type="number" name="unit_price"
                                    class="block mt-1 rounded-md border-gray-300 w-full">
                                @error('unit_price')
                                <small class="text text-red-500">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="p-5">
                                <label for="selling_price">Selling price</label>
                                <input type="number" name="selling_price"
                                    class="block mt-1 rounded-md border-gray-300 w-full">
                                @error('selling_price')
                                <small class="text text-red-500">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="p-5">
                                <label for="quantity">Quantity</label>
                                <input type="number" name="quantity"
                                    class="block mt-1 rounded-md border-gray-300 w-full">
                                @error('quantity')
                                <small class="text text-red-500">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="p-5">
                                <label for="category_id">Category</label>
                                <select name="category_id">
                                    @foreach ($categories as $categorie)
                                    <option value="{{ $categorie->id }}">{{ $categorie->name}}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                <small class="text text-red-500">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="p-5">
                                <label for="status">Status</label>
                                <input type="text" name="status" class="block mt-1 rounded-md border-gray-300 w-full">
                                @error('status')
                                <small class="text text-red-500">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="p-5 flex justify-between items-center">
                                <a href="{{ route('product.cancel') }}"
                                    class="bg-red-600 p-3 rounded text-white">Annuler</a>
                                {{-- <button type="button" onclick="history.back()" class="bg-red-600 p-3 rounded text-white">Annuler</button> --}}
                                <button type="submit" class="bg-green-600 p-3 rounded text-white">Ajouter</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>