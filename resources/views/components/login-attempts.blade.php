<div class="flex items-center justify-between mb-4">
    <h2 class="text-lg font-semibold">Login Activity</h2>

    <button onclick="toggleLoginAttempts()" class="text-sm bg-gray-100 hover:bg-gray-200 px-3 py-1 rounded-lg">
        Toggle List
    </button>
</div>

<div style="height: 320px;">
    <x-chartjs-component :chart="$loginChart" />
</div>

<!-- LOGIN LIST -->
<div id="loginAttemptsDiv" class="mt-4 border-t pt-4 space-y-2">

    @foreach ($loginAttempts as $attempt)
        <div class="flex items-center justify-between text-sm bg-gray-50 px-3 py-2 rounded-lg">

            <span class="font-medium text-gray-700">
                {{ $attempt->user->name }}
            </span>

            <span class="text-xs text-gray-500 bg-white px-2 py-1 rounded">
                {{ $attempt->created_at->diffForHumans() }}
            </span>

        </div>
    @endforeach

</div>