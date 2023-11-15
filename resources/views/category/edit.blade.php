<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Édition de Catégorie') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="card">
                    <div class="card-header">
                        <div class="flex">
                            <h3 class="flex-1 mt-4 ml-4">Édition</h3>
                            <a href="{{ route('category.index') }}" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mx-4">
                                Retour
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('category.update', $category->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="p-5">
                                <label for="name">Nom de la catégorie</label>
                                <input type="text" name="name" value="{{ $category->name }}" class="block mt-1 rounded-md border-gray-300 w-full">
                            </div>

                            <div class="p-5">
                                <label for="slug">Slug</label>
                                <input type="text" name="slug" value="{{ $category->slug }}" class="block mt-1 rounded-md border-gray-300 w-full">
                            </div>

                            <!-- Ajoutez d'autres champs ici pour l'édition -->

                            <div class="p-5 flex justify-between items-center">
                                <button type="button" class="bg-red-600 p-3 rounded text-white">Annuler</button>
                                <button type="submit" class="bg-green-600 p-3 rounded text-white">Mettre à jour</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
