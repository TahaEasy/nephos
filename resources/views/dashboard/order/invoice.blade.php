<x-layout>
  @vite('resources/js/invoice.js')
  <div class="flex justify-center items-start min-h-screen">
    <div class="w-full max-w-[760px]">
      <div class="flex justify-between items-end mt-8 mb-4 xs:px-0 px-2">
        <div class="flex xs:flex-row flex-col justify-start gap-4">
          <div class="flex justify-start items-center gap-2">
            <span class="text-gray-400 dark:text-slate-800">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-download">
                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                <polyline points="7 10 12 15 17 10"></polyline>
                <line x1="12" y1="15" x2="12" y2="3"></line>
              </svg>
            </span>
            <button type="button" id="download-btn"
              class="text-slate-800 dark:text-gray-400 hover:text-primary hover:underline">دانلود PDF</button>
          </div>
          <div class="flex justify-start items-center gap-2">
            <span class="text-gray-400 dark:text-slate-800">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-printer">
                <polyline points="6 9 6 2 18 2 18 9"></polyline>
                <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                <rect x="6" y="14" width="12" height="8"></rect>
              </svg>
            </span>
            <button type="button" id="print-btn"
              class="text-slate-800 dark:text-gray-400 hover:text-primary hover:underline">چاپ
              صورتحساب</button>
          </div>
        </div>
        <div>
          <a href="{{ auth()->user()?->is_admin() ? route('admin.user.orders', [$order->user->id]) : route('orders') }}"
            class="block px-8 bg-primary hover:bg-primary/80 hover:shadow-lg shadow-white text-xs py-3 rounded-sm text-white transition-all duration-300">
            بازگشت
          </a>
        </div>
      </div>

      <div class="print bg-white h-max px-8 py-12" id="content">
        {{-- start header section --}}
        <div class="flex justify-between items-center">
          <div>
            <img src="/logo.png" alt="logo" class="w-14 h-16">
          </div>
          <div class="flex flex-col items-end">
            <p class="text-lg text-gray-400 font-bold"><span class="text-xs text-slate-800">شماره سفارش</span>
              {{ $order->id }}</p>
            <p class="text-lg text-gray-400 font-bold"><span class="text-xs text-slate-800">شماره صورتحساب</span>
              {{ $invoice->id }}</p>
            <p class="text-gray-400 font-bold"><span class="text-xs text-slate-800">تاریخ صدور</span>
              {{ verta($invoice->created_at)->format('Y/m/d') }}</p>
          </div>
        </div>
        <div class="flex justify-between items-start my-4">
          <div>
            <p class="text-lg text-slate-800 font-bold">شرکت نفوس</p>
            <p class="text-sm text-gray-400">مازندران - نکا</p>
            <p class="text-sm text-gray-400">خیابان انقلاب - کوچه اسفندیاری 4</p>
          </div>
          <div class="text-left">
            <p class="text-lg text-slate-800 font-bold">{{ $invoice->name() }}</p>
            <p class="text-sm text-gray-400">{{ $invoice->province }} - {{ $invoice->city }}</p>
            <p class="text-sm text-gray-400">خیابان {{ $invoice->street }} - کوچه {{ $invoice->alley }}</p>
          </div>
        </div>
        {{-- end header section --}}

        {{-- start order items section --}}
        <div>
          <div class="mt-8">
            <div class="grid grid-cols-6">
              <p class="text-xs text-gray-400 col-span-2">محصول</p>
              <p class="text-center text-xs text-gray-400">تعداد</p>
              <p class="text-start text-xs text-gray-400 col-span-2">قیمت</p>
              <p class="text-start text-xs text-gray-400">جمع کل</p>
            </div>
          </div>
          <div class="flex flex-col gap-2 mt-4">
            @foreach ($order->order_items as $order_item)
              <div class="grid grid-cols-6 bg-white border-[1px] border-slate-800/20 px-2 py-5 rounded-md">
                <div class="flex justify-start items-center gap-2 col-span-2">
                  <p class="text-slate-800 text-sm">{{ $order_item->product->name }}</p>
                </div>
                <div class="flex justify-center items-center w-full h-full">
                  <p class="text-sm text-gray-400">{{ $order_item->quantity }}</p>
                </div>
                <div class="flex justify-start items-center w-full h-full col-span-2">
                  @if ($order_item->product->discount)
                    <div>
                      <p class="text-sm text-gray-400">{{ number_format($order_item->product->discount_price()) }}
                        تومان
                      </p>
                      <p class="text-xs text-gray-700 line-through">
                        {{ number_format($order_item->product->price) }} تومان</p>
                    </div>
                  @else
                    <p class="text-sm text-gray-400">{{ number_format($order_item->product->price) }} تومان</p>
                  @endif
                </div>
                <div class="flex justify-center items-center w-full h-full">
                  <p class="text-sm text-slate-900">{{ number_format($order_item->total_price()) }}
                    تومان</p>
                </div>
              </div>
            @endforeach
          </div>
        </div>
        {{-- end order items section --}}

        {{-- start prices section --}}
        <div class="flex justify-center items-center">
          <div
            class="w-full xs:max-w-[calc(100%-5rem)] max-w-none text-start p-4 my-2 mt-6 border-[1px] border-slate-800/30 bg-white rounded-md">
            <p class="text-gray-400 mb-4 text-center text-xs font-medium">اطلاعات پرداخت</p>
            <div class="flex justify-between items-center mb-2">
              <p class="text-gray-500 text-sm font-semibold">جمع موارد</p>
              <p class="text-gray-400">{{ number_format($order->sum_price()) }} تومان</p>
            </div>
            <div class="flex justify-between items-center mb-2">
              <p class="text-gray-500 text-sm font-semibold">مالیات</p>
              <p class="text-gray-400">
                {{ number_format(($order->sum_price() * 9) / 100) }} تومان
              </p>
            </div>
            <div class="flex justify-between items-center mb-2">
              <p class="text-gray-500 text-sm font-semibold">هزینه ارسال</p>
              <p class="text-gray-400">
                {{ number_format(50000) }} تومان
              </p>
            </div>
            <div class="flex justify-between items-center mb-2">
              <p class="text-slate-900 font-semibold">مبلغ کل</p>
              <p class="text-slate-900 font-semibold">
                {{ number_format($order->sum_price() + ($order->sum_price() * 9) / 100 + 50000) }} تومان
              </p>
            </div>
          </div>
        </div>
        {{-- end prices section --}}
      </div>
    </div>
  </div>

  <!-- Include html2pdf library -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
</x-layout>
