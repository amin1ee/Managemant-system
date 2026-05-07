@extends("layout.layout")

@section("title", __("Categories"))

@section("content")

<div class="max-w-xl mx-auto mt-10">

    <div class="bg-white rounded-2xl shadow-xl overflow-hidden">

        <!-- Header -->
        <div class="bg-blue-600 px-6 py-4">
            <h1 class="text-2xl font-bold text-white">
                Edit Category
            </h1>
        </div>

        <!-- Form -->
        <form action="{{ route('categories.update', $category->id) }}"
              method="POST"
              class="p-6 space-y-5">

            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Category Name
                </label>

                <input type="text"
                       name="name"
                       value="{{ old('name', $category->name) }}"
                       placeholder="Enter category name"
                       class="w-full border border-gray-300 rounded-xl px-4 py-3
                              focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <!-- Buttons -->
            <div class="flex gap-3 pt-2">

                <a href="{{ route('categories.index') }}"
                   class="px-6 py-3 rounded-xl bg-gray-200 hover:bg-gray-300
                          text-gray-700 font-medium transition">
                    Cancel
                </a>

                <button type="submit"
                        class="px-6 py-3 rounded-xl bg-blue-600 hover:bg-blue-700
                               text-white font-medium shadow transition">
                    Update
                </button>

            </div>

        </form>

    </div>

</div>

@endsection