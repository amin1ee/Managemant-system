
            <!-- Products -->
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm shadow-slate-200/60 transition-transform duration-200 hover:-translate-y-1 hover:shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-500">Products</p>
                        <h2 class="mt-3 text-3xl font-bold text-slate-900">{{ $productsCount }}</h2>
                    </div>

                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-blue-100 text-xl text-blue-600 shadow-inner shadow-blue-100">
                        📦
                    </div>
                </div>
            </div>

            <!-- Reorders -->
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm shadow-slate-200/60 transition-transform duration-200 hover:-translate-y-1 hover:shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-500">Reorders</p>
                        <h2 class="mt-3 text-3xl font-bold text-slate-900">{{ $reordersCount }}</h2>
                    </div>

                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-amber-100 text-xl text-amber-600 shadow-inner shadow-amber-100">
                        🔁
                    </div>
                </div>
            </div>

            <!-- Notifications -->
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm shadow-slate-200/60 transition-transform duration-200 hover:-translate-y-1 hover:shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-500">Notifications</p>
                        <h2 class="mt-3 text-3xl font-bold text-slate-900">{{ Auth::user()->unreadNotifications()->count() }}</h2>
                    </div>

                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-rose-100 text-xl text-rose-600 shadow-inner shadow-rose-100">
                        🔔
                    </div>
                </div>
            </div>