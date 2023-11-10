<form action="{{ route('products.store') }}" method="post">
    @csrf
  

    <div class="mb-3">
        <label for="description">Description :</label>
        <input type="text" name="description" id="description">
    </div>

    <div class="mb-3">
        <label for="unit_price">Prix unitaire :</label>
        <input type="number" name="unit_price" id="unit_price">
    </div>

    <button type="submit">Créer le produit</button>
</form>
