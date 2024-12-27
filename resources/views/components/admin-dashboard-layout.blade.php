<x-layout>
  <div class="flex justify-center min-h-screen">
    <div class="sm:hidden fixed bottom-0 right-0 flex justify-center items-center w-full z-20">
      <div
        class="flex justify-around items-center px-4 w-full h-12 bg-slate-300 dark:bg-slate-950 rounded-sm transition-all duration-250">
        <a href="{{ route('admin.orders') }}"
          class="flex flex-col justify-between items-center w-6 h-18 {{ url()->current() == route('admin.orders') ? 'text-primary glow-primary' : 'text-gray-400 dark:text-slate-400' }} hover:text-primary transition-all duration-200">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-receipt-text">
            <path d="M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1Z" />
            <path d="M14 8H8" />
            <path d="M16 12H8" />
            <path d="M13 16H8" />
          </svg>
          <p class="text-xxs xxs:text-xs whitespace-nowrap">سفارشات</p>
        </a>
        <a href="{{ route('admin.comments') }}"
          class="flex flex-col justify-between items-center w-6 h-18 {{ url()->current() == route('admin.comments') ? 'text-primary glow-primary' : 'text-gray-400 dark:text-slate-400' }} hover:text-primary transition-all duration-200">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-messages-square">
            <path d="M14 9a2 2 0 0 1-2 2H6l-4 4V4c0-1.1.9-2 2-2h8a2 2 0 0 1 2 2z" />
            <path d="M18 9h2a2 2 0 0 1 2 2v11l-4-4h-6a2 2 0 0 1-2-2v-1" />
          </svg>
          <p class="text-xxs xxs:text-xs whitespace-nowrap">کامنت ها</p>
        </a>
        <a href="{{ route('admin.users') }}"
          class="flex flex-col justify-between items-center w-6 h-18 {{ url()->current() == route('admin.users') ? 'text-primary glow-primary' : 'text-gray-400 dark:text-slate-400' }} hover:text-primary transition-all duration-200">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-users">
            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
            <circle cx="9" cy="7" r="4" />
            <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
          </svg>
          <p class="text-xxs xxs:text-xs whitespace-nowrap">کاربران</p>
        </a>
        <a href="{{ route('admin.products') }}"
          class="flex flex-col justify-between items-center w-6 h-18 {{ request()->segment(1) == 'admin' && request()->segment(2) == 'products' ? 'text-primary glow-primary' : 'text-gray-400 dark:text-slate-400' }} hover:text-primary transition-all duration-200">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-package-search">
            <path
              d="M21 10V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l2-1.14" />
            <path d="m7.5 4.27 9 5.15" />
            <polyline points="3.29 7 12 12 20.71 7" />
            <line x1="12" x2="12" y1="22" y2="12" />
            <circle cx="18.5" cy="15.5" r="2.5" />
            <path d="M20.27 17.27 22 19" />
          </svg>
          <p class="text-xxs xxs:text-xs whitespace-nowrap">محصولات</p>
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
        <a href="{{ route('admin.orders') }}"
          class="relative sm:text-base text-sm py-3 px-4 after:absolute after:content-[''] after:bottom-0 after:right-0 after:translate-y-2/3 after:w-full {{ url()->current() == route('admin.orders') ? 'text-primary glow-primary after:h-[2px] after:bg-primary' : 'after:h-px text-gray-400 after:bg-transparent hover:after:bg-gray-400 hover:after:h-[2px]' }}">سفارشات</a>
        <a href="{{ route('admin.comments') }}"
          class="relative sm:text-base text-sm py-3 px-4 after:absolute after:content-[''] after:bottom-0 after:right-0 after:translate-y-2/3 after:w-full {{ url()->current() == route('admin.comments') ? 'text-primary glow-primary after:h-[2px] after:bg-primary' : 'after:h-px text-gray-400 after:bg-transparent hover:after:bg-gray-400 hover:after:h-[2px]' }}">کامنت
          ها</a>
        <a href="{{ route('admin.users') }}"
          class="relative sm:text-base text-sm py-3 px-4 after:absolute after:content-[''] after:bottom-0 after:right-0 after:translate-y-2/3 after:w-full {{ url()->current() == route('admin.users') ? 'text-primary glow-primary after:h-[2px] after:bg-primary' : 'after:h-px text-gray-400 after:bg-transparent hover:after:bg-gray-400 hover:after:h-[2px]' }}">کاربران</a>
        <a href="{{ route('admin.products') }}"
          class="relative sm:text-base text-sm py-3 px-4 after:absolute after:content-[''] after:bottom-0 after:right-0 after:translate-y-2/3 after:w-full {{ request()->segment(1) == 'admin' && request()->segment(2) == 'products' ? 'text-primary glow-primary after:h-[2px] after:bg-primary' : 'after:h-px text-gray-400 after:bg-transparent hover:after:bg-gray-400 hover:after:h-[2px]' }}">محصولات</a>
      </div>
      <div class="sm:mb-0 mb-20">
        {{ $slot }}
      </div>
    </div>
  </div>
</x-layout>
