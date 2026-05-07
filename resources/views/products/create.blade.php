@extends("layout.layout")

@section("title", __("Products"))

@section("content")

<div class="max-w-3xl mx-auto mt-10">

    <div class="bg-white rounded-2xl shadow-xl overflow-hidden">

        <!-- Header -->
        <div class="bg-green-600 px-6 py-4">
            <h2 class="text-2xl font-bold text-white">
                Add New Product
            </h2>
        </div>

        <div class="p-6">

            @if ($errors->any())
                <div class="mb-5 bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-xl">
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('products.store') }}"
                  method="POST"
                  enctype="multipart/form-data"
                  class="space-y-5">

                @csrf

                <!-- Product Name -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Product Name
                    </label>

                    <input type="text"
                           name="name"
                           value="{{ old('name') }}"
                           placeholder="Enter product name"
                           class="w-full border border-gray-300 rounded-xl px-4 py-3
                                  focus:ring-2 focus:ring-green-500 focus:outline-none">
                </div>

                <!-- Category -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Category
                    </label>

                    <select name="category_id"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3
                                   focus:ring-2 focus:ring-green-500 focus:outline-none">

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                        @endforeach

                    </select>
                </div>

                <!-- Price & Quantity -->
                <div class="grid grid-cols-2 gap-4">

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Price
                        </label>

                        <input type="number"
                               step="0.01"
                               name="price"
                               value="{{ old('price') }}"
                               placeholder="0.00"
                               class="w-full border border-gray-300 rounded-xl px-4 py-3
                                      focus:ring-2 focus:ring-green-500 focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Quantity
                        </label>

                        <input type="number"
                               name="quantity"
                               value="{{ old('quantity') }}"
                               placeholder="0"
                               class="w-full border border-gray-300 rounded-xl px-4 py-3
                                      focus:ring-2 focus:ring-green-500 focus:outline-none">
                    </div>

                </div>

                <!-- Available -->
                <div class="flex items-center gap-3">

                    <input type="checkbox"
                           name="available"
                           value="1"
                           class="w-5 h-5 text-green-600 rounded"
                        {{ old('available') ? 'checked' : '' }}>

                    <label class="text-sm font-medium text-gray-700">
                        Available in stock
                    </label>

                </div>

                <!-- Image -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Product Image
                    </label>

                    <input type="file"
                           name="photo"
                           class="w-full border border-gray-300 rounded-xl px-4 py-3 bg-gray-50">
                </div>

                <!-- Buttons -->
                <div class="flex gap-3 pt-2">

                    <a href="{{ route('products.index') }}"
                       class="px-6 py-3 rounded-xl bg-gray-200 hover:bg-gray-300
                              text-gray-700 font-medium transition">
                        Cancel
                    </a>

                    <button type="submit"
                            class="px-6 py-3 rounded-xl bg-green-600 hover:bg-green-700
                                   text-white font-medium shadow transition">
                        Save Product
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection