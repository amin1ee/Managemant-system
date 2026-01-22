@extends("layout.layout")

@section("title", __("Categories"))

@section("content")
<div class="container mx-auto px-4 py-6">

    <!-- Header -->
    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Categories</h1>
        @can("create", App\Models\Category::class)
        <a href="{{ route('categories.create') }}"
           class="inline-flex items-center gap-2 bg-green-600 text-white px-5 py-2.5 rounded-lg shadow hover:bg-green-700 transition">
            + Add Category
        </a>
        @endcan
    </div>

    @if($categories->isEmpty())
        <div class="bg-yellow-50 border border-yellow-200 text-yellow-700 p-4 rounded-lg">
            No categories available.
        </div>
    @else
        <!-- Categories Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($categories as $category)
            <div class="bg-white rounded-2xl shadow hover:shadow-lg transition p-5 flex justify-between items-center">

                <!-- Category Name -->
                <div>
                    <h2 class="text-lg font-semibold text-gray-800">{{ $category->name }}</h2>
                </div>

                <!-- Actions -->
                @can("create", App\Models\Category::class)
                <div class="flex gap-2">
                    <a href="{{ route('categories.edit', $category->id) }}"
                       class="text-sm bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                        Edit
                    </a>

                    <form onsubmit="return confirm('Are you sure you want to delete this category?')"
                          action="{{ route('categories.destroy', $category->id) }}" method="post">
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
            @endforeach
        </div>
    @endif
</div>
@endsection
