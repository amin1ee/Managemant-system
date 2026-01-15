@extends("layout.layout")

@section("title", __("Edit Product"))

@section("content")
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-8 mt-8">
        <h1 class="text-2xl font-bold mb-6">Edit Product</h1>

        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data"
              class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block font-medium mb-1">Product Name</label>
                <input type="text" name="name"
                       value="{{ old('name', $product->name) }}"
                       class="w-full border rounded px-4 py-2 focus:outline-none focus:ring">
            </div>

            <div>
                <label class="block font-medium mb-1">Price ($)</label>
                <input type="number" step="0.01" name="price"
                       value="{{ old('price', $product->price) }}"
                       class="w-full border rounded px-4 py-2">
            </div>

            <div>
                <label class="block font-medium mb-1">Quantity</label>
                <input type="number" name="quantity"
                       value="{{ old('quantity', $product->quantity) }}"
                       class="w-full border rounded px-4 py-2">
            </div>

            <div>
                <label class="block font-medium mb-1">Category</label>
                <select name="category_id" class="w-full border rounded px-4 py-2">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-center gap-3">
                <input type="checkbox" name="available" value="1"
                       {{ old('available', $product->available) ? 'checked' : '' }}>
                <label class="font-medium">Available for sale</label>
            </div>

            @if($product->photo)
                <div>
                    <p class="font-medium mb-2">Current Image</p>
                    <img src="{{ asset('storage/' . $product->photo) }}" class="w-32 rounded">
                </div>
            @endif

            <div>
                <label class="block font-medium mb-1">Change Image</label>
                <input type="file" name="photo" class="w-full">
            </div>

            <div class="flex gap-4">
                <button type="submit"
                        class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                    Update Product
                </button>

                <a href="{{ route('products.index') }}"
                   class="bg-gray-200 px-6 py-2 rounded hover:bg-gray-300">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
