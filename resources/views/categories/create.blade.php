@extends("layout.layout")

@section("title", __("Create Category"))

@section("content")
<div class="mx-auto max-w-2xl py-8">
    <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm shadow-slate-200/70">
        <div class="bg-gradient-to-r from-indigo-600 to-blue-600 px-6 py-5">
            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-indigo-100">Catalog</p>
            <h1 class="mt-2 text-2xl font-bold text-white">Create Category</h1>
        </div>

        <form action="{{ route('categories.store') }}" method="POST" class="space-y-6 p-6">
            @csrf

            <div>
                <label class="mb-2 block text-sm font-semibold text-slate-700">Category Name</label>
                <input type="text"
                       name="name"
                       placeholder="Enter category name"
                       class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-800 outline-none transition focus:border-indigo-400 focus:bg-white focus:ring-4 focus:ring-indigo-100">
            </div>

            <div class="flex flex-col gap-3 pt-2 sm:flex-row">
                <a href="{{ route('categories.index') }}"
                   class="inline-flex flex-1 items-center justify-center rounded-2xl border border-slate-200 bg-slate-100 px-5 py-3 text-sm font-medium text-slate-700 transition hover:bg-slate-200">
                    Cancel
                </a>

                <button type="submit"
                        class="inline-flex flex-1 items-center justify-center rounded-2xl bg-indigo-600 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-500/20 transition hover:bg-indigo-500">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>
@endsection