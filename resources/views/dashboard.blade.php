@extends('layout.layout')

@section('title', 'Dashboard')

@section('content')

    <div class="container mx-auto p-6">
        <header class="mb-6 bg-gray-300 p-4 rounded-lg hover:bg-blue-200 transition">
            <p class="text-gray-700 font-medium">Welcome, {{ Auth::user()->name }}!</p>
            <h1 class="text-2xl font-bold mb-6">Dashboard</h1>
        </header>
        <!-- Dashboard Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <x-dashboard-stats />
        </div>
        <!-- Stock Levels -->
        <div class="bg-white shadow rounded-xl p-6 mt-6 overflow-x-auto">
            <x-stock-levels />
        </div>
        <div class="bg-white shadow rounded-xl p-6 mt-6 overflow-x-auto w-3/8">
            <!-- LOGIN CHART -->
            <div class="bg-white rounded-2xl shadow p-6">
                <x-login-attempts />
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