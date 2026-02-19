@extends('layout.layout')

@section('title', 'Notifications')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Notifications</h1>

        <div class="bg-white shadow rounded-xl">
            <ul class="divide-y divide-gray-200 max-h-96 overflow-y-auto">
                @forelse($notifications as $notification)
                    <li class="px-4 py-3 flex justify-between items-start hover:bg-gray-50 transition">
                        <div>
                            <p class="text-sm text-gray-600' }}">
                                {{ $notification->data['message'] ?? 'No message' }}
                            </p>
                            <span class="text-xs text-gray-400">
                                {{ $notification->created_at->diffForHumans() }}
                            </span>
                        </div>
                        <form method="POST" action="{{ route('notifications.destroy', $notification->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 text-sm font-semibold">
                                Delete
                            </button>
                        </form>
                    </li>
                @empty
                    <li class="px-4 py-6 text-center text-gray-400 text-sm">
                        No notifications
                    </li>
                @endforelse
            </ul>
        </div>
    </div>
@endsection