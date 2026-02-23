@extends('layout.layout')

@section('title', 'Notifications')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Reorders</h1>

        <div class="bg-white shadow rounded-xl overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">
                            Status
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">
                            Product
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">
                            Supplier
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">
                            Requested Quantity
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">
                            Actions
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @forelse($reorders as $reorder)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4 text-sm text-gray-700 bg-gray-200">
                                        {{ ucfirst($reorder->status) }}
                                    </td>

                                    <td class="px-6 py-4 text-sm text-gray-700">
                                        {{ $reorder->product->name }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-700">
                                        {{ $reorder->product->supplier->company }}
                                    </td>

                                    <td class="px-6 py-4 text-sm text-gray-700">
                                        {{ $reorder->requested_quantity }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-700 flex gap-6">
                                        <form onsubmit="return confirm('Are you sure you want to reorder this product?')"
                                            action="{{ route('reorders.store', $reorder) }}" method="post">
                                            @csrf
                                            @method('POST')
                                            <button type="submit"
                                                class="text-sm bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">
                                                Make Invoice
                                            </button>
                                        </form>
                                        <form onsubmit="return confirm('Are you sure you want to delete this product?')"
                                            action="{{ route('reorders.destroy', $reorder) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-sm bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition">
                                                Delete
                                            </button>
                                        </form>

                        </table>
                        </td>
                        </tr>
                    @empty
                <tr>
                    <td colspan="3" class="px-6 py-6 text-center text-gray-400 text-sm">
                        No Reorders
                    </td>
                </tr>
            @endforelse
            </tbody>
        </div>
    </div>
@endsection