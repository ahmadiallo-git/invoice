<div>
    @if (session('success'))
        <div class="bg-green-500 text-white m-5 font-bold rounded-md border border-green-600 p-4 flex items-center justify-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="card">
                    <div class="card-header">
                        <div class="flex">
                            <h3 class="flex-1 mt-4 ml-4 text-lg font-semibold">Products</h3>
                            <a href="{{ route('product.create') }}" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mx-4 mb-3">
                                Nouveau
                            </a>
                        </div>  
                    </div>
                    <div class="card-body">
                        <table class="min-w-full border border-gray-300 divide-y divide-gray-300">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Slug</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-300">
                                @foreach($products as $product)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap">{{ $product->id }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap">{{ $product->name }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap">{{ $product->slug }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap">
                                            <a href="{{ route('product.edit', $product->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                                            <form action="{{ route('product.destroy', $product->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:underline ml-2">Delete</button>
                                            </form>
                                            @if ($cart->where('id', $product->id)->count())
                                                In cart
                                            @else
                                            <form wire:submit.prevent="addToCart({{ $product->id }})" action="{{ route('cart.store', $product->id) }}" method="POST" class="inline">
                                                @csrf
                
                                                <input wire:model="quantity.{{ $product->id }}" type="number" class="text-sm sm:text-base px-2 pr-2 rounded-lg border-gray-400" style="width: 50px"/>
                                                <button type="submit" class="bg-blue-500 text-white hover:bg-blue-700 ml-2">Ajouter</button>
                                            </form>
                                            @endif                                            
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            
                        </table>
                        <div class="mt-4">
                            {{-- {{ $product->links() }} --}}
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
