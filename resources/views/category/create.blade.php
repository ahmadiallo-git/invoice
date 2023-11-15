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
                            <a href="{{ route('category.index') }}" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mx-4">
                                Back
                            </a>
                        </div>                        
                    </div>
                    <div class="card-body">
                        
                        <form method="POST" action="{{ route('category.store') }}">
                            @csrf
                            <div class="p-5">
                                <label for="name">Nom de la catégorie</label>
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

                            <div class="p-5 flex justify-between items-center">
                                <a href="{{ route('category.cancel') }}" class="bg-red-600 p-3 rounded text-white">Annuler</a>
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
