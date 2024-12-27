<x-layout>

  <div class="flex justify-center min-h-screen">
    <div class="container lg:px-24 px-2 pt-4">
      <div class="relative flex justify-between items-center my-12">
        <img src="/img/svg/nephos-grayscale.svg" alt="nephos-gray"
          class="absolute w-20 h-20 opacity-40 dark:opacity-100 right-0 top-1/2 translate-x-1/2 -translate-y-1/2 z-10">
        <h1 class="relative flex justify-start items-center gap-1 text-3xl text-slate-700 dark:text-slate-200 z-20">
          <a href="{{ auth()->user()?->is_admin() ? (url()->previous() == route('admin.user.orders', [$order->user->id]) ? route('admin.user.orders', [$order->user->id]) : route('admin.orders')) : route('orders') }}"
            class="opacity-100 hover:opacity-70 transition-all duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="feather feather-chevron-left rotate-180">
              <polyline points="15 18 9 12 15 6"></polyline>
            </svg>
          </a>
          <span>
            جزئیات سفارش
          </span>
        </h1>
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
          <a href="{{ route('invoice', ['order' => $order->id]) }}" id="print-btn"
            class="text-slate-800 dark:text-gray-400 hover:text-primary hover:underline">چاپ
            صورتحساب</a>
        </div>
      </div>
      <div class="sm:mb-0 mb-20">
        <div class="flex justify-between items-center">
          <div>
            <p class="text-slate-800 dark:text-slate-200 font-bold">سفارش شماره #{{ $order->id }}</p>
            <p class="text-sm text-gray-400">تاریخ صدور: {{ verta($order->created_at)->format('d F Y') }}</p>
          </div>
          <div class="flex justify-start items-center gap-1">
            <div>
              <img src="{{ route('user-avatar', ['user' => $order->user->id]) }}" alt="orderer image"
                class="w-10 h-10 rounded-full">
            </div>
            <div>
              <p class="text-xxs text-gray-400">سفارش دهنده</p>
              <p class="text-lg text-slate-800 dark:text-slate-200 font-extrabold leading-none">
                {{ $order->user->name() }}</p>
            </div>
          </div>
        </div>
        <div class="flex lg:flex-row flex-col justify-between items-start mt-12">
          <div class="w-full lg:w-[72%] px-0 lg:px-8">
            <div class="grid grid-cols-6">
              <p class="text-xs text-gray-400 col-span-2">محصول</p>
              <p class="text-center text-xs text-gray-400">تعداد</p>
              <p class="text-center text-xs text-gray-400">قیمت</p>
              <p class="text-center text-xs text-gray-400">تخفیف</p>
              <p class="text-center text-xs text-gray-400">جمع کل</p>
            </div>
            <div class="flex flex-col gap-2 mt-4">
              @foreach ($order->order_items as $order_item)
                <div
                  class="grid grid-cols-6 bg-white dark:bg-slate-800 border-[1px] border-slate-800/20 p-2 rounded-md">
                  <div class="flex justify-start items-center gap-2 col-span-2">
                    <img src="{{ route('product-images', ['slug' => $order_item->product->slug]) }}"
                      alt="order-item-image" class="w-12 h-12">
                    <p class="text-slate-800 dark:text-slate-200 text-sm">{{ $order_item->product->name }}</p>
                  </div>
                  <div class="flex justify-center items-center w-full h-full">
                    <p class="text-sm text-gray-400">{{ $order_item->quantity }}</p>
                  </div>
                  <div class="flex justify-center items-center w-full h-full">
                    <p class="text-sm text-gray-400">{{ number_format($order_item->product->price) }} تومان</p>
                  </div>
                  <div class="flex justify-center items-center w-full h-full">
                    <p class="text-sm text-gray-400">
                      {{ $order_item->product->discount == 0 ? 'ندارد' : $order_item->product->discount . '%' }}</p>
                  </div>
                  <div class="flex justify-center items-center w-full h-full">
                    <p class="text-sm text-slate-900 dark:text-slate-200">
                      {{ number_format($order_item->total_price()) }}
                      تومان</p>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
          <div class="w-full lg:block flex sm:flex-row flex-col gap-4 lg:w-[28%]">
            {{-- start address box --}}
            <div
              class="w-full sm:w-1/2 lg:w-auto text-start p-4 my-2 border-[1px] border-slate-800/30 bg-white dark:bg-slate-800 rounded-md">
              <p class="text-gray-400 mb-4 text-xs font-medium">آدرس ارسال</p>
              <p class="text-sm text-slate-900 dark:text-slate-200">استان {{ $order->invoice->province ?? '- - -' }}،
                شهر {{ $order->invoice->city ?? '- - -' }}</p>
              <p class="text-sm text-slate-900 dark:text-slate-200">خیابان {{ $order->invoice->street ?? '- - -' }}،
                کوچه
                {{ $order->invoice->alley ?? '- - -' }}</p>
              <p class="text-sm text-slate-900 dark:text-slate-200">کد پستی:
                {{ $order->invoice->post_code ?? '- - -' }}،
                پلاک: {{ $order->invoice->plaque ?? '- - -' }}
              </p>
              <p class="text-sm text-slate-900 dark:text-slate-200">شماره همراه:
                {{ $order->invoice->phone ?? '- - -' }}</p>
            </div>
            {{-- end address box --}}
            {{-- start prices box --}}
            <div
              class="w-full sm:w-1/2 lg:w-auto text-start p-4 my-2 border-[1px] border-slate-800/30 bg-white dark:bg-slate-800 rounded-md">
              <p class="text-gray-400 mb-4 text-xs font-medium">اطلاعات پرداخت</p>
              <div class="flex justify-between items-center">
                <p class="text-gray-500 text-sm font-semibold">جمع موارد</p>
                <p class="text-gray-400">{{ number_format($order->sum_price()) }} تومان</p>
              </div>
              <div class="flex justify-between items-center">
                <p class="text-gray-500 text-sm font-semibold">مالیات</p>
                <p class="text-gray-400">
                  {{ number_format(($order->sum_price() * 9) / 100) }} تومان
                </p>
              </div>
              <div class="flex justify-between items-center">
                <p class="text-gray-500 text-sm font-semibold">هزینه ارسال</p>
                <p class="text-gray-400">
                  {{ number_format(50000) }} تومان
                </p>
              </div>
              <div class="flex justify-between items-center">
                <p class="text-slate-900 dark:text-slate-200 font-semibold">مبلغ کل</p>
                <p class="text-slate-900 dark:text-slate-200 font-semibold">
                  {{ number_format($order->sum_price() + ($order->sum_price() * 9) / 100 + 50000) }} تومان
                </p>
              </div>
            </div>
            {{-- end prices box --}}
          </div>
        </div>
        {{-- --------------- --}}
      </div>
    </div>
  </div>
</x-layout>
