@extends('layout.layout')

@section('title', 'StockPilot  | Smarter Inventory Management')

@section('content')
    <div class="mx-auto max-w-7xl py-2 sm:py-6">
        <header class="sticky top-3 z-20 mb-8 flex items-center justify-between rounded-3xl border border-slate-200/80 bg-white/90 px-4 py-3 shadow-lg shadow-slate-900/5 backdrop-blur-xl sm:px-7 sm:py-4">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <span class="flex h-10 w-10 items-center justify-center rounded-2xl bg-linear-to-br from-indigo-600 to-blue-500 text-white shadow-lg shadow-indigo-500/25 sm:h-11 sm:w-11">
                    <span class="material-symbols-outlined">inventory_2</span>
                </span>
                <span>
                    <span class="block text-base font-bold tracking-tight text-slate-900">StockPilot </span>
                    <span class="block text-xs text-slate-500">Inventory, made simple</span>
                </span>
            </a>

            <nav aria-label="Main navigation" class="flex items-center gap-1 sm:gap-3">
                <a href="#platform" class="hidden rounded-xl px-3 py-2 text-sm font-medium text-slate-600 transition hover:bg-slate-100 hover:text-slate-900 md:inline-flex">
                    Platform
                </a>
                <a href="#features" class="hidden rounded-xl px-3 py-2 text-sm font-medium text-slate-600 transition hover:bg-slate-100 hover:text-slate-900 sm:inline-flex">
                    Features
                </a>
                @guest
                    <a href="{{ route('login') }}" class="inline-flex items-center gap-1.5 rounded-xl bg-slate-900 px-3 py-2.5 text-xs font-semibold text-white transition hover:bg-slate-700 sm:gap-2 sm:px-4 sm:text-sm">
                        Staff sign in
                        <span class="material-symbols-outlined text-base">arrow_forward</span>
                    </a>
                @endguest
            </nav>
        </header>

        <main>
            <section id="platform" class="relative scroll-mt-28 overflow-hidden rounded-4xl bg-linear-to-br from-slate-950 via-indigo-950 to-blue-800 px-6 py-12 shadow-2xl shadow-indigo-950/20 sm:px-10 sm:py-16 lg:px-14">
                <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(129,140,248,0.3),transparent_34%),radial-gradient(circle_at_bottom_left,rgba(34,211,238,0.18),transparent_35%)]"></div>
                <div class="relative grid items-center gap-10 lg:grid-cols-[1.1fr_0.9fr]">
                    <div>
                        <span class="inline-flex items-center gap-2 rounded-full border border-indigo-300/20 bg-white/10 px-3 py-1.5 text-xs font-semibold text-indigo-100 backdrop-blur">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                            Inventory management for growing teams
                        </span>
                        <h1 class="mt-6 max-w-2xl text-4xl font-bold leading-tight tracking-tight text-white sm:text-5xl lg:text-6xl">
                            Know your stock. <span class="text-indigo-300">Run your business</span> with confidence.
                        </h1>
                        <p class="mt-5 max-w-xl text-base leading-7 text-indigo-100 sm:text-lg">
                            Keep products, categories, suppliers, and reorders in one clear workspace. Spend less time chasing stock and more time moving your business forward.
                        </p>
                        <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                            @guest
                                <a href="{{ route('login') }}" class="inline-flex items-center justify-center gap-2 rounded-2xl bg-white px-5 py-3.5 text-sm font-semibold text-indigo-950 shadow-lg transition hover:bg-indigo-50">
                                    Get started
                                    <span class="material-symbols-outlined text-lg">arrow_forward</span>
                                </a>
                            @endguest
                            <a href="#features" class="inline-flex items-center justify-center rounded-2xl border border-white/20 bg-white/5 px-5 py-3.5 text-sm font-semibold text-white transition hover:bg-white/10">
                                Explore features
                            </a>
                        </div>
                        <p class="mt-5 text-xs text-indigo-200">A clearer view of your inventory, from one simple workspace.</p>
                    </div>

                    <div class="relative mx-auto w-full max-w-lg">
                        <div class="absolute -inset-4 rounded-[30px] bg-indigo-400/20 blur-2xl"></div>
                        <div class="relative rounded-3xl border border-white/15 bg-slate-900/70 p-4 shadow-2xl backdrop-blur-xl sm:p-5">
                            <div class="flex items-center justify-between border-b border-white/10 pb-4">
                                <div>
                                    <p class="text-xs font-medium text-indigo-200">WORKSPACE OVERVIEW</p>
                                    <p class="mt-1 text-lg font-semibold text-white">Inventory at a glance</p>
                                </div>
                                <span class="material-symbols-outlined rounded-xl bg-emerald-400/10 p-2 text-emerald-300">insights</span>
                            </div>

                            <div class="mt-4 grid grid-cols-2 gap-3">
                                <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                                    <span class="material-symbols-outlined text-indigo-300">inventory_2</span>
                                    <p class="mt-4 text-xs text-slate-400">Product catalog</p>
                                    <p class="mt-1 text-sm font-semibold text-white">Organized in one place</p>
                                </div>
                                <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                                    <span class="material-symbols-outlined text-amber-300">warning</span>
                                    <p class="mt-4 text-xs text-slate-400">Stock awareness</p>
                                    <p class="mt-1 text-sm font-semibold text-white">Spot low stock sooner</p>
                                </div>
                                <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                                    <span class="material-symbols-outlined text-cyan-300">local_shipping</span>
                                    <p class="mt-4 text-xs text-slate-400">Suppliers</p>
                                    <p class="mt-1 text-sm font-semibold text-white">Keep partners close</p>
                                </div>
                                <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                                    <span class="material-symbols-outlined text-emerald-300">autorenew</span>
                                    <p class="mt-4 text-xs text-slate-400">Reorders</p>
                                    <p class="mt-1 text-sm font-semibold text-white">Stay ahead of demand</p>
                                </div>
                            </div>

                            <div class="mt-3 flex items-center gap-3 rounded-2xl border border-indigo-300/15 bg-indigo-400/10 p-4">
                                <span class="material-symbols-outlined text-indigo-200">visibility</span>
                                <p class="text-sm leading-5 text-indigo-100">A simple overview helps your team make informed inventory decisions.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="features" class="scroll-mt-28 py-14 sm:py-20">
                <div class="mx-auto max-w-2xl text-center">
                    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-indigo-600">Everything in sync</p>
                    <h2 class="mt-3 text-3xl font-bold tracking-tight text-slate-950 sm:text-4xl">The tools to stay in control</h2>
                    <p class="mt-4 text-base leading-7 text-slate-600">
                        From the first product entry to the next supplier reorder, keep the important details connected.
                    </p>
                </div>

                <div class="mt-9 grid gap-5 sm:grid-cols-2 xl:grid-cols-4">
                    <article class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm shadow-slate-200/50 transition hover:-translate-y-1 hover:shadow-lg">
                        <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-indigo-50 text-indigo-600">
                            <span class="material-symbols-outlined">inventory</span>
                        </span>
                        <h3 class="mt-5 text-lg font-semibold text-slate-900">Product catalog</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">Keep product details, categories, pricing, and availability organized and easy to find.</p>
                    </article>

                    <article class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm shadow-slate-200/50 transition hover:-translate-y-1 hover:shadow-lg">
                        <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-amber-50 text-amber-600">
                            <span class="material-symbols-outlined">notifications_active</span>
                        </span>
                        <h3 class="mt-5 text-lg font-semibold text-slate-900">Stock awareness</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">See stock levels clearly and get notified when products may need attention.</p>
                    </article>

                    <article class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm shadow-slate-200/50 transition hover:-translate-y-1 hover:shadow-lg">
                        <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-cyan-50 text-cyan-600">
                            <span class="material-symbols-outlined">local_shipping</span>
                        </span>
                        <h3 class="mt-5 text-lg font-semibold text-slate-900">Supplier directory</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">Keep supplier contacts and company information connected to your operations.</p>
                    </article>

                    <article class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm shadow-slate-200/50 transition hover:-translate-y-1 hover:shadow-lg">
                        <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-600">
                            <span class="material-symbols-outlined">autorenew</span>
                        </span>
                        <h3 class="mt-5 text-lg font-semibold text-slate-900">Reorder workflow</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-600">Track reorder requests and keep purchasing tasks visible to your team.</p>
                    </article>
                </div>
            </section>

            <section class="mb-8 overflow-hidden rounded-3xl border border-indigo-200 bg-indigo-50 px-6 py-8 sm:flex sm:items-center sm:justify-between sm:px-9">
                <div>
                    <h2 class="text-xl font-bold text-slate-950">Ready to get a clearer view of your inventory?</h2>
                    <p class="mt-2 text-sm text-slate-600">Sign in to open your StockPilot  workspace.</p>
                </div>
                @guest
                    <a href="{{ route('login') }}" class="mt-5 inline-flex items-center justify-center gap-2 rounded-xl bg-indigo-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-indigo-500 sm:mt-0">
                        Staff sign in
                        <span class="material-symbols-outlined text-lg">arrow_forward</span>
                    </a>
                @endguest
            </section>
        </main>

        <footer class="flex flex-col gap-2 border-t border-slate-200 py-6 text-xs text-slate-500 sm:flex-row sm:items-center sm:justify-between">
            <span>© {{ date('Y') }} StockPilot . Inventory, made simple.</span>
            <a href="{{ route('login') }}" class="font-medium text-slate-600 transition hover:text-indigo-600">Staff sign in</a>
        </footer>
    </div>
@endsection
