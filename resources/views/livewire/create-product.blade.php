<div class="p-3 bg-white shadow-sm">
    <form method="POST" wire:submit.prevent="store"> 
        @csrf
        @method('post')
        <div class="p-5">
            <label for="name">Libellé du produit</label>
            <input wire:model="name" type="text" name="name" class="block mt-1 rounded-md border-gray-300 w-full @error('name') border-red-500 bg-red-100 animate-bounce @enderror">
            @error('name')
            <div class="text-red-500">*Le champs name est requis</div>
            @enderror
        </div>
        <div class="p-5">
            <label for="slug">Slug</label>
            @error('slug')
            <div class="text-red-500">*Le champs name est requis</div>
            @enderror
            <input wire:model="slug" type="text" name="slug" class="block mt-1 rounded-md border-gray-300 w-full  @error('name') border-red-500 bg-red-100 animate-bounce @enderror">
        </div>
        <div class="p-5">
            <label for="brand">Marque</label>
            @error('brand')
            <div class="text-red-500">*Le champs name est requis</div>
            @enderror
            <input wire:model="brand" type="text" name="brand" class="block mt-1 rounded-md border-gray-300 w-full  @error('name') border-red-500 bg-red-100 animate-bounce @enderror">
        </div>
        <div class="p-5">
            <label for="description">Description</label>
            @error('description')
            <div class="text-red-500">*Le champs name est requis</div>
            @enderror
            <textarea wire:model="description" name="description" class="block mt-1 rounded-md border-gray-300 w-full  @error('name') border-red-500 bg-red-100 animate-bounce @enderror"></textarea>
        </div>
        <div class="p-5">
            <label for="unit_price">Prix unitaire</label>
            @error('unit_price')
            <div class="text-red-500">*Le champs name est requis</div>
            @enderror
            <input wire:model="unit_price" type="text" name="unit_price" class="block mt-1 rounded-md border-gray-300 w-full  @error('name') border-red-500 bg-red-100 animate-bounce @enderror">
        </div>
        <div class="p-5">
            <label for="selling_price">Prix de vente</label>
            @error('selling_price')
            <div class="text-red-500">*Le champs name est requis</div>
            @enderror
            <input  wire:model="selling_price" type="text" name="selling_price" class="block mt-1 rounded-md border-gray-300 w-full  @error('name') border-red-500 bg-red-100 animate-bounce @enderror">

        </div>
        <div class="p-5">
            <label for="quantity">Quantité</label>
            @error('quantity')
            <div class="text-red-500">*Le champs name est requis</div>
            @enderror
            <input  wire:model="quantity" type="number" name="quantity" class="block mt-1 rounded-md border-gray-300 w-full">
        </div>
        <div class="p-5">
            <label for="trending">Tendance</label>
            {{-- @error('name')
            <div class="text-red-500">*Le champs name est requis</div>
            @enderror --}}
            <input class="block mt-1 rounded-md border-gray-300 @error('name') border-red-500 bg-red-100 animate-bounce @enderror"  wire:model="trending" type="checkbox" name="trending" value="1">
        </div>
        <div class="p-5">
            <label for="status">Statut</label>
            <input class="block mt-1 rounded-md border-gray-300 @error('name') border-red-500 bg-red-100 animate-bounce @enderror" wire:model="status" type="checkbox" name="status" value="1">
        </div>
        <div class="p-5 flex justify-between items-center">
            <button type="submit" class="bg-red-600 p-3 rounded text-white">Annuler</button>
            <button type="submit" class="bg-green-600 p-3 rounded text-white">Ajouter</button>
        </div>
    </form>
</div>
