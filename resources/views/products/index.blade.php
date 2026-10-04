@extends("layout.layout")

@section("title", __("Products"))

@section("content")
<div class="mx-auto max-w-7xl py-4 md:py-8">
    <header class="mb-8 flex flex-col gap-4 rounded-3xl border border-slate-200 bg-white p-6 shadow-sm shadow-slate-200/60 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-emerald-500">Inventory</p>
            <h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-900">Products</h1>
        </div>

        @can("create", App\Models\Product::class)
            <a href="{{ route('products.create') }}"
               class="inline-flex items-center justify-center rounded-2xl bg-emerald-600 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-emerald-500/20 transition hover:bg-emerald-500">
                + Add Product
            </a>
        @endcan
    </header>

    <form method="GET" action="{{ url()->current() }}"
          class="mb-8 flex flex-wrap items-end gap-4 rounded-3xl border border-slate-200 bg-white p-4 shadow-sm shadow-slate-200/60">
        <div class="flex flex-col gap-1">
            <label class="text-xs font-semibold uppercase tracking-[0.15em] text-slate-500">Category</label>
            <select name="category_id" class="min-w-[170px] rounded-2xl border border-slate-200 bg-slate-50 px-3 py-2.5 text-sm text-slate-700 outline-none transition focus:border-emerald-400 focus:bg-white focus:ring-4 focus:ring-emerald-100">
                <option value="">All Categories</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex flex-col gap-1">
            <label class="text-xs font-semibold uppercase tracking-[0.15em] text-slate-500">Search</label>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Product name…"
                   class="min-w-[190px] rounded-2xl border border-slate-200 bg-slate-50 px-3 py-2.5 text-sm text-slate-700 outline-none transition focus:border-emerald-400 focus:bg-white focus:ring-4 focus:ring-emerald-100">
        </div>

        <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-2xl bg-slate-900 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-slate-800">
            <span class="material-symbols-outlined text-base">filter_list</span>
            Filter
        </button>
    </form>

    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 xl:grid-cols-4">
        @foreach ($products as $product)
            <article class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm shadow-slate-200/50 transition duration-200 hover:-translate-y-1 hover:shadow-lg">
                <div class="flex h-48 items-center justify-center bg-gradient-to-br from-slate-100 to-slate-200">
                    @if ($product->photo && file_exists(public_path('storage/' . $product->photo)))
                        <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->name }}" class="h-full w-full object-cover">
                    @else
                        <span class="text-sm font-medium text-slate-400">No Image</span>
                    @endif
                </div>

                <div class="p-5">
                    <h2 class="text-lg font-semibold text-slate-900">{{ $product->name }}</h2>

                    <div class="mt-4 flex flex-wrap gap-2">
                        <span class="rounded-full bg-indigo-100 px-2.5 py-1 text-[11px] font-semibold text-indigo-700">{{ $product->category->name }}</span>
                        <span class="rounded-full bg-emerald-100 px-2.5 py-1 text-[11px] font-semibold text-emerald-700">${{ number_format($product->price, 2) }}</span>
                        <span class="rounded-full bg-violet-100 px-2.5 py-1 text-[11px] font-semibold text-violet-700">{{ $product->quantity }} Qty</span>

                        @php $status = $product->stockStatus(); @endphp
                        <span class="rounded-full px-2.5 py-1 text-[11px] font-semibold
                            @if ($status === 'in_stock') bg-green-100 text-green-700
                            @elseif ($status === 'low_stock') bg-yellow-100 text-yellow-700
                            @else bg-red-100 text-red-700
                            @endif">
                            {{ ucfirst(str_replace('_', ' ', $status)) }}
                        </span>

                        @if ($product->available)
                            <span class="rounded-full bg-emerald-100 px-2.5 py-1 text-[11px] font-semibold text-emerald-700">Available</span>
                        @else
                            <span class="rounded-full bg-red-100 px-2.5 py-1 text-[11px] font-semibold text-red-700">Out of stock</span>
                        @endif
                    </div>

                    @can("create", App\Models\Product::class)
                        <div class="mt-5 flex items-center justify-between gap-2">
                            <a href="{{ route('products.edit', $product->id) }}"
                               class="inline-flex flex-1 items-center justify-center rounded-xl border border-blue-200 bg-blue-50 px-3 py-2 text-sm font-medium text-blue-700 transition hover:bg-blue-100">
                                Edit
                            </a>

                            <form onsubmit="return confirm('Are you sure you want to delete this product?')"
                                  action="{{ route('products.destroy', $product->id) }}" method="post" class="flex-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="w-full rounded-xl border border-red-200 bg-red-50 px-3 py-2 text-sm font-medium text-red-700 transition hover:bg-red-100">
                                    Delete
                                </button>
                            </form>
                        </div>
                    @endcan
                </div>
            </article>
        @endforeach
    </div>

    <div class="mt-8">
        {{ $products->links() }}
    </div>
</div>
@endsection