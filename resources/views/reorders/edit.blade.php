@extends('layout.layout')

@section('title', 'Edit Reorder')

@section('content')
<div class="mx-auto max-w-2xl py-8">
    <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm shadow-slate-200/60">
        <div class="bg-gradient-to-r from-amber-500 to-orange-500 px-6 py-5">
            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-amber-100">Procurement</p>
            <h1 class="mt-2 text-2xl font-bold text-white">Edit Reorder</h1>
        </div>

        <form action="{{ route('reorders.update', $reorder) }}" method="POST" class="space-y-5 p-6">
            @csrf
            @method('PUT')

            <div>
                <label class="mb-2 block text-sm font-semibold text-slate-700">Product</label>
                <input type="text" value="{{ $reorder->product->name }}" disabled class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-600">
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-slate-700">Requested Quantity</label>
                <input type="number" name="requested_quantity" value="{{ $reorder->requested_quantity }}" class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-800 outline-none transition focus:border-amber-400 focus:bg-white focus:ring-4 focus:ring-amber-100">
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold text-slate-700">Status</label>
                <select name="status" class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-800 outline-none transition focus:border-amber-400 focus:bg-white focus:ring-4 focus:ring-amber-100">
                    <option value="pending" {{ $reorder->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="ordered" {{ $reorder->status == 'ordered' ? 'selected' : '' }}>Ordered</option>
                    <option value="cancelled" {{ $reorder->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
            </div>

            <div class="flex flex-col gap-3 pt-2 sm:flex-row">
                <button type="submit" class="inline-flex flex-1 items-center justify-center rounded-2xl bg-amber-600 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-amber-500/20 transition hover:bg-amber-500">
                    Update Reorder
                </button>

                <a href="{{ route('reorders.index') }}" class="inline-flex flex-1 items-center justify-center rounded-2xl border border-slate-200 bg-slate-100 px-5 py-3 text-sm font-medium text-slate-700 transition hover:bg-slate-200">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection