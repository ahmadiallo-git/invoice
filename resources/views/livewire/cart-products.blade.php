<div class="fixed right-80 mx-80 w-1/4 bg-white border-l-2 h-full block px-2">
    <div class="bg-white pl-3 pr-5 py-10">
        <div class="flex justify-between border-b pb-8">
            <h1 class="font-semibold">Shopping Cart</h1>
            <h2 class="font-semibold text-2xl">{{$cartItems->sum('qty').' Items'}}</h2>
        </div>
        <table>
            <thead>
                <tr>
                    <th class="font-semibold text-gray-600 text-xs uppercase">Product Details</th>
                    <th class="font-semibold text-gray-600 text-xs uppercase">Quantity</th>
                    <th class="font-semibold text-gray-600 text-xs uppercase">Price</th>
                    <th class="font-semibold text-gray-600 text-xs uppercase">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cartItems as $item)
                    <tr>
                        <td>
                            <div>
                                <span class="font-bold text-sm">{{$item->name}}</span>
                            </div>
                        </td>
                        <td>
                            {{-- <span>{{$item->qty}}</span> --}}
                            <button wire:click="decreaseQuantity('{{$item->id}}, {{$item->qty}}')"><span>-</span></button>
                            <span class="mx-2">{{$item->qty}}</span>
                            <button wire:click="increaseQuantity('{{$item->id}}')"><span>+</span></button>
                            
                        </td>
                        <td>
                            <span>{{$item->price}}</span>
                        </td>
                        <td>
                            <span>{{$item->total}}</span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
