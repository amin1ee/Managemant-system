@extends("layout.layout")

@section("title", __("Drivers"))

@section("content")
<div class="mx-auto max-w-7xl py-4 md:py-8">
    <header class="mb-8 flex flex-col gap-4 rounded-3xl border border-slate-200 bg-white p-6 shadow-sm shadow-slate-200/60 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-cyan-500">Team</p>
            <h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-900">Drivers</h1>
        </div>

        <a href="{{ route('drivers.create') }}"
           class="inline-flex items-center justify-center rounded-2xl bg-cyan-600 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-cyan-500/20 transition hover:bg-cyan-500">
            + Add Driver
        </a>
    </header>

    @if (session('success'))
        <div class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 px-5 py-3 text-sm font-medium text-emerald-700">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm shadow-slate-200/60">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-[0.15em] text-slate-500">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-[0.15em] text-slate-500">Telefon</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-[0.15em] text-slate-500">Email</th>
                        <th class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-[0.15em] text-slate-500">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 bg-white">
                    @forelse ($drivers as $driver)
                        <tr class="transition hover:bg-slate-50">
                            <td class="px-6 py-4 font-medium text-slate-800">{{ $driver->name }}</td>
                            <td class="px-6 py-4 text-slate-600">{{ $driver->telefon }}</td>
                            <td class="px-6 py-4 text-slate-600">{{ $driver->email }}</td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('drivers.edit', $driver) }}"
                                       class="rounded-xl border border-blue-200 bg-blue-50 px-4 py-2 text-sm font-medium text-blue-700 transition hover:bg-blue-100">
                                        Edit
                                    </a>
                                    <form action="{{ route('drivers.destroy', $driver) }}"
                                          method="POST"
                                          onsubmit="return confirm('Are you sure you want to delete this driver?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="rounded-xl border border-red-200 bg-red-50 px-4 py-2 text-sm font-medium text-red-700 transition hover:bg-red-100">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-8 text-center text-sm text-slate-500">No drivers found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-8">
        {{ $drivers->links() }}
    </div>
</div>
@endsection
