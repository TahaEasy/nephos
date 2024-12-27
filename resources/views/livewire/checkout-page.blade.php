<div>
  <div class="flex flex-col mmd:flex-row justify-between items-start">
    <div class="w-full mmd:w-3/5 llg:w-[72%]">
      <div class="flex justify-between items-center py-4 h-16 px-8 shadow-md bg-white dark:bg-slate-800">
        <h1 class="visible mmd:opacity-0 mmd:invisible text-slate-900 dark:text-slate-200 opacity-100">تسویه حساب</h1>
        <a href="{{ route('cart') }}"
          class="opacity-100 visible mmd:opacity-0 mmd:invisible text-xs bg-transparent px-4 py-2 rounded-full border-[1px] hover:border-slate-400 hover:text-slate-400 dark:hover:border-gray-400 dark:hover:text-gray-400 border-primary text-primary dark:border-primary dark:text-primary transition-all duration-150">بازگشت</a>
      </div>
      <div class="px-4 llg:px-44">
        <div class="mt-8">
          <div class="grid grid-cols-6">
            <p class="text-xs text-gray-400 col-span-1 xs:col-span-2">محصول</p>
            <p class="text-center text-xs text-gray-400">تعداد</p>
            <p class="text-center text-xs text-gray-400">قیمت</p>
            <p class="hidden xs:block text-center text-xs text-gray-400">تخفیف</p>
            <p class="text-center text-xs text-gray-400 col-span-2 xs:col-span-1">جمع کل</p>
          </div>
        </div>
        <div class="flex flex-col gap-2 mt-4">
          @foreach ($cart_items as $cart_item)
            <livewire:checkout-page-item :$cart_item wire:key="{{ $cart_item->id }}" />
          @endforeach
        </div>
        <div class="my-8 border-dashed border-2 border-gray-400/50 rounded-md w-full p-4">
          <p class="text-slate-800 dark:text-slate-200 text-sm font-bold">اعمال کد تخفیف</p>
          <p class="text-gray-400 text-sm font-medium">کد خود را وارد کنید. ضمن اینکه کد ها فقط یک بار قابل استفاده
            هستند.</p>
          <div>
            <div class="relative text-right w-full mt-2 overflow-hidden">
              <input type="text" autocomplete="off" name="coupon" id="coupon"
                placeholder="اینجا کد تخفیف را بنویسید" wire:model.live="coupon"
                class="peer text-sm xs:text-base outline-none rounded-sm dark:bg-slate-800 dark:text-slate-200 border-[1px] w-full py-2 pe-2 ps-11 @error('coupon') border-red-600 @else dark:border-gray-700 focus:dark:border-gray-300 border-gray-300 hover:border-gray-400 focus:border-gray-700 @enderror transition-all duration-200">
              <button type="button"
                class="absolute left-0 top-1/2 -translate-y-1/2 block text-center glow-primary glow-hover bg-primary py-3 px-4 xs:px-8 rounded-sm xs:rounded-r-3xl text-slate-200 text-sm w-fit hover:rounded-r-sm hover:bg-primary/80 transition-all duration-200">
                <span class="hidden xs:block">اعمال تخفیف</span>
                <span class="flex xs:hidden justify-center items-center text-white">
                  <i class="fas fa-check"></i>
                </span>
              </button>
              <span
                class="absolute start-4 top-1/2 -translate-y-1/2 @error('name') text-red-600 @else text-gray-300 @enderror peer-focus:text-primary ransition-all duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="feather feather-tag">
                  <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path>
                  <line x1="7" y1="7" x2="7.01" y2="7"></line>
                </svg>
              </span>
              @error('coupon')
                <p class="text-xs text-red-600 mt-1 mb-2">{{ $message }}</p>
              @enderror
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="w-full mmd:w-2/5 llg:w-[28%] min-h-screen bg-gray-400/20 dark:bg-slate-900 flex flex-col justify-start">
      <div class="hidden mmd:flex justify-between items-center h-16 py-4 px-8 shadow-md bg-white dark:bg-slate-800">
        <h1 class="text-slate-900 dark:text-slate-200">تسویه حساب</h1>
        <a href="{{ route('cart') }}"
          class="text-xs bg-transparent px-4 py-2 rounded-full border-[1px] hover:border-slate-400 hover:text-slate-400 dark:hover:border-gray-400 dark:hover:text-gray-400 border-primary text-primary dark:border-primary dark:text-primary transition-all duration-150">بازگشت</a>
      </div>
      <div class="flex flex-col justify-between px-8 py-4 h-full">
        <div>
          <div
            class="flex justify-start items-center p-4 border-[1px] border-slate-800/30 bg-white dark:bg-slate-800 rounded-md">
            <div class="flex justify-start items-center gap-2">
              <div>
                <img src="{{ route('user-avatar', ['user' => auth()->id()]) }}" alt="user-avatar" class="w-11 h-11">
              </div>
              <div>
                <p class="text-gray-400 text-xs font-medium">پرداخت به عنوان</p>
                <p class="text-sm font-bold text-slate-800 dark:text-slate-200">{{ auth()->user()->name() }}</p>
              </div>
            </div>
          </div>
          <div class="text-start p-4 my-2 border-[1px] border-slate-800/30 bg-white dark:bg-slate-800 rounded-md">
            <p class="text-gray-400 mb-4 text-xs font-medium">آدرس ارسال</p>
            <p class="text-sm text-slate-900 dark:text-slate-200">استان {{ auth()->user()->province ?? '- - -' }}،
              شهر {{ auth()->user()->city ?? '- - -' }}</p>
            <p class="text-sm text-slate-900 dark:text-slate-200">خیابان {{ auth()->user()->street ?? '- - -' }}، کوچه
              {{ auth()->user()->alley ?? '- - -' }}</p>
            <p class="text-sm text-slate-900 dark:text-slate-200">کد پستی: {{ auth()->user()->post_code ?? '- - -' }}،
              پلاک: {{ auth()->user()->plaque ?? '- - -' }}
            </p>
            <p class="text-sm text-slate-900 dark:text-slate-200">شماره همراه:
              {{ auth()->user()->phone ?? '- - -' }}</p>
          </div>
          <div class="text-start p-4 my-2 border-[1px] border-slate-800/30 bg-white dark:bg-slate-800 rounded-md">
            <p class="text-gray-400 mb-4 text-xs font-medium">اطلاعات پرداخت</p>
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
              <p class="text-slate-900 dark:text-slate-200 font-semibold">مبلغ کل</p>
              <p class="text-slate-900 dark:text-slate-200 font-semibold">
                {{ number_format($total_price) }} تومان
              </p>
            </div>
          </div>
          <div class="text-start p-4 my-2 border-[1px] border-slate-800/30 bg-white dark:bg-slate-800 rounded-md">
            <p class="text-gray-400 mb-4 text-xs font-medium">سلب مسئولیت</p>
            <p class="text-slate-800 dark:text-slate-200 text-sm">با کلیک بر روی "تایید و پرداخت" من با <a
                href="javascript:void(0)" class="inline text-gray-400 hover:underline hover:text-primary">شرایط
                خدمات</a> و <a href="javascript:void(0)"
                class="inline text-gray-400 hover:underline hover:text-primary">سیاست خرید</a>
              نفوس موافقت
              میکنم.</p>
            <div class="flex justify-start items-center mt-2">
              <div
                class="relative flex justify-center items-center w-7 h-7 rounded-full border-[1px] border-slate-400/50">
                <input type="checkbox" id="accept" wire:click="accepted"
                  class="peer absolute top-0 left-0 w-full h-full opacity-0 cursor-pointer z-10">
                <div
                  class="overflow-hidden flex justify-center items-center w-8 h-7 p-1 text-slate-200 bg-primary shadow-lg shadow-primary rounded-full opacity-0 peer-checked:opacity-100 transition-all duration-200">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"></polyline>
                  </svg>
                </div>
              </div>
              <label for="accept" class="text-sm text-slate-800 dark:text-slate-200 ps-1">موافقم</label>
            </div>
          </div>
        </div>
        @if (auth()->user()->is_address_incomplete())
          <p class="text-xs text-center text-red-600">اطلاعات آدرس ارسال کامل نیستند! به داشبورد رفته و آنها را کامل
            کنید!
          </p>
          <button type="button" disabled
            class="block mt-2 text-center bg-gray-500 !shadow-none pointer-events-none text-slate-200 py-3 rounded-full hover:bg-primary/80 text-sm w-full transition-all duration-150">تایید
            و
            پرداخت</button>
        @else
          <form action="{{ route('add_order') }}" method="POST" class="mb-2">
            @csrf
            <button wire:loading.attr="disabled"
              class="block mt-2 text-center @if ($accept == false) !bg-gray-500 !shadow-none pointer-events-none @else glow-primary glow-hover @endif bg-primary text-slate-200 py-3 rounded-full hover:bg-primary/80 text-sm w-full transition-all duration-150">تایید
              و
              پرداخت</button>
          </form>
        @endif
      </div>
    </div>
  </div>
</div>
