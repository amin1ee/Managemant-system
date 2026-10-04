@extends("layout.layout")

@section("title", __("Login"))

@section("content")
<div class="flex min-h-screen items-center justify-center bg-[radial-gradient(circle_at_top,_rgba(99,102,241,0.18),transparent_35%),linear-gradient(135deg,#f8fafc,#eef2ff_40%,#f8fafc)] px-4">
    <div class="w-full max-w-md">
        <div class="overflow-hidden rounded-[28px] border border-slate-200 bg-white/80 shadow-2xl shadow-indigo-500/10 backdrop-blur-sm">
            <div class="bg-gradient-to-r from-indigo-600 via-blue-600 to-sky-600 px-8 py-7 text-center">
                <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-2xl bg-white/10 ring-1 ring-white/20">
                    <span class="material-symbols-outlined text-3xl text-white">lock</span>
                </div>
                <h1 class="text-3xl font-bold text-white">Welcome back</h1>
                <p class="mt-2 text-sm text-indigo-100">Sign in to your account</p>
            </div>

            <form action="{{ route('login.store') }}" method="POST" class="space-y-6 p-8">
                @csrf

                <div>
                    <label for="email" class="mb-2 block text-sm font-semibold text-slate-700">Email Address</label>
                    <input id="email"
                           type="email"
                           name="email"
                           required
                           autocomplete="email"
                           placeholder="Enter your email"
                           class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-800 outline-none transition focus:border-indigo-400 focus:bg-white focus:ring-4 focus:ring-indigo-100">
                </div>

                <div>
                    <label for="password" class="mb-2 block text-sm font-semibold text-slate-700">Password</label>
                    <input id="password"
                           type="password"
                           name="password"
                           required
                           autocomplete="current-password"
                           placeholder="Enter your password"
                           class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-800 outline-none transition focus:border-indigo-400 focus:bg-white focus:ring-4 focus:ring-indigo-100">
                </div>

                <button type="submit" class="w-full rounded-2xl bg-gradient-to-r from-indigo-600 to-blue-600 px-4 py-3.5 text-base font-semibold text-white shadow-lg shadow-indigo-500/20 transition hover:from-indigo-500 hover:to-blue-500">
                    Sign In
                </button>
            </form>
        </div>
    </div>
</div>
@endsection