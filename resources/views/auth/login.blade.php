@extends("layout.layout")

@section("title", __("Login"))

@section("content")

<div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">

    <div class="w-full max-w-md">

        <div class="bg-white shadow-2xl rounded-3xl overflow-hidden">

            <div class="bg-indigo-600 px-8 py-6 text-center">

                <h1 class="text-3xl font-bold text-white">
                    Welcome Back
                </h1>

                <p class="text-indigo-100 mt-2 text-sm">
                    Sign in to your account
                </p>

            </div>

            <form action="{{ route('login.store') }}"
                  method="POST"
                  class="p-8 space-y-6">

                @csrf
                <div>

                    <label for="email"
                           class="block text-sm font-semibold text-gray-700 mb-2">

                        Email Address

                    </label>

                    <input id="email"
                           type="email"
                           name="email"
                           required
                           autocomplete="email"
                           placeholder="Enter your email"
                           class="w-full border border-gray-300 rounded-xl px-4 py-3
                                  focus:ring-2 focus:ring-indigo-500 focus:outline-none">

                </div>

                <div>

                    <div class="flex items-center justify-between mb-2">

                        <label for="password"
                               class="text-sm font-semibold text-gray-700">

                            Password

                        </label>

                    </div>

                    <input id="password"
                           type="password"
                           name="password"
                           required
                           autocomplete="current-password"
                           placeholder="Enter your password"
                           class="w-full border border-gray-300 rounded-xl px-4 py-3
                                  focus:ring-2 focus:ring-indigo-500 focus:outline-none">

                </div>
                <button type="submit"
                        class="w-full bg-indigo-600 hover:bg-indigo-700
                               text-white font-semibold py-3 rounded-xl
                               shadow-lg transition">

                    Sign In

                </button>

            </form>

        </div>

    </div>

</div>

@endsection