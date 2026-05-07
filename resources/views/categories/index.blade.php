@extends("layout.layout")

@section("title", __("Categories"))

@section("content")

<div class="max-w-7xl mx-auto px-4 py-8">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">

        <div>
            <h1 class="text-3xl font-bold text-gray-800">
                Categories
            </h1>

            <p class="text-gray-500 mt-1">
                Manage your product categories
            </p>
        </div>

        @can("create", App\Models\Category::class)
            <a href="{{ route('categories.create') }}"
               class="bg-green-600 hover:bg-green-700 text-white
                      px-5 py-3 rounded-xl font-medium shadow transition">

                + Add Category
            </a>
        @endcan

    </div>

    @if ($categories->isEmpty())

        <div class="bg-yellow-50 border border-yellow-200 text-yellow-700
                    rounded-2xl p-5 text-center">

            No categories available.

        </div>

    @else

        <!-- Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach ($categories as $category)

                <div class="bg-white rounded-2xl shadow-md hover:shadow-xl
                            transition p-6 flex items-center justify-between">

                    <!-- Name -->
                    <div>
                        <h2 class="text-lg font-semibold text-gray-800">
                            {{ $category->name }}
                        </h2>
                    </div>

                    <!-- Actions -->
                    @can("create", App\Models\Category::class)

                        <div class="flex gap-2">

                            <a href="{{ route('categories.edit', $category->id) }}"
                               class="bg-blue-600 hover:bg-blue-700 text-white
                                      px-4 py-2 rounded-xl text-sm transition">

                                Edit
                            </a>

                            <form action="{{ route('categories.destroy', $category->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Delete this category?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="bg-red-600 hover:bg-red-700 text-white
                                               px-4 py-2 rounded-xl text-sm transition">

                                    Delete
                                </button>

                            </form>

                        </div>

                    @endcan

                </div>

            @endforeach

        </div>

    @endif

</div>

@endsection