@extends('layout.layout')

@section('title', 'Edit Reorder')

@section('content')

<div class="container mx-auto p-6 max-w-xl">

<h1 class="text-2xl font-bold mb-6">Edit Reorder</h1>

<div class="bg-white shadow rounded-xl p-6">

<form action="{{ route('reorders.update', $reorder) }}" method="POST">

@csrf
@method('PUT')

<div class="mb-4">
<label class="block text-sm font-medium text-gray-700 mb-1">
Product
</label>

<input type="text"
value="{{ $reorder->product->name }}"
disabled
class="w-full border rounded-lg px-3 py-2 bg-gray-100">
</div>

<div class="mb-4">
<label class="block text-sm font-medium text-gray-700 mb-1">
Requested Quantity
</label>

<input type="number"
name="requested_quantity"
value="{{ $reorder->requested_quantity }}"
class="w-full border rounded-lg px-3 py-2">
</div>

<div class="mb-6">
<label class="block text-sm font-medium text-gray-700 mb-1">
Status
</label>

<select name="status" class="w-full border rounded-lg px-3 py-2">
<option value="pending" {{ $reorder->status == 'pending' ? 'selected' : '' }}>Pending</option>
<option value="ordered" {{ $reorder->status == 'ordered' ? 'selected' : '' }}>Ordered</option>
<option value="cancelled" {{ $reorder->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
</select>
</div>

<button type="submit"
class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
Update Reorder
</button>

</form>

</div>
</div>

@endsection