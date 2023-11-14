<!-- resources/views/livewire/product-controller/create.blade.php -->

<div>
    <h2>Créer un Nouveau Produit</h2>

    <!-- Formulaire pour créer un nouveau produit -->
    <form wire:submit.prevent="store">
        <div>
            <label for="name">Nom du Produit :</label>
            <input type="text" wire:model="name" id="name" required>
            @error('name') <span>{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="brand">Marque :</label>
            <input type="text" wire:model="brand" id="brand">
            @error('brand') <span>{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="description">Description :</label>
            <textarea wire:model="description" id="description"></textarea>
            @error('description') <span>{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="unitPrice">Prix Unitaire :</label>
            <input type="text" wire:model="unitPrice" id="unitPrice" required>
            @error('unitPrice') <span>{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="sellingPrice">Prix de Vente :</label>
            <input type="text" wire:model="sellingPrice" id="sellingPrice" required>
            @error('sellingPrice') <span>{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="quantity">Quantité :</label>
            <input type="number" wire:model="quantity" id="quantity" required>
            @error('quantity') <span>{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="trending">Tendance :</label>
            <input type="checkbox" wire:model="trending" id="trending">
            @error('trending') <span>{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="status">Statut :</label>
            <input type="checkbox" wire:model="status" id="status">
            @error('status') <span>{{ $message }}</span> @enderror
        </div>

        <button type="submit">Enregistrer</button>
    </form>
</div>

