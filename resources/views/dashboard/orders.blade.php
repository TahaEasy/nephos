<x-dashboard-layout header="سفارشات">
  <div class="my-8">
    @if (count(auth()->user()->orders ?? 0) > 0)
      @foreach (auth()->user()->orders->sortByDesc('id') as $order)
        <div
          class="flex lg:flex-row flex-col justify-between h-auto lg:h-[22rem] mt-6 border-[1px] border-gray-400/30 bg-white dark:bg-slate-800 rounded-md">
          <div class="w-full lg:w-3/5 p-4 border-e-[1px] border-gray-400/30">
            <div class="flex justify-between items-center py-2">
              <div class="flex flex-col xs:flex-row flex-wrap justify-start items-start xs:items-center gap-3">
                <div class="flex justify-start items-center gap-2">
                  <p class="font-bold text-slate-800 dark:text-slate-200">سفارش #{{ $order->id }}</p>
                  <p class="text-sm text-gray-400">{{ verta($order->created_at)->format('L F Y') }}</p>
                </div>
                @if ($order->status === 'in-progress')
                  <span class="text-xs py-1 px-2 bg-blue-600 text-slate-200 rounded-md">
                    {{ __('messages.in-progress') }}
                  </span>
                @endif
                @if ($order->status === 'waiting')
                  <span class="text-xs py-1 px-2 bg-yellow-600 text-slate-200 rounded-md">
                    {{ __('messages.waiting') }}
                  </span>
                @endif
                @if ($order->status === 'sending')
                  <span class="text-xs py-1 px-2 bg-purple-600 text-slate-200 rounded-md">
                    {{ __('messages.sending') }}
                  </span>
                @endif
                @if ($order->status === 'delivered')
                  <span class="text-xs py-1 px-2 bg-green-600 text-slate-200 rounded-md">
                    {{ __('messages.delivered') }}
                  </span>
                @endif
                @if ($order->status === 'failure')
                  <span class="text-xs py-1 px-2 bg-red-600 text-slate-200 rounded-md">
                    {{ __('messages.failure') }}
                  </span>
                @endif
              </div>
              <p class="text-lg font-bold text-slate-800 dark:text-slate-200">{{ number_format($order->sum_price()) }}
                تومان</p>
            </div>
            <div class="mt-4">
              @foreach ($order->order_items->slice(0, 3) as $order_item)
                <div class="flex justify-between items-center p-3 border-t-[1px] border-gray-400/30">
                  <div class="flex justify-start items-center gap-2">
                    <div class="hidden xs:block">
                      <img src="{{ route('product-images', ['slug' => $order_item->product->slug]) }}"
                        alt="order-item-image" class="w-12 h-12">
                    </div>
                    <div>
                      <p class="text-slate-800 dark:text-slate-200 text-sm font-bold mb-1">
                        {{ $order_item->product->name }} <span class="text-slate-700 dark:text-gray-400">×
                          {{ $order_item->quantity }}</span>
                      </p>
                      <p class="text-primary font-semibold">
                        {{ $order_item->product->discount ? number_format($order_item->product->discount_price()) : number_format($order_item->product->price) }}
                        تومان</p>
                      @if ($order_item->product->discount)
                        <p class="text-xs text-gray-400 line-through">{{ number_format($order_item->product->price) }}
                          تومان
                        </p>
                      @endif
                    </div>
                  </div>
                  <div>
                    <p class="text-xs text-gray-400">جمع کل</p>
                    <p class="font-extrabold text-slate-800 dark:text-slate-200">
                      {{ number_format($order_item->total_price()) }} تومان</p>
                  </div>
                </div>
              @endforeach
              @if (count($order->order_items) > 3)
                <p class="text-xxs text-primary text-center">(ادامه در جزئیات سفارش)</p>
              @endif
            </div>
          </div>
          <div class="relative flex items-end gap-2 xs:gap-0 w-full lg:w-2/5 p-4 h-full overflow-hidden">
            <a href="{{ route('invoice', ['order' => $order->id]) }}"
              class="group absolute start-4 top-4 w-8 hover:w-24 p-2 hidden lg:flex justify-between items-center bg-submit text-slate-200 rounded-full overflow-hidden transition-all duration-200">
              <span class="flex justify-center items-center w-4">
                <i class="fas fa-file-invoice"></i>
              </span>
              <span
                class="absolute left-2 text-xs text-slate-200 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">صورتحساب</span>
            </a>

            <div class="relative flex lg:hidden justify-between w-4/5">
              <a href="{{ route('invoice', ['order' => $order->id]) }}"
                class="block w-full text-sm text-center text-slate-200 bg-submit hover:bg-submit/80 py-2 px-6 rounded-full transition-all duration-150">صورتحساب</a>
            </div>
            <div
              class="hidden xs:flex justify-center items-center static lg:absolute left-0 top-1/2 translate-x-0 translate-y-0 lg:-translate-x-1/2 lg:-translate-y-1/2 w-full h-full">
              <div class="hidden lg:block">
                <x-svg.nephos size="full" fill="gray-400" opacity="40" />
              </div>
              <div class="block lg:hidden">
                <x-svg.nephos size="10" fill="gray-400" opacity="40" />
              </div>
              <span class="opacity-40"></span>
            </div>
            <div class="relative flex justify-between w-4/5">
              <a href="{{ route('order', ['order' => $order->id]) }}"
                class="block w-full text-sm text-center text-slate-200 glow-primary glow-hover whitespace-nowrap bg-primary hover:bg-primary/80 py-2 px-6 rounded-full transition-all duration-150">جزئیات
                سفارش</a>
            </div>
          </div>
        </div>
      @endforeach
    @else
      <x-empty-orders />
    @endif
  </div>
</x-dashboard-layout>
