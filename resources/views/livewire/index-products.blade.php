<div class="mt-5">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8">
        <div class="flex justify-between">
            <h4>Liste des produits </h4>
            <a href="{{route('creat.products')}}" class="bg-blue-500 rounded-md p-4 text-blue">
                Nouveau produit
            </a>
        </div>

        {{-- Message qui apparaitra apres operation --}}

        <div class="flex flex-col">
            <div class="block p-2 bg-green-500 text-white mt-2 roounded-sm shadow-sm">
                Lorem ipsum dolor sit amet consectetur, adipisicing 
            </div>
        </div>

        {{-- Styliser le tableau --}}
        <div class="overflow-x-auto sm:mx-6 lg:mx8">

            <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8"> 

                <div class="overflow-hidden">
                    <table  class="min-w-full text-center">
                            <thead class="border-b bg-gray-50">
                                 <tr>
                                    <th class="text-sm font-medium py-6 px-6 text-gray-900">
                                        Libele
                                    </th>
                                    <th class="text-sm font-medium py-6 px-6 text-gray-900">
                                        Libele
                                    </th>
                                    <th class="text-sm font-medium py-6 px-6 text-gray-900">
                                        Libele
                                    </th>
                                    <th class="text-sm font-medium py-6 px-6 text-gray-900">
                                        Libele
                                    </th>
                                 </tr>

                            </thead>
                            <tbody>
                                <tr class="border-b-2 border-gray-100">
                                    <td class="text-sm font-medium text-gray-900 px-6 py-6">Libelle exemple</td>
                                    <td class="text-sm font-medium text-gray-900 px-6 py-6">Libelle exemple</td>
                                    <td class="text-sm font-medium text-gray-900 px-6 py-6">Libelle exemple</td>
                                    <td class="text-sm font-medium text-gray-900 px-6 py-6">Libelle exemple</td>                               
                                 </tr>

                                 <tr class="border-b-2 border-gray-100">
                                    <td class="text-sm font-medium text-gray-900 px-6 py-6">Libelle exemple</td>
                                    <td class="text-sm font-medium text-gray-900 px-6 py-6">Libelle exemple</td>
                                    <td class="text-sm font-medium text-gray-900 px-6 py-6">Libelle exemple</td>
                                    <td class="text-sm font-medium text-gray-900 px-6 py-6">Libelle exemple</td>                               
                                 </tr>
                            </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
</div>
