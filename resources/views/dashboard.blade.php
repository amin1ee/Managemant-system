@extends('layout.layout')

@section('title', 'Dashboard')

@section('content')
    <div class="min-h-screen">
        <div class="mx-auto max-w-7xl px-1 py-2 sm:px-2 lg:px-0">
            <header class="relative overflow-hidden rounded-[30px] border border-indigo-100 bg-gradient-to-r from-slate-900 via-indigo-900 to-blue-700 p-6 shadow-[0_24px_70px_rgba(79,70,229,0.25)] sm:p-8">
                <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,_rgba(255,255,255,0.2),transparent_30%),radial-gradient(circle_at_bottom_left,_rgba(56,189,248,0.18),transparent_35%)]"></div>

                <div class="relative flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
                    <div>
                        <p class="mb-2 inline-flex items-center rounded-full bg-white/10 px-3 py-1 text-xs font-medium text-indigo-100 ring-1 ring-white/10 backdrop-blur-sm">
                            Business overview
                        </p>
                        <h1 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Dashboard</h1>
                        <p class="mt-2 text-sm text-indigo-100 sm:text-base">
                            Welcome back, {{ Auth::user()->name }} — here’s a quick look at your operations.
                        </p>
                    </div>

                    <div class="flex items-center gap-3 self-start rounded-2xl border border-white/10 bg-white/10 px-4 py-3 text-sm text-indigo-50 shadow-lg backdrop-blur-sm">
                        <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-white/15 text-lg shadow-inner shadow-white/20">📈</span>
                        <div>
                            <p class="text-[10px] uppercase tracking-[0.2em] text-indigo-200">Today</p>
                            <p class="font-semibold text-white">Performance is up</p>
                        </div>
                    </div>
                </div>
            </header>

            <div class="mt-8 grid gap-6 sm:grid-cols-2 xl:grid-cols-3">
                <x-dashboard-stats />
            </div>

            <div class="mt-8 grid gap-6 xl:grid-cols-[1.7fr_0.9fr]">
                <section class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm shadow-slate-200/60 sm:p-6">
                    <div class="mb-5 flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium uppercase tracking-[0.18em] text-slate-500">Inventory</p>
                            <h2 class="mt-1 text-xl font-semibold text-slate-900">Stock levels</h2>
                        </div>
                        <span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-600">
                            Live
                        </span>
                    </div>

                    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-slate-50 p-3">
                        <x-stock-levels />
                    </div>
                </section>

                <aside class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm shadow-slate-200/60 sm:p-6">
                    <x-login-attempts />
                </aside>
            </div>
        </div>
    </div>
@endsection

<script>
    function toggleLoginAttempts() {
        const div = document.getElementById('loginAttemptsDiv');

        if (!div) return;

        if (div.style.display === 'none') {
            div.style.display = 'block';
        } else {
            div.style.display = 'none';
        }
    }
</script>