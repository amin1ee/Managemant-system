@extends("layout.layout")

@section("title", __("Edit Driver"))

@section("content")
<div class="mx-auto max-w-2xl py-8">
    <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm shadow-slate-200/70">
        <div class="bg-gradient-to-r from-blue-600 to-cyan-600 px-6 py-5">
            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-blue-100">Team</p>
            <h1 class="mt-2 text-2xl font-bold text-white">Edit Driver</h1>
        </div>

        <form action="{{ route('drivers.update', $driver) }}" method="POST" class="space-y-6 p-6">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="mb-2 block text-sm font-semibold text-slate-700">Name</label>
                <input id="name" type="text" name="name" value="{{ old('name', $driver->name) }}" required
                       class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-800 outline-none transition focus:border-blue-400 focus:bg-white focus:ring-4 focus:ring-blue-100">
                @error('name') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="telefon" class="mb-2 block text-sm font-semibold text-slate-700">Telefon</label>
                <input id="telefon" type="tel" name="telefon" value="{{ old('telefon', $driver->telefon) }}" required
                       class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-800 outline-none transition focus:border-blue-400 focus:bg-white focus:ring-4 focus:ring-blue-100">
                @error('telefon') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="email" class="mb-2 block text-sm font-semibold text-slate-700">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email', $driver->email) }}" required
                       class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-800 outline-none transition focus:border-blue-400 focus:bg-white focus:ring-4 focus:ring-blue-100">
                @error('email') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div class="flex flex-col gap-3 pt-2 sm:flex-row">
                <a href="{{ route('drivers.index') }}"
                   class="inline-flex flex-1 items-center justify-center rounded-2xl border border-slate-200 bg-slate-100 px-5 py-3 text-sm font-medium text-slate-700 transition hover:bg-slate-200">
                    Cancel
                </a>
                <button type="submit"
                        class="inline-flex flex-1 items-center justify-center rounded-2xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-blue-500/20 transition hover:bg-blue-500">
                    Update Driver
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
