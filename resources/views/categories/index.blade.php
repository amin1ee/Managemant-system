@extends("layout.layout")

@section("title", __("Categories"))

@section("content")
<div class="min-h-screen bg-slate-100">
    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
        <header class="mb-8 flex flex-col gap-4 rounded-[28px] border border-slate-200 bg-white p-6 shadow-sm shadow-slate-200/70 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.18em] text-indigo-500">Catalog</p>
                <h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-900">Categories</h1>
                <p class="mt-1 text-sm text-slate-500">Manage your product categories</p>
            </div>

            @can("create", App\Models\Category::class)
                <a href="{{ route('categories.create') }}"
                   class="inline-flex items-center justify-center rounded-2xl bg-indigo-600 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-500/20 transition hover:bg-indigo-500">
                    + Add Category
                </a>
            @endcan
        </header>

        @if ($categories->isEmpty())
            <div class="rounded-3xl border border-amber-200 bg-amber-50 px-6 py-5 text-center text-sm font-medium text-amber-700 shadow-sm">
                No categories available.
            </div>
        @else
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3">
                @foreach ($categories as $category)
                    <article class="group rounded-3xl border border-slate-200 bg-white p-6 shadow-sm shadow-slate-200/60 transition duration-200 hover:-translate-y-1 hover:shadow-lg">
                        <div class="flex items-start justify-between gap-4">
                            <div class="flex items-center gap-4">
                                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-indigo-100 text-xl text-indigo-600 shadow-inner shadow-indigo-100">
                                    🗂️
                                </div>
                                <div>
                                    <p class="text-xs font-medium uppercase tracking-[0.14em] text-slate-400">Category</p>
                                    <h2 class="mt-2 text-xl font-semibold text-slate-900">{{ $category->name }}</h2>
                                </div>
                            </div>
                        </div>

                        @can("create", App\Models\Category::class)
                            <div class="mt-6 flex items-center gap-2">
                                <a href="{{ route('categories.edit', $category->id) }}"
                                   class="inline-flex flex-1 items-center justify-center rounded-xl border border-blue-200 bg-blue-50 px-4 py-2.5 text-sm font-medium text-blue-700 transition hover:bg-blue-100">
                                    Edit
                                </a>

                                <form action="{{ route('categories.destroy', $category->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Delete this category?')"
                                      class="flex-1">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="w-full rounded-xl border border-red-200 bg-red-50 px-4 py-2.5 text-sm font-medium text-red-700 transition hover:bg-red-100">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        @endcan
                    </article>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection