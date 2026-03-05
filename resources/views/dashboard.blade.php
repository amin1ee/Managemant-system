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

</div>

@endsection