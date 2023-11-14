<!-- resources/views/livewire/product-controller/index.blade.php -->
<div>
    <h2>Liste des Produits</h2>

    <!-- Afficher la liste des produits ici -->
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>
                        <button wire:click="edit({{ $product->id }})">Modifier</button>
                        <button wire:click="destroy({{ $product->id }})">Supprimer</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <button wire:click="create">Nouveau Produit</button>

    <!-- Ajouter d'autres éléments de l'interface utilisateur ici -->
</div>
