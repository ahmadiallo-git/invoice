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
                            <h3 class="flex-1 mt-4 ml-4 text-lg font-semibold">Category</h3>
                            <a href="{{ route('category.create') }}" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mx-4 mb-3">
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
                                @foreach($categories as $category)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap">{{ $category->id }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap">{{ $category->name }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap">{{ $category->slug }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap">
                                            <a href="{{ route('category.edit', $category->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                                            <form action="{{ route('category.destroy', $category->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:underline ml-2">Delete</button>
                                                {{-- <button type="submit" class="text-red-500 hover:text-red-700 ml-2">Delete</button> --}}
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            
                        </table>
                        <div class="mt-4">
                            {{ $categories->links() }}
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
