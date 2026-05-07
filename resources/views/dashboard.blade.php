@extends('layout.layout')

@section('title', 'Dashboard')

@section('content')

    <div class="container mx-auto p-6">

        <h1 class="text-2xl font-bold mb-6">Dashboard</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">


            <!-- Products -->
            <div class="bg-white shadow rounded-xl p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm">Products</p>
                        <h2 class="text-3xl font-bold">{{ $productsCount }}</h2>
                    </div>

                    <div class="bg-blue-100 text-blue-600 p-3 rounded-lg">
                        📦
                    </div>
                </div>
            </div>

            <!-- Reorders -->
            <div class="bg-white shadow rounded-xl p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm">Reorders</p>
                        <h2 class="text-3xl font-bold">{{ $reordersCount }}</h2>
                    </div>

                    <div class="bg-yellow-100 text-yellow-600 p-3 rounded-lg">
                        🔁
                    </div>
                </div>
            </div>

            <!-- Notifications -->
            <div class="bg-white shadow rounded-xl p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm">Notifications</p>
                        <h2 class="text-3xl font-bold">{{ Auth::user()->unreadNotifications()->count() }}</h2>
                    </div>

                    <div class="bg-red-100 text-red-600 p-3 rounded-lg">
                        🔔
                    </div>
                </div>
            </div>

        </div>

        <div class="bg-white shadow rounded-xl p-6 mt-6 overflow-x-auto">
            <x-chartjs-component :chart="$stockChart" />
        </div>
        <div class="bg-white shadow rounded-xl p-6 mt-6 overflow-x-auto w-3/8">

            <!-- LOGIN CHART -->
            <div class="bg-white rounded-2xl shadow p-6">

                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-semibold">Login Activity</h2>

                    <button onclick="toggleLoginAttempts()"
                        class="text-sm bg-gray-100 hover:bg-gray-200 px-3 py-1 rounded-lg">
                        Toggle List
                    </button>
                </div>

                <div style="height: 320px;">
                    <x-chartjs-component :chart="$loginChart" />
                </div>

                <!-- LOGIN LIST -->
                <div id="loginAttemptsDiv" class="mt-4 border-t pt-4 space-y-2">

                    @foreach ($loginAttempts as $attempt)
                        <div class="flex items-center justify-between text-sm bg-gray-50 px-3 py-2 rounded-lg">

                            <span class="font-medium text-gray-700">
                                {{ $attempt->user->name }}
                            </span>

                            <span class="text-xs text-gray-500 bg-white px-2 py-1 rounded">
                                {{ $attempt->created_at->diffForHumans() }}
                            </span>

                        </div>
                    @endforeach

                </div>


            </div>
        </div>
    </div>
@endsection


<script>
    function toggleLoginAttempts() {
        const div = document.getElementById('loginAttemptsDiv');

        if (div.style.display === 'none') {
            div.style.display = 'block';
        } else {
            div.style.display = 'none';
        }
    }
</script>