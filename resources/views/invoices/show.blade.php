
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Nouveau produits') }}
        </h2>
    </x-slot>
  
     <div>
        <h2>Facture {{ $invoice->id }}</h2>
        
        <p>Date: {{ $invoice->created_at->format('d-m-Y H:i:s') }}</p>
        {{-- <p>Utilisateur: {{ $invoice->user->name }}</p> --}}
        {{-- <p>Total quantité: {{ $invoice->total_quantity }}</p> --}}
        <p>Total montant: {{ $invoice->total_amount }}</p>

        <h3>Articles de la facture</h3>
        <ul>
            @foreach ($invoice->items as $item)
                <li>
                    {{ $item->product->name }} -
                    Quantité: {{ $item->quantity }} -
                    Montant: {{ $item->amount }}
                </li>
            @endforeach
        </ul>

        {{-- Ajoute d'autres détails de la facture selon tes besoins --}}
    </div>
</x-app-layout>
