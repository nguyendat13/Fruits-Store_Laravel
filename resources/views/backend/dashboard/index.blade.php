
<x-layout-admin>
    <x-slot:title>
        Dashboard
    </x-slot:title>
   
        <!-- Content Area -->
        <div class="flex-2 p-6 relative left-[150px] w-[1000px]">
            <!-- Header -->
            <header class="flex justify-between items-center mb-8">
                <h1 class="text-2xl font-semibold text-gray-800">Welcome to Admin Dashboard</h1>
                <div>
                    <span class="text-gray-600">Hello, Admin!</span>
                    <a href="{{ route('admin.logout') }}" class="ml-4 text-blue-500 hover:text-blue-700 transition-colors">Đăng xuất</a>
                </div>
            </header>

            <!-- Content -->
            <section>
                <!-- Statistics Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Card 1 -->
                    <div class="bg-gradient-to-r from-blue-500 to-indigo-600 shadow-lg rounded-xl p-6 transform hover:scale-105 transition-transform duration-300 ease-in-out">
                        <h3 class="text-2xl font-semibold text-white">Total Users</h3>
                        <p class="text-4xl text-white mt-4 font-bold">150</p>
                        <div class="absolute top-4 right-4 text-white opacity-50 text-xl">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="bg-gradient-to-r from-green-500 to-teal-600 shadow-lg rounded-xl p-6 transform hover:scale-105 transition-transform duration-300 ease-in-out">
                        <h3 class="text-2xl font-semibold text-white">Total Products</h3>
                        <p class="text-4xl text-white mt-4 font-bold">120</p>
                        <div class="absolute top-4 right-4 text-white opacity-50 text-xl">
                            <i class="fas fa-boxes"></i>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="bg-gradient-to-r from-yellow-500 to-orange-600 shadow-lg rounded-xl p-6 transform hover:scale-105 transition-transform duration-300 ease-in-out">
                        <h3 class="text-2xl font-semibold text-white">Total Orders</h3>
                        <p class="text-4xl text-white mt-4 font-bold">50</p>
                        <div class="absolute top-4 right-4 text-white opacity-50 text-xl">
                            <i class="fas fa-cart-arrow-down"></i>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <section class="mt-8 bg-white shadow-lg rounded-xl p-6">
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">Recent Activity</h3>
                    <div class="space-y-4">
                        <!-- Activity Item 1 -->
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center text-white mr-4">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-700">User John Doe has placed an order</p>
                                <span class="text-sm text-gray-500">2 hours ago</span>
                            </div>
                        </div>
                        <!-- Activity Item 2 -->
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center text-white mr-4">
                                <i class="fas fa-box-open"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-700">New product added: Apple iPhone 14</p>
                                <span class="text-sm text-gray-500">4 hours ago</span>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Charts Section -->
                <section class="mt-8">
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">Sales Statistics</h3>
                    <div class="bg-white shadow-lg rounded-xl p-6">
                        <canvas id="salesChart"></canvas>
                    </div>
                </section>

                <!-- Search Bar Section -->
                <section class="mt-8">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-xl font-semibold text-gray-800">Search</h3>
                        <div class="relative">
                            <input type="text" class="bg-gray-200 text-gray-800 p-2 rounded-lg pl-10 w-64" placeholder="Search products, orders...">
                            <div class="absolute left-2 top-1/2 transform -translate-y-1/2 text-gray-500">
                                <i class="fas fa-search"></i>
                            </div>
                        </div>
                    </div>
                </section>
            </section>
       

        <!-- Add this script to draw the sales chart -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('salesChart').getContext('2d');
            const salesChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                    datasets: [{
                        label: 'Sales ($)',
                        data: [1200, 1500, 1800, 1700, 1600, 2000],
                        borderColor: 'rgb(75, 192, 192)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        tension: 0.4,
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    return `$${tooltipItem.raw}`;
                                }
                            }
                        }
                    },
                }
            });
        </script>
 </div>
 
</x-layout-admin>