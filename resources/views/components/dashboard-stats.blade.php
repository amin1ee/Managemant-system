
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