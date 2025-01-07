<x-layout-site>
    <x-slot:title>
        Đơn hàng
    </x-slot:title>
    <div>
        <div class="container mx-auto my-10 p-4 bg-white rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-6">Danh Sách Đơn Hàng</h2>

            <div class="space-y-6">
                @foreach($orders as $order)
                    <div class="order-item flex justify-between items-center p-4 bg-gray-50 rounded-lg shadow-md">
                        <div class="flex items-center space-x-4">
                            <div>
                                <h3 class="text-xl font-semibold">Đơn Hàng #{{ $order->id }}</h3>
                                <p class="text-gray-600">Ngày: {{ $order->created_at->format('Y-m-d') }}</p>
                                <p class="text-gray-600">Trạng thái: 
                                    @if($order->status == 1)
                                        <span class="text-green-600">Đang xử lý</span>
                                    @elseif($order->status == 2)
                                        <span class="text-yellow-600">Đang giao</span>
                                    @elseif($order->status == 3)
                                        <span class="text-yellow-600">Đã giao</span>
                                    @else
                                        <span class="text-red-600">Đã hủy</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="text-xl font-bold text-green-600">
                            {{ number_format($order->total_amount*1000, 0, ',', '.') }} VND
                        </div>
                        <!-- Nút Xem chi tiết -->
                        <button class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 relative left-[220px]" onclick="openModal({{ $order->id }})">
                            Xem chi tiết
                        </button>
                        <!-- Nút Hủy Đơn Hàng -->
                        @if($order->status == 1) <!-- Chỉ hiển thị nút hủy nếu đơn hàng chưa được giao -->
                            <button class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700" onclick="confirmCancel({{ $order->id }})">
                                Hủy đơn hàng
                            </button>
                        @endif
                    </div>

                    <!-- Modal cho chi tiết đơn hàng -->
                    <div id="modal-{{ $order->id }}" class="modal fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center hidden">
                        <div class="modal-content bg-white p-6 rounded-lg shadow-md">
                            <h3 class="text-xl font-semibold">Chi tiết Đơn Hàng #{{ $order->id }}</h3>
                            <ul>
                                @foreach($orderDetails->where('order_id', $order->id) as $orderDetail)
                                    <li class="mt-2">
                                        <p><strong>Sản phẩm:</strong> {{ $orderDetail->product->name }}</p>
                                        <p><strong>Số lượng:</strong> {{ $orderDetail->qty }}</p>
                                        <p><strong>Giá:</strong> {{ number_format($orderDetail->price*1000, 0, ',', '.') }} VND</p>
                                        <p><strong>Tổng:</strong> {{ number_format($orderDetail->amount*1000, 0, ',', '.') }} VND</p>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="mt-4 flex justify-end">
                                <button class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700" onclick="closeModal({{ $order->id }})">
                                    Đóng
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Xác Nhận Hủy Đơn Hàng -->
                    <div id="cancel-modal-{{ $order->id }}" class="modal fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center hidden">
                        <div class="modal-content bg-white p-6 rounded-lg shadow-md">
                            <h3 class="text-xl font-semibold">Xác Nhận Hủy Đơn Hàng #{{ $order->id }}</h3>
                            <p>Bạn có chắc chắn muốn hủy đơn hàng này không?</p>
                            <div class="mt-4  flex justify-end">
                                <button class="bg-green-600 text-white px-4 py-2 mr-[10px] rounded-md hover:bg-green-700" onclick="cancelOrder({{ $order->id }})">
                                    Hủy Đơn Hàng
                                </button>
                                <button class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700" onclick="closeCancelModal({{ $order->id }})">
                                    Hủy
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        // Mở Modal chi tiết
        function openModal(orderId) {
            document.getElementById('modal-' + orderId).classList.remove('hidden');
        }

        // Đóng Modal chi tiết
        function closeModal(orderId) {
            document.getElementById('modal-' + orderId).classList.add('hidden');
        }

        // Mở Modal xác nhận hủy đơn hàng
        function confirmCancel(orderId) {
            document.getElementById('cancel-modal-' + orderId).classList.remove('hidden');
        }

        // Đóng Modal xác nhận hủy đơn hàng
        function closeCancelModal(orderId) {
            document.getElementById('cancel-modal-' + orderId).classList.add('hidden');
        }

        // Hủy Đơn Hàng
        function cancelOrder(orderId) {
            // Gửi yêu cầu hủy đơn hàng tới server
            window.location.href = '/orders/cancel/' + orderId;
        }
    </script>
</x-layout-site>
