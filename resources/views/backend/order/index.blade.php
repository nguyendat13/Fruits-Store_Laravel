<x-layout-admin>
    <x-slot:title>
        Đơn hàng
    </x-slot:title>
    <!-- Main content -->
    <div class="flex-1 p-6 relative left-[100px]">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Quản lý Đơn Hàng</h1>
            <div>
                <a href="" class="bg-green-500 text-white px-4 py-2 rounded-md mr-2 hover:bg-green-600">Xuất Excel</a>
                <a href="" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Tạo Đơn Hàng</a>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto bg-white shadow-md rounded-md">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">#</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Khách Hàng</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Sản Phẩm</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Tổng Tiền</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Trạng Thái</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-900">Ngày Đặt</th>
                        <th class="px-6 py-4 text-center text-sm font-medium text-gray-900">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $item)
                        <tr class="border-b">
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $item->id }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $item->user->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">
                                @foreach ($item->products as $product)
                                    {{ $product->qty }} x {{ $product->name }}<br>
                                @endforeach
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ number_format($item->orderDetails->sum('amount'), 0, ',', '.') }} VND</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $item->status ? 'Đã Xử Lý' : 'Chờ Xử Lý' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $item->created_at->format('Y-m-d') }}</td>
                            <td class="flex px-7 py-8 text-center">
                                <!-- Chức năng khác -->
                                <a href="{{ route('orders.show', $item->id) }}" class="bg-blue-500 text-white px-4 py-2 m-1 rounded-md hover:bg-blue-600 text-xs">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="mt-4">
            {{ $orders->links() }}
        </div>
    </div>
</x-layout-admin>
