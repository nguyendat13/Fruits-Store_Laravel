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
                                <p class="text-gray-600">Khách hàng: <strong>{{ $order->user->fullname }}</strong></p>
                                <p class="text-gray-600">Email: {{ $order->user->email }}</p>
                                <p class="text-gray-600">Số điện thoại: {{ $order->user->phone }}</p>
                                <p class="text-gray-600">Địa chỉ: {{ $order->user->address }}</p>
                                <p class="text-gray-600">Trạng thái: 
                                    @if($order->status == 1)
                                        <span class="text-green-600">Đang xử lý</span>
                                    @elseif($order->status == 2)
                                        <span class="text-yellow-600">Đang giao</span>
                                    @elseif($order->status == 3)
                                        <span class="text-blue-600">Đã giao</span>
                                    @else
                                        <span class="text-red-600">Đã hủy</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="text-xl font-bold text-green-600">
                            {{ number_format($order->total_amount*1000, 0, ',', '.') }} VND
                        </div>
                        <button class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 relative left-[400px]" onclick="openEditModal({{ $order->id }}, '{{ $order->user->address }}', '{{ $order->user->phone }}')">
                            Chỉnh sửa
                        </button>
                        
                        <!-- Nút Xem chi tiết -->
                        <button class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 relative left-[200px]" onclick="openModal({{ $order->id }})">
                            Xem chi tiết
                        </button>
                        <!-- Nút Hủy Đơn Hàng -->
                        @if($order->status == 1) <!-- Chỉ hiển thị nút hủy nếu đơn hàng chưa được giao -->
                            <button class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700" onclick="confirmCancel({{ $order->id }})">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        @endif
                    </div>
                <!-- Modal chỉnh sửa đơn hàng -->
<div id="edit-modal-{{ $order->id }}" class="modal fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center hidden">
    <div class="modal-content bg-white p-6 rounded-lg shadow-md max-w-lg">
        <h3 class="text-xl font-semibold mb-4">Chỉnh sửa Đơn Hàng #{{ $order->id }}</h3>

        <form id="edit-form-{{ $order->id }}" method="POST" action="{{ route('orders.update', $order->id) }}">
            @csrf
            @method('PUT')

            <!-- Thông tin khách hàng -->
            <div class="mb-4">
                <h4 class="font-semibold">Thông Tin Khách Hàng</h4>
                <p><strong>Họ và Tên:</strong> {{ $order->user->fullname }}</p>
                <p><strong>Email:</strong> {{ $order->user->email }}</p>
                <div class="mb-4">
                    <label class="block font-semibold">Số điện thoại</label>
                    <input type="text" name="phone" id="edit-phone-{{ $order->id }}" class="w-full border px-3 py-2 rounded-lg" value="{{ $order->user->phone }}" required>
                </div>
                <div class="mb-4">
                    <label class="block font-semibold">Địa chỉ</label>
                    <input type="text" name="address" id="edit-address-{{ $order->id }}" class="w-full border px-3 py-2 rounded-lg" value="{{ $order->user->address }}" required>
                </div>
            </div>

            <!-- Danh sách sản phẩm -->
            @if($order->orderDetails && $order->orderDetails->count())
            <h4 class="font-semibold mt-4">Danh Sách Sản Phẩm</h4>
            <ul>
                @foreach($order->orderDetails as $orderDetail)
                    <li class="mt-2 border-b pb-2">
                        <p><strong>Sản phẩm:</strong> {{ $orderDetail->product->name }}</p>
                        <p><strong>Số lượng:</strong> {{ $orderDetail->qty }}</p>
                        <p><strong>Giá:</strong> {{ number_format($orderDetail->price*1000, 0, ',', '.') }} VND</p>
                        <p><strong>Tổng:</strong> {{ number_format($orderDetail->amount*1000, 0, ',', '.') }} VND</p>
                    </li>
                @endforeach
            </ul>
            @else
            <p class="text-red-500">Không có sản phẩm nào trong đơn hàng.</p>
            @endif

            <!-- Tổng giá trị đơn hàng -->
            <div class="mt-4">
                <p class="text-xl font-bold">Tổng tiền: {{ number_format($order->total_amount*1000, 0, ',', '.') }} VND</p>
            </div>

            <div class="mt-4 flex justify-end">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Lưu</button>
                <button type="button" class="bg-red-600 text-white px-4 py-2 ml-2 rounded-md hover:bg-red-700" onclick="closeEditModal({{ $order->id }})">Hủy</button>
            </div>
        </form>
    </div>
</div>


                    <!-- Modal cho chi tiết đơn hàng -->
                    <div id="modal-{{ $order->id }}" class="modal fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center hidden">
                        <div class="modal-content bg-white p-6 rounded-lg shadow-md max-w-lg">
                            <h3 class="text-xl font-semibold mb-4">Chi tiết Đơn Hàng #{{ $order->id }}</h3>

                            <!-- Thông tin khách hàng -->
                            <div class="mb-4">
                                <h4 class="font-semibold">Thông Tin Khách Hàng</h4>
                                <p><strong>Họ và Tên:</strong> {{ $order->user->fullname }}</p>
                                <p><strong>Email:</strong> {{ $order->user->email }}</p>
                                <p><strong>Số điện thoại:</strong> {{ $order->user->phone }}</p>
                                <p><strong>Địa chỉ:</strong> {{ $order->user->address }}</p>
                            </div>

                           <!-- Danh sách sản phẩm -->
                            @if($order->orderDetails && $order->orderDetails->count())
                            <h4 class="font-semibold mt-4">Danh Sách Sản Phẩm</h4>
                            <ul>
                                @foreach($order->orderDetails as $orderDetail)
                                    <li class="mt-2 border-b pb-2">
                                        <p><strong>Sản phẩm:</strong> {{ $orderDetail->product->name }}</p>
                                        <p><strong>Số lượng:</strong> {{ $orderDetail->qty }}</p>
                                        <p><strong>Giá:</strong> {{ number_format($orderDetail->price*1000, 0, ',', '.') }} VND</p>
                                        <p><strong>Tổng:</strong> {{ number_format($orderDetail->amount*1000, 0, ',', '.') }} VND</p>
                                    </li>
                                @endforeach
                            </ul>
                            @else
                            <p class="text-red-500">Không có sản phẩm nào trong đơn hàng.</p>
                            @endif

                            <!-- Tổng giá trị đơn hàng -->
                            <div class="mt-4">
                                <p class="text-xl font-bold">Tổng tiền: {{ number_format($order->total_amount*1000, 0, ',', '.') }} VND</p>
                            </div>

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
                            <div class="mt-4 flex justify-end">
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
    <script>
        function openEditModal(orderId, address, phone) {
            document.getElementById('edit-address-' + orderId).value = address;
            document.getElementById('edit-phone-' + orderId).value = phone;
            document.getElementById('edit-modal-' + orderId).classList.remove('hidden');
        }
    
        function closeEditModal(orderId) {
            document.getElementById('edit-modal-' + orderId).classList.add('hidden');
        }
    </script>
    
</x-layout-site>
