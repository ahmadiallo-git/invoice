{{-- <div>
    <h2>Produits</h2>
    <select wire:model="productId">
        <option value="">Sélectionnez un produit</option>
        @foreach ($products as $product)
            <option value="{{ $product->id }}">{{ $product->name }} - {{ $product->price }}</option>
        @endforeach
    </select>
    <input type="number" wire:model="quantity" min="1">
    <button wire:click="addToCart">Ajouter au panier</button>

    <h2>Panier</h2>
    <ul>
        @foreach ($cartItems as $cartItem)
            <li>
                {{ $cartItem->product->name }} -
                {{ $cartItem->product->selling_price }} -
                Quantité: {{ $cartItem->quantity }}
                <button wire:click="removeFromCart({{ $cartItem->id }})">Supprimer</button>
            </li>
        @endforeach
    </ul>
</div>
 --}}

 <div>
    <h2>Produits</h2>
    <select wire:model="productId">
        <option value="">Sélectionnez un produit</option>
        @foreach ($products as $product)
            <option value="{{ $product->id }}">{{ $product->name }} - {{ $product->price }}</option>
        @endforeach
    </select>
    <input type="number" wire:model="quantity" min="1">
    <button wire:click="addToCart">Ajouter au panier</button>

    <h2>Panier</h2>
    <ul>
        @foreach ($cartItems as $cartItem)
            <li>
                {{ $cartItem->product->name }} -
                {{ $cartItem->product->selling_price }} -
                Quantité: {{ $cartItem->quantity }}
                <button wire:click="removeFromCart({{ $cartItem->id }})">Supprimer</button>
            </li>
        @endforeach
    </ul>

    <button wire:click="checkout">Payer</button>
</div>

