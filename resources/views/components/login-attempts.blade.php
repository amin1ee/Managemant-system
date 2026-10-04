<div class="mb-5 flex items-center justify-between">
    <div>
        <p class="text-sm font-medium uppercase tracking-[0.18em] text-slate-500">Activity</p>
        <h2 class="mt-1 text-xl font-semibold text-slate-900">Login activity</h2>
    </div>

    <button onclick="toggleLoginAttempts()" class="rounded-full border border-slate-200 bg-slate-50 px-3 py-1.5 text-xs font-medium text-slate-700 transition hover:bg-slate-100">
        Toggle list
    </button>
</div>

<div class="h-64 overflow-hidden rounded-2xl border border-slate-200 bg-slate-50 p-2">
    <x-chartjs-component :chart="$loginChart" />
</div>

<div id="loginAttemptsDiv" class="mt-5 space-y-2 border-t border-slate-200 pt-4">
    @foreach ($loginAttempts as $attempt)
        <div class="flex items-center justify-between rounded-2xl border border-slate-200 bg-slate-50 px-3 py-2.5 text-sm">
            <span class="font-medium text-slate-700">
                {{ $attempt->user->name }}
            </span>

            <span class="rounded-full bg-white px-2.5 py-1 text-[11px] font-medium text-slate-500 ring-1 ring-slate-200">
                {{ $attempt->created_at->diffForHumans() }}
            </span>
        </div>
    @endforeach
</div>