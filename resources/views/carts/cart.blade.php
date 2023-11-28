@foreach($cart as $item)
    <p>{{ $item['name'] }} - Quantité: {{ $item['quantity'] }} - Prix: {{ $item['price'] * $item['quantity'] }}</p>
@endforeach
