@extends("layout.layout")

@section("title", __("Products"))

@section("content")
<div class="mx-auto max-w-3xl py-8">
    <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm shadow-slate-200/60">
        <div class="bg-gradient-to-r from-emerald-600 to-teal-600 px-6 py-5">
            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-emerald-100">Inventory</p>
            <h2 class="mt-2 text-2xl font-bold text-white">Add New Product</h2>
        </div>

        <div class="p-6">
            @if ($errors->any())
                <div class="mb-5 rounded-2xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                    <ul class="list-disc space-y-1 pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf

                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Product Name</label>
                    <input type="text"
                           name="name"
                           value="{{ old('name') }}"
                           placeholder="Enter product name"
                           class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-800 outline-none transition focus:border-emerald-400 focus:bg-white focus:ring-4 focus:ring-emerald-100">
                </div>

                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Category</label>
                    <select name="category_id"
                            class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-800 outline-none transition focus:border-emerald-400 focus:bg-white focus:ring-4 focus:ring-emerald-100">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="grid gap-4 md:grid-cols-2">
                    <div>
                        <label class="mb-2 block text-sm font-semibold text-slate-700">Price</label>
                        <input type="number"
                               step="0.01"
                               name="price"
                               value="{{ old('price') }}"
                               placeholder="0.00"
                               class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-800 outline-none transition focus:border-emerald-400 focus:bg-white focus:ring-4 focus:ring-emerald-100">
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-semibold text-slate-700">Quantity</label>
                        <input type="number"
                               name="quantity"
                               value="{{ old('quantity') }}"
                               placeholder="0"
                               class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-800 outline-none transition focus:border-emerald-400 focus:bg-white focus:ring-4 focus:ring-emerald-100">
                    </div>
                </div>

                <div class="flex items-center gap-3 rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3">
                    <input type="checkbox" name="available" value="1" class="h-5 w-5 rounded border-slate-300 text-emerald-600 focus:ring-emerald-500" {{ old('available') ? 'checked' : '' }}>
                    <label class="text-sm font-medium text-slate-700">Available in stock</label>
                </div>

                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Product Image</label>
                    <input type="file" name="photo" class="w-full rounded-2xl border border-dashed border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-600">
                </div>

                <div class="flex flex-col gap-3 pt-2 sm:flex-row">
                    <a href="{{ route('products.index') }}" class="inline-flex flex-1 items-center justify-center rounded-2xl border border-slate-200 bg-slate-100 px-5 py-3 text-sm font-medium text-slate-700 transition hover:bg-slate-200">
                        Cancel
                    </a>

                    <button type="submit" class="inline-flex flex-1 items-center justify-center rounded-2xl bg-emerald-600 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-emerald-500/20 transition hover:bg-emerald-500">
                        Save Product
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection