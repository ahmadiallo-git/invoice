<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Nouveau produits') }}
        </h2>
    </x-slot>

    <div class="font-sans text-gray-900 antialiased">
        <div class="flex flex-row">

            
            <div class="w-1/4 flex flex-col justify-between">
                @livewire('cart-products')
            </div>
            
            
            {{-- Main Content --}}
            <div class="w-3/4 p-4">
                {{-- Cart Counter --}}
                @livewire('cartcounter')

                {{-- Products Table --}}
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
                                    {{-- Products Table --}}
                                    @livewire('products')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
