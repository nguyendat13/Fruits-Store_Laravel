  <!-- Sidebar -->
  <aside class="w-1/4 bg-gray-100 p-4 rounded-lg shadow-md">
    <h2 class="text-xl font-bold mb-4">Danh mục chính sách</h2>
    <ul class="space-y-2">
        <li>
            <a href="{{ route('site.shipping-policy') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-200 rounded bg-gray-300 font-bold">
                Chính sách vận chuyển
            </a>
        </li>
        <li>
            <a href="{{ route('site.return-policy') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-200 rounded">
                Chính sách đổi trả
            </a>
        </li>
        <li>
            <a href="{{ route('site.payment-policy') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-200 rounded">
                Chính sách thanh toán
            </a>
        </li>
        <li>
            <a href="{{ route('site.support-policy') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-200 rounded">
                Chính sách hỗ trợ
            </a>
        </li>
    </ul>
</aside>