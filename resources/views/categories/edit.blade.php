@extends("layout.layout")

@section("title", __("Categories"))

@section("content")
<div class="mx-auto max-w-2xl py-8">
    <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm shadow-slate-200/70">
        <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-6 py-5">
            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-blue-100">Catalog</p>
            <h1 class="mt-2 text-2xl font-bold text-white">Edit Category</h1>
        </div>

        <form action="{{ route('categories.update', $category->id) }}" method="POST" class="space-y-6 p-6">
            @csrf
            @method('PUT')

            <div>
                <label class="mb-2 block text-sm font-semibold text-slate-700">Category Name</label>
                <input type="text"
                       name="name"
                       value="{{ old('name', $category->name) }}"
                       placeholder="Enter category name"
                       class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-800 outline-none transition focus:border-blue-400 focus:bg-white focus:ring-4 focus:ring-blue-100">
            </div>

            <div class="flex flex-col gap-3 pt-2 sm:flex-row">
                <a href="{{ route('categories.index') }}"
                   class="inline-flex flex-1 items-center justify-center rounded-2xl border border-slate-200 bg-slate-100 px-5 py-3 text-sm font-medium text-slate-700 transition hover:bg-slate-200">
                    Cancel
                </a>

                <button type="submit"
                        class="inline-flex flex-1 items-center justify-center rounded-2xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-blue-500/20 transition hover:bg-blue-500">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection