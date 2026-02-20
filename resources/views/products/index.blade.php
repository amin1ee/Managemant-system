@extends("layout.layout")

@section("title", __("Products"))

@section("content")
    <div class="container mx-auto px-4 py-6">

        <!-- Header -->
        <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Products</h1>
            @can("create", App\Models\Product::class)
                <a href="{{ route('products.create') }}"
                    class="inline-flex items-center gap-2 bg-green-600 text-white px-5 py-2.5 rounded-lg shadow hover:bg-green-700 transition">
                    + Add Product
                </a>
            @endcan
        </div>


        <!-- Filter -->
        <form method="GET" action="{{ url()->current() }}"
            class="bg-white p-4 rounded-xl shadow mb-8 flex flex-col sm:flex-row gap-4 items-end">
            <div class="flex flex-col w-full sm:w-64">
                <label for="category" class="mb-1 text-sm font-semibold text-gray-600">Category</label>
                <select name="category_id" id="category"
                    class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-green-500">
                    <option value="">All Categories</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-gray-700 text-white px-6 py-2 rounded-lg hover:bg-gray-800 transition">
                Filter
            </button>
        </form>

        <!-- Products Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($products as $product)
                <div class="bg-white rounded-2xl shadow hover:shadow-lg transition overflow-hidden">

                    <!-- Image -->
                    <div class="h-48 bg-gray-100 flex items-center justify-center">
                        @if($product->photo && file_exists(public_path('storage/' . $product->photo)))
                            <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->name }}"
                                class="object-cover h-full w-full">
                        @else
                            <span class="text-gray-400">No Image</span>
                        @endif
                    </div>

                    <!-- Content -->
                    <div class="p-5">
                        <h2 class="text-lg font-semibold text-gray-800 mb-2">{{ $product->name }}</h2>

                        <!-- Badges -->
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span
                                class="bg-blue-100 text-blue-700 text-xs px-3 py-1 rounded-full">{{ $product->category->name }}</span>
                            <span
                                class="bg-gray-100 text-green-700 text-xs px-3 py-1 rounded-full">${{ number_format($product->price, 2) }}</span>
                                 <span
                                class="bg-purple-100 text-gray-700 text-xs px-3 py-1 rounded-full">{{ $product->quantity }} Qnt</span>
                                
                            @php
    $status = $product->stockStatus();
                   @endphp

<span class="text-xs px-3 py-1 rounded-full font-semibold
    @if($status === 'in_stock') bg-green-100 text-green-700
    @elseif($status === 'low_stock') bg-yellow-100 text-yellow-700
    @else bg-red-100 text-red-700
    @endif
">
    {{ ucfirst(str_replace('_', ' ', $status))}} 
</span>
                            @if($product->available)
                                <span class="bg-emerald-100 text-emerald-700 text-xs px-3 py-1 rounded-full">Available</span>
                            @else
                                <span class="bg-red-100 text-red-700 text-xs px-3 py-1 rounded-full">Out of stock</span>
                            @endif
                        </div>

                        <!-- Actions -->
                        @can("create", App\Models\Product::class)
                            <div class="flex justify-between items-center mt-4">
                                <a href="{{ route('products.edit', $product->id) }}"
                                    class="text-sm bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                                    Edit
                                </a>

                                <form onsubmit="return confirm('Are you sure you want to delete this product?')"
                                    action="{{ route('products.destroy', $product->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-sm bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        @endcan
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-10">
            {{ $products->links() }}
        </div>
    </div>
@endsection