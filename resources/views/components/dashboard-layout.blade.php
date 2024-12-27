<x-layout>
  <div class="flex justify-center min-h-screen">
    <div class="sm:hidden fixed bottom-0 right-0 flex justify-center items-center w-full z-20">
      <div
        class="flex justify-around items-center px-4 w-full h-12 bg-slate-300 dark:bg-slate-950 rounded-sm transition-all duration-250">
        <a href="{{ route('dashboard') }}"
          class="flex flex-col justify-between items-center w-6 h-18 {{ url()->current() == route('dashboard') || url()->current() == route('edit_account') || url()->current() == route('create-product') ? 'text-primary glow-primary' : 'text-gray-400 dark:text-slate-400' }} hover:text-primary transition-all duration-200">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="w-[20px] h-[20px] feather feather-user">
            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
            <circle cx="12" cy="7" r="4"></circle>
          </svg>
          <p class="text-xxs xxs:text-xs whitespace-nowrap">حساب</p>
        </a>
        <a href="{{ route('wishlist') }}"
          class="flex flex-col justify-between items-center w-6 h-18 {{ url()->current() == route('wishlist') ? 'text-primary glow-primary' : 'text-gray-400 dark:text-slate-400' }} hover:text-primary transition-all duration-200">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="w-[20px] h-[20px] feather feather-heart">
            <path
              d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
            </path>
          </svg>
          <p class="text-xxs xxs:text-xs whitespace-nowrap">علاقه مندی</p>
        </a>
        <a href="{{ route('cart') }}"
          class="flex flex-col justify-between items-center w-6 h-18 {{ url()->current() == route('cart') ? 'text-primary glow-primary' : 'text-gray-400 dark:text-slate-400' }} hover:text-primary transition-all duration-200">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="w-[20px] h-[20px] feather feather-shopping-cart">
            <circle cx="9" cy="21" r="1"></circle>
            <circle cx="20" cy="21" r="1"></circle>
            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
          </svg>
          <p class="text-xxs xxs:text-xs whitespace-nowrap">سبد خرید</p>
        </a>
        <a href="{{ route('orders') }}"
          class="flex flex-col justify-between items-center w-6 h-18 {{ url()->current() == route('orders') ? 'text-primary glow-primary' : 'text-gray-400 dark:text-slate-400' }} hover:text-primary transition-all duration-200">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="w-[20px] h-[20px] feather feather-credit-card">
            <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
            <line x1="1" y1="10" x2="23" y2="10"></line>
          </svg>
          <p class="text-xxs xxs:text-xs whitespace-nowrap">سفارشات</p>
        </a>
      </div>
    </div>
    <div class="container lg:px-24 px-2 pt-4">
      <div class="relative my-12">
        <img src="/img/svg/nephos-grayscale.svg" alt="nephos-gray"
          class="absolute w-20 h-20 opacity-40 dark:opacity-100 right-0 top-1/2 translate-x-1/2 -translate-y-1/2 z-10">
        <h1 class="relative text-3xl text-slate-700 dark:text-slate-200 z-20">{{ $header }}</h1>
      </div>
      <div class="sm:flex hidden justify-start items-center border-b-gray-400/50 border-b-[1px] mb-6">
        <a href="/dashboard/"
          class="relative sm:text-base text-sm py-3 px-4 after:absolute after:content-[''] after:bottom-0 after:right-0 after:translate-y-2/3 after:w-full {{ url()->current() == route('dashboard') || url()->current() === route('edit_account') || url()->current() == route('create-product') ? 'text-primary glow-primary after:h-[2px] after:bg-primary' : 'after:h-px text-gray-400 after:bg-transparent hover:after:bg-gray-400 hover:after:h-[2px]' }}">حساب</a>
        <a href="/dashboard/wishlist"
          class="relative sm:text-base text-sm py-3 px-4 after:absolute after:content-[''] after:bottom-0 after:right-0 after:translate-y-2/3 after:w-full {{ url()->current() == route('wishlist') ? 'text-primary glow-primary after:h-[2px] after:bg-primary' : 'after:h-px text-gray-400 after:bg-transparent hover:after:bg-gray-400 hover:after:h-[2px]' }}">لیست
          علاقه مندی</a>
        <a href="/dashboard/cart"
          class="relative sm:text-base text-sm py-3 px-4 after:absolute after:content-[''] after:bottom-0 after:right-0 after:translate-y-2/3 after:w-full {{ url()->current() == route('cart') ? 'text-primary glow-primary after:h-[2px] after:bg-primary' : 'after:h-px text-gray-400 after:bg-transparent hover:after:bg-gray-400 hover:after:h-[2px]' }}">
          سبد خرید
        </a>
        <a href="/dashboard/orders"
          class="relative sm:text-base text-sm py-3 px-4 after:absolute after:content-[''] after:bottom-0 after:right-0 after:translate-y-2/3 after:w-full {{ url()->current() == route('orders') ? 'text-primary glow-primary after:h-[2px] after:bg-primary' : 'after:h-px text-gray-400 after:bg-transparent hover:after:bg-gray-400 hover:after:h-[2px]' }}">
          سفارشات
        </a>
      </div>
      <div class="sm:mb-0 mb-20">
        {{ $slot }}
      </div>
    </div>
  </div>
</x-layout>
