<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Stats Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">

                <div class="bg-blue-500 text-white rounded-lg shadow p-6">
                    <h3 class="text-sm uppercase">Users</h3>
                    <p class="text-3xl font-bold mt-2">
                        {{ number_format($totalUsers) }}
                    </p>
                </div>

                <div class="bg-green-500 text-white rounded-lg shadow p-6">
                    <h3 class="text-sm uppercase">Orders</h3>
                    <p class="text-3xl font-bold mt-2">
                        {{ number_format($totalOrders) }}
                    </p>
                </div>

                <div class="bg-purple-500 text-white rounded-lg shadow p-6">
                    <h3 class="text-sm uppercase">Revenue</h3>
                    <p class="text-3xl font-bold mt-2">
                        ${{ number_format($totalRevenue,2) }}
                    </p>
                </div>

                <div class="bg-orange-500 text-white rounded-lg shadow p-6">
                    <h3 class="text-sm uppercase">Safety Requests</h3>
                    <p class="text-3xl font-bold mt-2">
                        {{ number_format($totalSafetyRequests) }}
                    </p>
                </div>

            </div>

            {{-- Charts Row 1 --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">

                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold mb-4">
                        Orders Trend (30 Days)
                    </h3>

                    <canvas id="ordersChart"></canvas>
                </div>

                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold mb-4">
                        User Registrations
                    </h3>

                    <canvas id="usersChart"></canvas>
                </div>

            </div>

            {{-- Charts Row 2 --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold mb-4">
                        Top 10 Selling Products
                    </h3>

                    <canvas id="topProductsChart"></canvas>
                </div>

                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold mb-4">
                        Order Status
                    </h3>

                    <canvas id="statusChart"></canvas>
                </div>

            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>

        // Orders Trend
        new Chart(document.getElementById('ordersChart'), {
            type: 'line',
            data: {
                labels: @json($ordersTrend->pluck('date')),
                datasets: [{
                    label: 'Orders',
                    data: @json($ordersTrend->pluck('total')),
                    borderColor: '#3b82f6',
                    backgroundColor: 'rgba(59,130,246,0.2)',
                    fill: true,
                    tension: 0.4
                }]
            }
        });

        // Users Trend
        new Chart(document.getElementById('usersChart'), {
            type: 'line',
            data: {
                labels: @json($usersTrend->pluck('date')),
                datasets: [{
                    label: 'Users',
                    data: @json($usersTrend->pluck('total')),
                    borderColor: '#10b981',
                    backgroundColor: 'rgba(16,185,129,0.2)',
                    fill: true,
                    tension: 0.4
                }]
            }
        });

        // Top Products
        new Chart(document.getElementById('topProductsChart'), {
            type: 'bar',
            data: {
                labels: @json(
                    $topProducts->map(fn($item) =>
                        \Illuminate\Support\Str::limit(
                            $item->product?->title ?? 'Unknown',
                            40
                        )
                    )
                ),
                datasets: [{
                    label: 'Units Sold',
                    data: @json($topProducts->pluck('total_qty')),
                    backgroundColor: '#8b5cf6'
                }]
            },
            options: {
                indexAxis: 'y',
                responsive: true
            }
        });

        // Order Status
        new Chart(document.getElementById('statusChart'), {
            type: 'doughnut',
            data: {
                labels: @json($orderStatuses->pluck('status')),
                datasets: [{
                    data: @json($orderStatuses->pluck('total')),
                    backgroundColor: [
                        '#22c55e',
                        '#f59e0b',
                        '#ef4444',
                        '#3b82f6',
                        '#8b5cf6'
                    ]
                }]
            }
        });

    </script>

</x-app-layout>
