@extends("layout.layout")

@section("title", __("Products"))

@section("content")
    <div class="container mx-auto px-2 py-4">
       <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Products</h1>
        <a href="{{ route('products.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Add Products
        </a>
    </div>
        <form method="GET" action="{{ url()->current() }}" class="flex justify-center my-6">
            <div class="flex flex-col">
                <label for="category" class="mb-2 font-semibold">Filter by Category</label>
                <select name="category_id" id="category" class="border rounded-xl border-gray-300 px-3 py-2">
                    <option value="">All Categories</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="ml-4 bg-gray-600 text-white px-4 py-2 rounded-xl mt-6">Filter</button>
        </form>

        <div class="grid grid-cols-6 gap-6 mt-8">
            @foreach ($products as $product)
                <div class="max-w-md  rounded overflow-hidden shadow-xl">
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2">{{ $product->name }}</div>
                        @if($product->photo && file_exists(public_path('storage/' . $product->photo)))
                            <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->name }}" class="w-32">
                        @else
                            <div class="h-18 bg-gray-100 flex items-center justify-center text-gray-400">
                                No Image
                            </div>
                        @endif
                    </div>
                    <div>
                        <div class="px-6 pt-4 pb-2">
                            <span
                                class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ $product->category->name }}</span>
                            <span
                                class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ number_format($product->price, 2) }}
                                $</span>
                            <span
                                class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ $product->quantity }}
                                Qt</span>
                            <span
                                class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ $product->available ? 'Available' : 'Out of stock' }}</span>
                        </div>
                        <!-- actions -->
                        <div class="flex justify-evenly">
                            <a href="{{ route("products.edit", $product->id) }}" class="bg-blue-500 rounded-full px-4">Edit</a>
                            <form onsubmit="return confirm('Are you sure you want to delete this product?')" action="{{ route("products.destroy", $product->id) }}" method="post">@csrf
                                @method('DELETE')<button class="bg-red-500 rounded-full px-4">Delete</button></form>
                        </div>
                    </div>
                </div>


            @endforeach

        </div>

    </div>
    <div class="">
        {{ $products->links() }}
    </div>

@endsection