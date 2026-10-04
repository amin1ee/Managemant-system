@extends('layout.layout')

@section('title', 'Reorders')

@section('content')
    <div class="mx-auto max-w-7xl py-4 md:py-8">
        <header class="mb-6 rounded-3xl border border-slate-200 bg-white p-6 shadow-sm shadow-slate-200/60">
            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-amber-500">Procurement</p>
            <h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-900">Reorders</h1>
        </header>

        <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm shadow-slate-200/60">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200">
                    <thead class="bg-slate-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-[0.15em] text-slate-500">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-[0.15em] text-slate-500">Product</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-[0.15em] text-slate-500">Supplier</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-[0.15em] text-slate-500">Requested Quantity</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-[0.15em] text-slate-500">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-200 bg-white">
                        @forelse ($reorders as $reorder)
                            <tr class="transition hover:bg-slate-50">
                                <td class="px-6 py-4 text-sm font-medium text-slate-700">
                                    <span class="rounded-full px-2.5 py-1 text-[11px] font-semibold
                                        @if ($reorder->status == 'pending') bg-amber-100 text-amber-700
                                        @elseif ($reorder->status == 'ordered') bg-emerald-100 text-emerald-700
                                        @else bg-red-100 text-red-700
                                        @endif">
                                        {{ ucfirst($reorder->status) }}
                                    </span>
                                </td>

                                <td class="px-6 py-4 text-sm text-slate-700">{{ $reorder->product->name }}</td>
                                <td class="px-6 py-4 text-sm text-slate-700">{{ $reorder->product->supplier->company ?? 'N/A' }}</td>
                                <td class="px-6 py-4 text-sm text-slate-700">{{ $reorder->requested_quantity }}</td>

                                <td class="px-6 py-4">
                                    <div class="flex flex-wrap items-center gap-2">
                                        @if ($reorder->status == "pending")
                                            <form action="{{ route('reorders.invoice', $reorder) }}" method="GET">
                                                <button type="submit" class="rounded-xl bg-emerald-600 px-3 py-2 text-xs font-semibold text-white transition hover:bg-emerald-500">
                                                    Make Invoice
                                                </button>
                                            </form>
                                            <form action="{{ route('reorders.edit', $reorder) }}" method="get">
                                                <button type="submit" class="rounded-xl border border-blue-200 bg-blue-50 px-3 py-2 text-xs font-semibold text-blue-700 transition hover:bg-blue-100">
                                                    Edit
                                                </button>
                                            </form>
                                        @endif

                                        <form action="{{ route('reorders.destroy', $reorder) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="rounded-xl border border-red-200 bg-red-50 px-3 py-2 text-xs font-semibold text-red-700 transition hover:bg-red-100">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-8 text-center text-sm text-slate-500">No Reorders</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection