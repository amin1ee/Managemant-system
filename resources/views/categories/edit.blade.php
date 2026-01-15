@extends("layout.layout")

@section("title", __("Categories"))

@section("content")
    <div class="bg-gray-100 shadow-xl rounded px-8 pt-6 pb-8">
        <form action="{{ route("categories.update",$category->id) }}" method="POST" class="flex flex-col">
            @csrf
            @method('PUT')
            <label for="">Name</label>
            <input type="text" name="name"
                class="shadow appearance-none border rounded w-1/3 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('name', $category->name) }}">
            <button class=" border-none rounded  w-1/8 mt-4 bg-green-600">Save</button>

        </form>
    </div>
@endsection