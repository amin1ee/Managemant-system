@extends("layout.layout")

@section("title", __("Edit Product"))

@section("content")
<div class="mx-auto max-w-3xl py-8">
    <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm shadow-slate-200/60">
        <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-6 py-5">
            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-blue-100">Inventory</p>
            <h1 class="mt-2 text-2xl font-bold text-white">Edit Product</h1>
        </div>

        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6 p-6">
            @csrf
            @method('PUT')

            <div>
                <label class="mb-2 block text-sm font-semibold text-slate-700">Product Name</label>
                <input type="text" name="name" value="{{ old('name', $product->name) }}" class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-800 outline-none transition focus:border-blue-400 focus:bg-white focus:ring-4 focus:ring-blue-100">
            </div>

            <div class="grid gap-4 md:grid-cols-2">
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Price</label>
                    <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}" class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-800 outline-none transition focus:border-blue-400 focus:bg-white focus:ring-4 focus:ring-blue-100">
                </div>

                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Quantity</label>
                    <input type="number" name="quantity" value="{{ old('quantity', $product->quantity) }}" class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-800 outline-none transition focus:border-blue-400 focus:bg-white focus:ring-4 focus:ring-blue-100">
                </div>
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-slate-700">Category</label>
                <select name="category_id" class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-800 outline-none transition focus:border-blue-400 focus:bg-white focus:ring-4 focus:ring-blue-100">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-center gap-3 rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3">
                <input type="checkbox" name="available" value="1" class="h-5 w-5 rounded border-slate-300 text-blue-600 focus:ring-blue-500" {{ old('available', $product->available) ? 'checked' : '' }}>
                <label class="text-sm font-medium text-slate-700">Available for sale</label>
            </div>

            @if ($product->photo)
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Current Image</label>
                    <img src="{{ asset('storage/' . $product->photo) }}" class="h-28 w-28 rounded-2xl object-cover shadow-md shadow-slate-200">
                </div>
            @endif

            <div>
                <label class="mb-2 block text-sm font-semibold text-slate-700">Change Image</label>
                <input type="file" name="photo" class="w-full rounded-2xl border border-dashed border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-600">
            </div>

            <div class="flex flex-col gap-3 pt-2 sm:flex-row">
                <button type="submit" class="inline-flex flex-1 items-center justify-center rounded-2xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-blue-500/20 transition hover:bg-blue-500">
                    Update
                </button>

                <a href="{{ route('products.index') }}" class="inline-flex flex-1 items-center justify-center rounded-2xl border border-slate-200 bg-slate-100 px-5 py-3 text-sm font-medium text-slate-700 transition hover:bg-slate-200">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection