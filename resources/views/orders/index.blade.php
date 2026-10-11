@extends("layout.layout")

@section("title", __("Orders"))

@section("content")
<div class="mx-auto max-w-7xl py-4 md:py-8">
    <header class="mb-8 rounded-3xl border border-slate-200 bg-white p-6 shadow-sm shadow-slate-200/60">
        <p class="text-xs font-semibold uppercase tracking-[0.18em] text-indigo-500">Fulfillment</p>
        <h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-900">Orders</h1>
        <p class="mt-1 text-sm text-slate-500">View customer details and products for each order.</p>
    </header>

    <div class="space-y-5">
        @forelse ($orders as $order)
            <article class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm shadow-slate-200/60">
                <div class="flex flex-col gap-4 border-b border-slate-100 bg-slate-50 px-6 py-5 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-[0.15em] text-slate-400">Order #{{ $order->id }}</p>
                        <h2 class="mt-1 text-lg font-semibold text-slate-900">{{ $order->name }}</h2>
                    </div>
                    <span class="inline-flex w-fit rounded-full bg-indigo-100 px-3 py-1 text-xs font-semibold capitalize text-indigo-700">
                        {{ $order->status }}
                    </span>
                </div>

                <div class="grid gap-6 px-6 py-5 md:grid-cols-2">
                    <section>
                        <h3 class="text-sm font-semibold text-slate-800">Customer details</h3>
                        <dl class="mt-3 space-y-2 text-sm">
                            <div class="flex gap-2">
                                <dt class="font-medium text-slate-500">Telefon:</dt>
                                <dd class="text-slate-700">{{ $order->telefon }}</dd>
                            </div>
                            <div class="flex gap-2">
                                <dt class="font-medium text-slate-500">Email:</dt>
                                <dd class="break-all text-slate-700">{{ $order->email }}</dd>
                            </div>
                            <div class="flex gap-2">
                                <dt class="font-medium text-slate-500">Address:</dt>
                                <dd class="text-slate-700">{{ $order->adress }}</dd>
                            </div>
                            <div class="flex gap-2">
                                <dt class="font-medium text-slate-500">Coordinates:</dt>
                                <dd class="text-slate-700">{{ $order->latitude }}, {{ $order->longitude }}</dd>
                            </div>
                        </dl>
                    </section>

                    <section>
                        <h3 class="text-sm font-semibold text-slate-800">Products</h3>
                        @if ($order->orderDetails->isEmpty())
                            <p class="mt-3 text-sm text-slate-500">No products on this order.</p>
                        @else
                            <ul class="mt-3 space-y-2">
                                @foreach ($order->orderDetails as $detail)
                                    <li class="flex items-center justify-between gap-3 rounded-xl bg-slate-50 px-4 py-3 text-sm">
                                        <span class="font-medium text-slate-700">{{ $detail->product?->name ?? 'Product unavailable' }}</span>
                                        <span class="shrink-0 text-slate-500">#{{ $detail->product_id }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </section>
                </div>
            </article>
        @empty
            <div class="rounded-3xl border border-amber-200 bg-amber-50 px-6 py-8 text-center text-sm font-medium text-amber-700">
                No orders found.
            </div>
        @endforelse
    </div>

    <div class="mt-8">
        {{ $orders->links() }}
    </div>
</div>
@endsection
