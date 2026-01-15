@extends("layout.layout")

@section("title", __("Products"))

@section("content")
    <div class="bg-gray-100 shadow-xl rounded px-8 pt-6 pb-8 ">
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
        <form action="{{ route("products.store") }}" method="POST" class="" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col mt-4 ">
                <label for="name" class="">Name</label>
                <input type="text" name="name"
                    class="shadow appearance-none shadow-xl rounded w-1/3 py-2 px-3 text-gray-700 bg-gray-200 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="flex flex-col mt-4">
                <select name="category_id" id="category" class>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col mt-4">
                <label for="price">Price</label>
                <input type="number" name="price"
                    class="shadow appearance-none shadow-xl rounded w-1/3 py-2 px-3 text-gray-700 bg-gray-200 leading-tight focus:outline-none focus:shadow-outline"
                    id="price">
            </div>
            <div class="flex flex-col mt-4">
                <label for="quantity">Quantity</label>
                <input type="number"
                    class="shadow appearance-none shadow-xl rounded w-1/3 py-2 px-3 text-gray-700 bg-gray-200 leading-tight focus:outline-none focus:shadow-outline"
                    name="quantity" id="quantity">
            </div>
            <div class="flex mt-4">
                <label for="available">Available</label>
                <input type="checkbox" class="ml-4" name="available" id="available" value="1" @if(old('available')) checked
                @endif>
            </div>
            <div class="flex flex-col mt-4">
                <label for="price">Image</label>
                <input type="file" name="photo"
                    class="shadow appearance-none shadow-xl rounded w-1/3 py-2 px-3 text-gray-700 bg-gray-200 leading-tight focus:outline-none focus:shadow-outline"
                    id="photo" multiple>
            </div>
            <button class=" border-none rounded  w-1/8 mt-4 bg-green-600">Save</button>

        </form>
    </div>
@endsection