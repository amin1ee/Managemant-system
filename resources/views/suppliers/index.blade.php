@extends("layout.layout")

@section("title", __("Suppliers"))

@section("content")
<div class="container mx-auto px-4 py-6">

    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Suppliers</h1>
        @can("create", App\Models\Supplier::class)
        <a href="{{ route('suppliers.create') }}"
           class="inline-flex items-center gap-2 bg-green-600 text-white px-5 py-2.5 rounded-lg shadow hover:bg-green-700 transition">
            + Add Supplier
        </a>
        @endcan
    </div>

    <div class="bg-white rounded-2xl shadow overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Company</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Phone</th>
                        @can("create", App\Models\Supplier::class)
                        <th class="px-6 py-3 text-right text-xs font-semibold text-gray-600 uppercase">Actions</th>
                        @endcan
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @forelse ($suppliers as $supplier)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 font-medium text-gray-800">{{ $supplier->name }}</td>
                        <td class="px-6 py-4 text-gray-600">{{ $supplier->company ?? '-' }}</td>
                        <td class="px-6 py-4 text-gray-600">{{ $supplier->email ?? '-' }}</td>
                        <td class="px-6 py-4 text-gray-600">{{ $supplier->phone ?? '-' }}</td>

                        @can("create", App\Models\Supplier::class)
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('suppliers.edit', $supplier->id) }}"
                                   class="text-sm bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                                    Edit
                                </a>

                                <form onsubmit="return confirm('Are you sure you want to delete this supplier?')"
                                      action="{{ route('suppliers.destroy', $supplier->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="text-sm bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                        @endcan
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-6 text-center text-gray-500">
                            No suppliers found.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-10">
        {{ $suppliers->links() }}
    </div>
</div>
@endsection
