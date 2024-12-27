<x-layout>
  <div class="flex justify-center min-h-screen">
    <div class="sm:hidden fixed bottom-0 right-0 flex justify-center items-center w-full z-20">
      <div
        class="flex justify-around items-center px-4 w-full h-12 bg-slate-300 dark:bg-slate-950 rounded-sm transition-all duration-250">
        <a href="{{ route('admin.user.dashboard', ['user' => $userId]) }}"
          class="flex flex-col justify-between items-center w-6 h-18 {{ url()->current() == route('admin.user.dashboard', ['user' => $userId]) || url()->current() == route('admin.user.edit', ['user' => $userId]) || url()->current() == route('create-product') ? 'text-primary glow-primary' : 'text-gray-400 dark:text-slate-400' }} hover:text-primary transition-all duration-200">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="w-[20px] h-[20px] feather feather-user">
            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
            <circle cx="12" cy="7" r="4"></circle>
          </svg>
          <p class="text-xxs xxs:text-xs whitespace-nowrap">حساب</p>
        </a>
        <a href="{{ route('admin.user.orders', ['user' => $userId]) }}"
          class="flex flex-col justify-between items-center w-6 h-18 {{ url()->current() == route('admin.user.orders', ['user' => $userId]) ? 'text-primary glow-primary' : 'text-gray-400 dark:text-slate-400' }} hover:text-primary transition-all duration-200">
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
        <a href="{{ route('admin.user.comments', ['user' => $userId]) }}"
          class="flex flex-col justify-between items-center w-6 h-18 {{ url()->current() === route('admin.user.comments', ['user' => $userId]) ? 'text-primary glow-primary' : 'text-gray-400 dark:text-slate-400' }} hover:text-primary transition-all duration-200">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-messages-square">
            <path d="M14 9a2 2 0 0 1-2 2H6l-4 4V4c0-1.1.9-2 2-2h8a2 2 0 0 1 2 2z" />
            <path d="M18 9h2a2 2 0 0 1 2 2v11l-4-4h-6a2 2 0 0 1-2-2v-1" />
          </svg>
          <p class="text-xxs xxs:text-xs whitespace-nowrap">کامنت ها</p>
        </a>
        <a href="{{ route('admin.user.products', ['user' => $userId]) }}"
          class="flex flex-col justify-between items-center w-6 h-18 {{ url()->current() === route('admin.user.products', ['user' => $userId]) ? 'text-primary glow-primary' : 'text-gray-400 dark:text-slate-400' }} hover:text-primary transition-all duration-200">
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
      <div class="flex justify-between items-center relative my-12">
        <img src="/img/svg/nephos-grayscale.svg" alt="nephos-gray"
          class="absolute w-20 h-20 opacity-40 dark:opacity-100 right-0 top-1/2 translate-x-1/2 -translate-y-1/2 z-10">
        <h1 class="relative text-3xl text-slate-700 dark:text-slate-200 z-20">{{ $header }}</h1>
        <a href="
          @if (url()->previous() === route('admin.orders')) {{ route('admin.orders') }}
          @elseif (url()->previous() === route('admin.comments')) {{ route('admin.comments') }}
          @elseif (url()->previous() === route('admin.users')) {{ route('admin.users') }}
          @elseif (url()->previous() === route('admin.products')) {{ route('admin.products') }}
          @else {{ route('admin.users') }} @endif
         "
          class="group/arrowlink flex justify-start items-center text-xs ml-0 xs:ml-4">
          <span class="ml-2 text-gray-400 group-hover/arrowlink:text-primary transition-all duration-150">بازگشت</span>
          <svg height="18" width="18" version="1.1"
            class="group-hover/arrowlink:-translate-x-2 fill-gray-400 group-hover/arrowlink:fill-primary transition-all duration-150"
            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 330 330"
            xml:space="preserve">
            <path id="XMLID_308_"
              d="M315,150H105V90c0-6.067-3.655-11.537-9.26-13.858c-5.606-2.322-12.058-1.038-16.347,3.252l-75,75c-5.858,5.858-5.858,15.355,0,21.213l75,75c2.87,2.87,6.705,4.394,10.61,4.394c1.932,0,3.881-0.374,5.737-1.142c5.605-2.322,9.26-7.791,9.26-13.858v-60h210c8.284,0,15-6.716,15-15C330,156.716,323.284,150,315,150z M75,203.787L36.213,165L75,126.213V203.787z" />
          </svg>
        </a>
      </div>
      <div class="sm:flex hidden justify-start items-center border-b-gray-400/50 border-b-[1px] mb-6">
        <a href="{{ route('admin.user.dashboard', ['user' => $userId]) }}"
          class="relative sm:text-base text-sm py-3 px-4 after:absolute after:content-[''] after:bottom-0 after:right-0 after:translate-y-2/3 after:w-full {{ url()->current() == route('admin.user.dashboard', ['user' => $userId]) || url()->current() == route('admin.user.edit', ['user' => $userId]) || url()->current() == route('create-product') ? 'text-primary glow-primary after:h-[2px] after:bg-primary' : 'after:h-px text-gray-400 after:bg-transparent hover:after:bg-gray-400 hover:after:h-[2px]' }}">حساب</a>
        <a href="{{ route('admin.user.orders', ['user' => $userId]) }}"
          class="relative sm:text-base text-sm py-3 px-4 after:absolute after:content-[''] after:bottom-0 after:right-0 after:translate-y-2/3 after:w-full {{ url()->current() == route('admin.user.orders', ['user' => $userId]) ? 'text-primary glow-primary after:h-[2px] after:bg-primary' : 'after:h-px text-gray-400 after:bg-transparent hover:after:bg-gray-400 hover:after:h-[2px]' }}">
          سفارشات
        </a>
        <a href="{{ route('admin.user.comments', ['user' => $userId]) }}"
          class="relative sm:text-base text-sm py-3 px-4 after:absolute after:content-[''] after:bottom-0 after:right-0 after:translate-y-2/3 after:w-full {{ url()->current() == route('admin.user.comments', ['user' => $userId]) ? 'text-primary glow-primary after:h-[2px] after:bg-primary' : 'after:h-px text-gray-400 after:bg-transparent hover:after:bg-gray-400 hover:after:h-[2px]' }}">
          کامنت ها
        </a>
        <a href="{{ route('admin.user.products', ['user' => $userId]) }}"
          class="relative sm:text-base text-sm py-3 px-4 after:absolute after:content-[''] after:bottom-0 after:right-0 after:translate-y-2/3 after:w-full {{ url()->current() == route('admin.user.products', ['user' => $userId]) ? 'text-primary glow-primary after:h-[2px] after:bg-primary' : 'after:h-px text-gray-400 after:bg-transparent hover:after:bg-gray-400 hover:after:h-[2px]' }}">
          محصولات
        </a>
      </div>
      <div class="sm:mb-0 mb-20">
        {{ $slot }}
      </div>
    </div>
  </div>
</x-layout>
