<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Nouveau produits') }}
        </h2>
    </x-slot>
   @livewire('category.index')
  

  
</x-app-layout>
