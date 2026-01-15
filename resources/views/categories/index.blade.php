@extends("layout.layout")

@section("title", __("Categories"))

@section("content")
<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Categories</h1>
        <a href="{{ route('categories.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Add Category
        </a>
    </div>

    @if($categories->isEmpty())
        <p class="text-gray-500">No categories available.</p>
    @else
        <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($categories as $category)
                <div class="bg-white rounded shadow p-4 flex justify-between items-center">
                    <span class="font-semibold">{{ $category->name }}</span>
                      <div class="flex justify-evenly">
                            <a href="{{ route("categories.edit", $category->id) }}" class="bg-blue-500 rounded-full px-4">Edit</a>
                            <form onsubmit="return confirm('Are you sure you want to delete this category?')" action="{{ route("categories.destroy", $category->id) }}" method="post">@csrf
                                @method('DELETE')<button class="bg-red-500 rounded-full px-4" >Delete</button></form>
                        </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
