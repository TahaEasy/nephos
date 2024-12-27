<div>
  @if (count($cart_items) == 0)
    <div class="flex flex-col justify-center items-center py-10 text-center">
      <div>
        <x-svg.empty-cart />
      </div>
      <p class="text-slate-900 dark:text-slate-200 my-2 font-semibold">سبد خرید خالی است!</p>
      <p class="text-slate-700 dark:text-gray-400 text-sm max-w-96">سبد خرید شما در حال حاضر خالی است. شروع به افزودن
        محصولات کنید تا در
        نهایت بتوانید تسویه حساب کنید.</p>
      <a href="{{ route('shop') }}"
        class="block py-2 px-8 mt-2 w-fit text-primary shadow-lg shadow-transparent bg-transparent border-[1px] border-primary hover:bg-primary hover:text-slate-200 hover:shadow-primary rounded-full whitespace-nowrap transition-all duration-300">ادامه
        خرید</a>
    </div>
  @else
    <div class="flex lg:flex-row flex-col-reverse justify-between items-start gap-6 mb-6 relative">
      <div class="flex flex-col w-full lg:w-2/3 gap-4">
        @foreach (auth()->user()->cart->cart_items as $cart_item)
          <livewire:cart-page-item :$cart_item wire:key="{{ $cart_item->id }}" />
        @endforeach
      </div>
      <div
        class="flex flex-col w-full lg:w-1/3 gap-4 p-5 bg-white dark:bg-slate-800 rounded-sm hover:drop-shadow-xl lg:sticky static top-4 transition-all duration-300">
        <p class="text-slate-700 dark:text-slate-200 text-center"><span
            class="text-slate-900 dark:text-slate-300 text-lg font-semibold">{{ auth()->user()->cart->total_items() }}</span>
          محصول در سبد خرید</p>
        <div class="flex justify-between items-center">
          <p class="text-gray-500 text-sm font-semibold">جمع موارد</p>
          <p class="text-gray-400">{{ number_format($sum_price) }} تومان</p>
        </div>
        <div class="flex justify-between items-center">
          <p class="text-gray-500 text-sm font-semibold">مالیات</p>
          <p class="text-gray-400">
            {{ number_format($taxes) }} تومان
          </p>
        </div>
        <div class="flex justify-between items-center">
          <p class="text-gray-500 text-sm font-semibold">هزینه ارسال</p>
          <p class="text-gray-400">
            {{ number_format($shipping_price) }} تومان
          </p>
        </div>
        <div class="flex justify-between items-center">
          <p class="text-slate-900 dark:text-slate-200 text-lg font-semibold">مبلغ کل</p>
          <p class="text-slate-900 dark:text-slate-200 text-lg font-semibold">
            {{ number_format($total_price) }} تومان
          </p>
        </div>
        <div>
          <a href="{{ route('checkout') }}" class="block text-center bubbly-button text-sm w-full">تسویه حساب</a>
        </div>
      </div>
    </div>
  @endif
</div>
