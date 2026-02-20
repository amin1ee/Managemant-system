@extends("layout.layout")

@section("title", __("Products"))

@section("content")
<div class="max-w-4xl mx-auto bg-white shadow-xl rounded-lg p-8">

    <h2 class="text-2xl font-semibold text-gray-800 mb-6">
        Add New Product
    </h2>

    @if ($errors->any())
        <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Product Name</label>
            <input type="text" name="name" value="{{ old('name') }}"
                class="w-full rounded-md border-gray-300 bg-gray-100 shadow-sm focus:border-green-500 focus:ring-green-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
            <select name="category_id"
                class="w-full rounded-md border-gray-300 bg-gray-100 shadow-sm focus:border-green-500 focus:ring-green-500">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Price</label>
                <input type="number" step="0.01" name="price" value="{{ old('price') }}"
                    class="w-full rounded-md border-gray-300 bg-gray-100 shadow-sm focus:border-green-500 focus:ring-green-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Quantity</label>
                <input type="number" name="quantity" value="{{ old('quantity') }}"
                    class="w-full rounded-md border-gray-300 bg-gray-100 shadow-sm focus:border-green-500 focus:ring-green-500">
            </div>
        </div>

        <div class="flex items-center">
            <input type="checkbox" name="available" value="1"
                class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded"
                {{ old('available') ? 'checked' : '' }}>
            <label class="ml-2 text-sm text-gray-700">Available in stock</label>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Product Image</label>
            <input type="file" name="photo"
                class="w-full rounded-md border-gray-300 bg-gray-100 shadow-sm">
        </div>

        <div class="flex justify-end space-x-4">
            <a href="{{ route('products.index') }}"
                class="px-6 py-2 rounded-md bg-gray-200 text-gray-700 hover:bg-gray-300">
                Cancel
            </a>

            <button type="submit"
                class="px-6 py-2 rounded-md bg-green-600 text-white hover:bg-green-700 shadow">
                Save Product
            </button>
        </div>
    </form>
</div>
@endsection