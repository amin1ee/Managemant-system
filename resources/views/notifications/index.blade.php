@extends('layout.layout')

@section('title', 'Notifications')

@section('content')
    <div class="mx-auto max-w-4xl py-4 md:py-8">
        <header class="mb-6 rounded-3xl border border-slate-200 bg-white p-6 shadow-sm shadow-slate-200/60">
            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-rose-500">Inbox</p>
            <h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-900">Notifications</h1>
        </header>

        <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm shadow-slate-200/60">
            <ul class="max-h-[32rem] divide-y divide-slate-200 overflow-y-auto">
                @forelse ($notifications as $notification)
                    <li class="flex items-start justify-between gap-4 px-5 py-4 transition hover:bg-slate-50">
                        <div class="flex items-start gap-3">
                            <div class="mt-1 flex h-10 w-10 items-center justify-center rounded-2xl bg-rose-100 text-lg text-rose-600">🔔</div>
                            <div>
                                <p class="text-sm leading-6 text-slate-700">
                                    {{ $notification->data['message'] ?? 'No message' }}
                                </p>
                                <span class="mt-1 block text-xs font-medium text-slate-400">
                                    {{ $notification->created_at->diffForHumans() }}
                                </span>
                            </div>
                        </div>

                        <form method="POST" action="{{ route('notifications.destroy', $notification->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="rounded-xl border border-red-200 bg-red-50 px-3 py-2 text-xs font-semibold text-red-700 transition hover:bg-red-100">
                                Delete
                            </button>
                        </form>
                    </li>
                @empty
                    <li class="px-6 py-10 text-center text-sm text-slate-500">
                        No notifications
                    </li>
                @endforelse
            </ul>
        </div>
    </div>
@endsection