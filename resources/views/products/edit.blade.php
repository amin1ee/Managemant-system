@extends("layout.layout")

@section("title", __("Edit Product"))

@section("content")
    <div class="max-w-3xl mx-auto mt-10">

        <div class="bg-white shadow-xl rounded-2xl overflow-hidden">

            <!-- Header -->
            <div class="bg-blue-600 px-6 py-4">
                <h1 class="text-2xl font-bold text-white">
                    Edit Product
                </h1>
            </div>

            <form action="{{ route('products.update', $product->id) }}"
                  method="POST"
                  enctype="multipart/form-data"
                  class="p-6 space-y-5">

                @csrf
                @method('PUT')

                <!-- Name -->
                <div>
                    <label class="block mb-2 text-sm font-semibold text-gray-700">
                        Product Name
                    </label>

                    <input type="text"
                           name="name"
                           value="{{ old('name', $product->name) }}"
                           class="w-full border border-gray-300 rounded-xl px-4 py-3
                                  focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <!-- Price + Quantity -->
                <div class="grid grid-cols-2 gap-4">

                    <div>
                        <label class="block mb-2 text-sm font-semibold text-gray-700">
                            Price
                        </label>

                        <input type="number"
                               step="0.01"
                               name="price"
                               value="{{ old('price', $product->price) }}"
                               class="w-full border border-gray-300 rounded-xl px-4 py-3
                                      focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-semibold text-gray-700">
                            Quantity
                        </label>

                        <input type="number"
                               name="quantity"
                               value="{{ old('quantity', $product->quantity) }}"
                               class="w-full border border-gray-300 rounded-xl px-4 py-3
                                      focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </div>

                </div>

                <!-- Category -->
                <div>
                    <label class="block mb-2 text-sm font-semibold text-gray-700">
                        Category
                    </label>

                    <select name="category_id"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3
                                   focus:ring-2 focus:ring-blue-500 focus:outline-none">

                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach

                    </select>
                </div>

                <!-- Available -->
                <div class="flex items-center gap-3">

                    <input type="checkbox"
                           name="available"
                           value="1"
                           class="w-5 h-5"
                        {{ old('available', $product->available) ? 'checked' : '' }}>

                    <label class="text-sm font-medium text-gray-700">
                        Available for sale
                    </label>

                </div>

                <!-- Image -->
                @if($product->photo)
                    <div>
                        <label class="block mb-2 text-sm font-semibold text-gray-700">
                            Current Image
                        </label>

                        <img src="{{ asset('storage/' . $product->photo) }}"
                             class="w-28 h-28 object-cover rounded-xl shadow">
                    </div>
                @endif

                <!-- Upload -->
                <div>
                    <label class="block mb-2 text-sm font-semibold text-gray-700">
                        Change Image
                    </label>

                    <input type="file"
                           name="photo"
                           class="w-full border border-gray-300 rounded-xl px-4 py-3 bg-gray-50">
                </div>

                <!-- Buttons -->
                <div class="flex gap-3 pt-2">

                    <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white
                                   px-6 py-3 rounded-xl font-medium transition">
                        Update
                    </button>

                    <a href="{{ route('products.index') }}"
                       class="bg-gray-200 hover:bg-gray-300 text-gray-700
                              px-6 py-3 rounded-xl font-medium transition">
                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </div>
@endsection