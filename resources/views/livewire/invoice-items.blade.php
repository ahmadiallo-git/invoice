{{-- <div>
    @foreach ($products as $key => $product)
        <div class="mb-3">
            <div>
                {{ $product['name'] }} (Prix : {{ $product['price'] }})
            </div>
            <div>
                <input type="number" wire:model="quantities.{{ $key }}" min="1">
            </div>
            <div>
                <button wire:click="removeProduct({{ $key }})">Supprimer</button>
            </div>
        </div>
    @endforeach

    <div>
        <input type="number" wire:model="discount" placeholder="Rabais">
    </div>

    <div>
        <div>
            Subtotal: {{ $total }}
        </div>
        <div>
            Total after Discount: {{ $total - $discount }}
        </div>
    </div>
</div> --}}
<div>
    <!-- Formulaire d'ajout de produits -->
    <div class="mb-3">
        <input type="text" wire:model="newProduct.name" placeholder="Nom du produit">
        <input type="number" wire:model="newProduct.price" placeholder="Prix du produit">
        <button wire:click="addProduct">Ajouter</button>
    </div>

    <!-- Liste des produits existants -->
    @foreach ($products as $key => $product)
        <div class="mb-3">
            <div>
                {{ $product['name'] }} (Prix : {{ $product['price'] }})
            </div>
            <div>
                <input type="number" wire:model="quantities.{{ $key }}" min="1">
            </div>
            <div>
                <button wire:click="removeProduct({{ $key }})">Supprimer</button>
            </div>
        </div>
    @endforeach

    <!-- Rabais -->
    <div class="mb-3">
        <input type="number" wire:model="discount" placeholder="Rabais">
    </div>

    <!-- Total -->
    <div>
        <div>
            Subtotal: {{ $total }}
        </div>
        <div>
            Total after Discount: {{ $total - $discount }}
        </div>
    </div>

    <div>
        <button wire:click="calculateTotal">Recalculer</button>
    </div>
</div>
