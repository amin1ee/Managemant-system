@if ($stockChart)
    <x-chartjs-component :chart="$stockChart" />
@else
    <div class="flex justify-center text-center">
        <p class="text-red-500 p-2 w-1/2 text-sm mb-2 animate-pulse ">No stock data available.</p>
    </div>
@endif