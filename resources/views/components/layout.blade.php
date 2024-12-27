<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
  <link rel="stylesheet" href="/fontawesome/css/all.min.css">
  <title>
    @isset($title)
      نفوس - {{ $title }}
    @else
      سایت فروشگاهی نفوس
    @endisset
  </title>
  @vite('resources/css/app.css')
  @vite('resources/js/app.js')
  @vite('resources/js/colorPicker.js')
  @vite('resources/js/darkModeToggler.js')
</head>

<body class="overflow-hidden">
  <livewire:toasts />

  <div id="loading-page"
    class="fixed top-0 right-0 flex flex-col justify-center items-center gap-4 w-svw h-svh bg-slate-200 dark:bg-slate-800 overflow-hidden z-[99999999]">
    <span>
      <x-svg.loading w="150" h="150" />
    </span>
    <p class="flex justify-center items-center gap-1 mt-2 text-sm text-slate-800 dark:text-slate-200">
      <span>لطفا صبر کنید</span>
      <span class="animate-[pulse_1s_linear_infinite] w-1 h-1 rounded-full dark:bg-slate-200 bg-slate-800"></span>
      <span class="animate-[pulse_1s_linear_0.25s_infinite] w-1 h-1 rounded-full dark:bg-slate-200 bg-slate-800"></span>
      <span class="animate-[pulse_1s_linear_0.5s_infinite] w-1 h-1 rounded-full dark:bg-slate-200 bg-slate-800"></span>
    </p>
  </div>

  <div id="all-contents" class="hidden">
    {{-- Mobile Nav Bar --}}
    <div class="block sm:hidden">
      {{-- Navigation Bar --}}
      <div
        class="flex justify-between items-center py-2 px-4 shadow-2xl dark:shadow-slate-200/10 dark:shadow-lg fixed top-0 right-0 bg-white dark:bg-slate-900 w-full h-12 z-40">
        <div class="flex justify-start items-center gap-3">
          @if (auth()->user()?->is_admin)
            <div class="flex justify-center items-center">
              <button type="button"
                class="light-toggler group dark:flex hidden justify-center items-center p-2 w-10 h-10 rounded-full text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="lucide lucide-moon-star">
                  <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9" />
                  <path d="M20 3v4" class="animate-[pulse_1s_linear_infinite]" />
                  <path d="M22 5h-4" class="animate-[pulse_1s_linear_infinite]" />
                </svg>
              </button>
              <button type="button"
                class="dark-toggler group dark:hidden flex justify-center items-center animate-[spin_4s_linear_infinite] p-2 w-10 h-10 rounded-full text-yellow-500">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="lucide lucide-sun">
                  <circle cx="12" cy="12" r="4" />
                  <path d="M12 2v2" />
                  <path d="M12 20v2" />
                  <path d="m4.93 4.93 1.41 1.41" />
                  <path d="m17.66 17.66 1.41 1.41" />
                  <path d="M2 12h2" />
                  <path d="M20 12h2" />
                  <path d="m6.34 17.66-1.41 1.41" />
                  <path d="m19.07 4.93-1.41 1.41" />
                </svg>
              </button>
            </div>
          @else
            <div class="flex justify-center items-center w-4">
              @if (url()->current() === route('products.search'))
                <a href="javascript:void(0)"
                  class="animate-pulse flex justify-center items-center w-8 h-10 text-primary glow-primary pointer-events-none">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="fill-primary/20">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                  </svg>
                </a>
              @else
                <a href="javascript:void(0)"
                  class="open-search flex justify-center items-center w-8 h-10 text-gray-400 dark:text-slate-400 transition-all duration-100">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                  </svg>
                </a>
                <a href="javascript:void(0)"
                  class="close-search hidden justify-center items-center w-8 h-10 text-primary hover:text-primary/50 transition-all duration-100">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                  </svg>
                </a>
              @endif
            </div>
            <div class="absolute right-12 top-1 flex justify-center items-center">
              <button type="button"
                class="light-toggler group dark:flex hidden justify-center items-center p-2 w-10 h-10 rounded-full text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                  fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round" class="lucide lucide-moon-star">
                  <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9" />
                  <path d="M20 3v4" class="animate-[pulse_1s_linear_infinite]" />
                  <path d="M22 5h-4" class="animate-[pulse_1s_linear_infinite]" />
                </svg>
              </button>
              <button type="button"
                class="dark-toggler group dark:hidden flex justify-center items-center animate-[spin_4s_linear_infinite] p-2 w-10 h-10 rounded-full text-yellow-500">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                  fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round" class="lucide lucide-sun">
                  <circle cx="12" cy="12" r="4" />
                  <path d="M12 2v2" />
                  <path d="M12 20v2" />
                  <path d="m4.93 4.93 1.41 1.41" />
                  <path d="m17.66 17.66 1.41 1.41" />
                  <path d="M2 12h2" />
                  <path d="M20 12h2" />
                  <path d="m6.34 17.66-1.41 1.41" />
                  <path d="m19.07 4.93-1.41 1.41" />
                </svg>
              </button>
            </div>
          @endif
        </div>
        <div>
          <a href="/">
            <x-app-logo size="8" />
          </a>
        </div>
        <div>
          <a href="javascript:void(0)" class="block relative overflow-hidden w-4 h-4">
            <input type="checkbox" id="toggle-mobile-menu"
              class="peer cursor-pointer opacity-0 absolute z-20 top-0 left-0 w-full h-full">
            <span
              class="absolute w-full h-px bg-gray-500 dark:bg-slate-200 transition-all duration-150 top-[2px] peer-checked:top-1/2 peer-checked:rotate-45"></span>
            <span
              class="absolute w-full h-px bg-gray-500 dark:bg-slate-200 transition-all duration-150 peer-checked:opacity-0 top-1/2 -translate-y-1/2"></span>
            <span
              class="absolute w-full h-px bg-gray-500 dark:bg-slate-200 transition-all duration-150 bottom-[2px] peer-checked:bottom-1/2 peer-checked:translate-y-1/2 peer-checked:-rotate-45"></span>
          </a>
        </div>
      </div>
      {{-- Start Navigation Menu --}}
      <div class="fixed z-30 top-12 -translate-y-full w-full bg-slate-50 dark:bg-slate-800 transition-all duration-200"
        id="mobile-menu">
        <ul>
          @if (auth()->user()?->is_admin)
            <li
              class="border-slate-700/15 dark:border-slate-200/15 border-b-[1px] hover:bg-slate-100 dark:hover:bg-slate-600">
              <div class="flex justify-start items-center gap-2 px-4 py-3">
                <img src="{{ route('user-avatar', ['user' => auth()->id()]) }}" alt="guset"
                  class="w-8 h-8 rounded-full">
                <p class="text-xs text-slate-900 dark:text-white">
                  {{ auth()->user()->name() }} (ادمین)</p>
              </div>
            </li>
            <li class="relative overflow-hidden">
              <a href="{{ route('admin.orders') }}"
                class="peer block px-4 py-3 text-sm text-slate-900 dark:text-white hover:text-slate-800/75 dark:hover:text-slate-100/75 transition-colors duration-300">مدیریت
                سفارشات</a>
              <div
                class="pointer-events-none text-slate-800/75 dark:text-slate-100/75 absolute -left-12 -rotate-180 peer-hover:left-4 peer-hover:-rotate-360 top-1/2 -translate-y-1/2 transition-all duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                  fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round" class="lucide lucide-receipt-text">
                  <path d="M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1Z" />
                  <path d="M14 8H8" />
                  <path d="M16 12H8" />
                  <path d="M13 16H8" />
                </svg>
              </div>
            </li>
            <li class="relative overflow-hidden">
              <a href="{{ route('admin.comments') }}"
                class="peer block px-4 py-3 text-sm text-slate-900 dark:text-white hover:text-slate-800/75 dark:hover:text-slate-100/75 transition-colors duration-300">مدیریت
                کامنت ها</a>
              <div
                class="pointer-events-none text-slate-800/75 dark:text-slate-100/75 absolute -left-12 -rotate-180 peer-hover:left-4 peer-hover:-rotate-360 top-1/2 -translate-y-1/2 transition-all duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                  fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round" class="lucide lucide-messages-square">
                  <path d="M14 9a2 2 0 0 1-2 2H6l-4 4V4c0-1.1.9-2 2-2h8a2 2 0 0 1 2 2z" />
                  <path d="M18 9h2a2 2 0 0 1 2 2v11l-4-4h-6a2 2 0 0 1-2-2v-1" />
                </svg>
              </div>
            </li>
            <li class="relative overflow-hidden">
              <a href="{{ route('admin.users') }}"
                class="peer block px-4 py-3 text-sm text-slate-900 dark:text-white hover:text-slate-800/75 dark:hover:text-slate-100/75 transition-colors duration-300">مدیریت
                کاربران</a>
              <div
                class="pointer-events-none text-slate-800/75 dark:text-slate-100/75 absolute -left-12 -rotate-180 peer-hover:left-4 peer-hover:-rotate-360 top-1/2 -translate-y-1/2 transition-all duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                  fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round" class="lucide lucide-users">
                  <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                  <circle cx="9" cy="7" r="4" />
                  <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                  <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                </svg>
              </div>
            </li>
            <li class="relative overflow-hidden">
              <a href="{{ route('admin.products') }}"
                class="peer block px-4 py-3 text-sm text-slate-900 dark:text-white hover:text-slate-800/75 dark:hover:text-slate-100/75 transition-colors duration-300">مدیریت
                محصولات</a>
              <div
                class="pointer-events-none text-slate-800/75 dark:text-slate-100/75 absolute -left-12 -rotate-180 peer-hover:left-4 peer-hover:-rotate-360 top-1/2 -translate-y-1/2 transition-all duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                  fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round" class="lucide lucide-package-search">
                  <path
                    d="M21 10V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l2-1.14" />
                  <path d="m7.5 4.27 9 5.15" />
                  <polyline points="3.29 7 12 12 20.71 7" />
                  <line x1="12" x2="12" y1="22" y2="12" />
                  <circle cx="18.5" cy="15.5" r="2.5" />
                  <path d="M20.27 17.27 22 19" />
                </svg>
              </div>
            </li>
            <li class="relative overflow-hidden">
              <form action="/auth/logout" method="post">
                @csrf
                <button
                  class="peer block w-full text-start px-4 py-3 text-sm text-slate-900 dark:text-white hover:text-slate-800/75 dark:hover:text-slate-100/75 transition-colors duration-300">خروج</button>
                <div
                  class="pointer-events-none text-slate-800/75 dark:text-slate-100/75 absolute -left-12 -rotate-180 peer-hover:left-4 peer-hover:-rotate-360 top-1/2 -translate-y-1/2 transition-all duration-300">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="feather feather-log-out">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                    <polyline points="16 17 21 12 16 7"></polyline>
                    <line x1="21" y1="12" x2="9" y2="12"></line>
                  </svg>
                </div>
              </form>
            </li>
          @else
            <li
              class="border-slate-700/15 dark:border-slate-200/15 border-b-[1px] hover:bg-slate-100 dark:hover:bg-slate-600">
              <a href="{{ route('dashboard') }}" class="flex justify-between items-center px-4 py-3">
                @auth
                  <div class="flex justify-start items-center gap-2">
                    <img src="{{ route('user-avatar', ['user' => auth()->id()]) }}" alt="guset"
                      class="w-8 h-8 rounded-full">
                    <p class="text-xs text-slate-800 dark:text-slate-200">
                      {{ auth()->user()->name() }}</p>
                  </div>
                  <livewire:track-messages />
                @else
                  <div class="flex justify-start items-center gap-2">
                    <img src="/img/fallback-avatar.png" alt="guset" class="w-8 h-8 rounded-full">
                    <p class="text-xs text-slate-900 dark:text-white">خوش آمدید مهمان</p>
                  </div>
                @endauth
              </a>
            </li>
            <li class="relative overflow-hidden">
              <a href="{{ route('shop') }}"
                class="peer block px-4 py-3 text-sm text-slate-900 dark:text-white hover:text-slate-800/75 dark:hover:text-slate-100/75 transition-colors duration-300">فروشگاه</a>
              <div
                class="pointer-events-none text-slate-800/75 dark:text-slate-100/75 absolute -left-12 -rotate-180 peer-hover:left-4 peer-hover:-rotate-360 top-1/2 -translate-y-1/2 transition-all duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                  fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round" class="feather feather-grid">
                  <rect x="3" y="3" width="7" height="7"></rect>
                  <rect x="14" y="3" width="7" height="7"></rect>
                  <rect x="14" y="14" width="7" height="7"></rect>
                  <rect x="3" y="14" width="7" height="7"></rect>
                </svg>
              </div>
            </li>
            <li class="relative overflow-hidden">
              <a href="{{ route('products') }}"
                class="peer block px-4 py-3 text-sm text-slate-900 dark:text-white hover:text-slate-800/75 dark:hover:text-slate-100/75 transition-colors duration-300">تمامی
                محصولات</a>
              <div
                class="pointer-events-none text-slate-800/75 dark:text-slate-100/75 absolute -left-12 -rotate-180 peer-hover:left-4 peer-hover:-rotate-360 top-1/2 -translate-y-1/2 transition-all duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                  fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round" class="feather feather-box">
                  <path
                    d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                  </path>
                  <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                  <line x1="12" y1="22.08" x2="12" y2="12"></line>
                </svg>
              </div>
            </li>
            <li class="relative overflow-hidden">
              <a href="{{ route('cart') }}"
                class="peer block px-4 py-3 text-sm text-slate-900 dark:text-white hover:text-slate-800/75 dark:hover:text-slate-100/75 transition-colors duration-300">سبد
                خرید</a>
              <div
                class="flex justify-center items-center text-xs w-5 h-5 text-slate-900 hover:text-slate-800/75 dark:text-white dark:hover:text-slate-100/75 border-[1px] border-slate-900 hover:border-slate-800/75 dark:border-white dark:hover:border-slate-100/75 rounded-full absolute left-4 top-1/2 -translate-y-1/2 transition-all duration-300">
                <livewire:total-cart-items />
              </div>
            </li>
            <li class="relative overflow-hidden">
              <a href="{{ route('orders') }}"
                class="peer block px-4 py-3 text-sm text-slate-900 dark:text-white hover:text-slate-800/75 dark:hover:text-slate-100/75 transition-colors duration-300">سفارشات</a>
              <div
                class="pointer-events-none text-slate-800/75 dark:text-slate-100/75 absolute -left-12 -rotate-180 peer-hover:left-4 peer-hover:-rotate-360 top-1/2 -translate-y-1/2 transition-all duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                  fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round" class="feather feather-credit-card">
                  <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                  <line x1="1" y1="10" x2="23" y2="10"></line>
                </svg>
              </div>
            </li>
            <li class="relative overflow-hidden">
              <a href="{{ route('wishlist') }}"
                class="peer block px-4 py-3 text-sm text-slate-900 dark:text-white hover:text-slate-800/75 dark:hover:text-slate-100/75 transition-colors duration-300">لیست
                علاقه مندی</a>
              <div
                class="pointer-events-none text-slate-800/75 dark:text-slate-100/75 absolute -left-12 -rotate-180 peer-hover:left-4 peer-hover:-rotate-360 top-1/2 -translate-y-1/2 transition-all duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                  fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round" class="feather feather-heart">
                  <path
                    d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                  </path>
                </svg>
              </div>
            </li>
            <li class="relative overflow-hidden">
              @auth
                <form action="/auth/logout" method="post">
                  @csrf
                  <button
                    class="peer block w-full text-start px-4 py-3 text-sm text-slate-900 dark:text-white hover:text-slate-800/75 dark:hover:text-slate-100/75 transition-colors duration-300">خروج</button>
                  <div
                    class="pointer-events-none text-slate-800/75 dark:text-slate-100/75 absolute -left-12 -rotate-180 peer-hover:left-4 peer-hover:-rotate-360 top-1/2 -translate-y-1/2 transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                      fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                      stroke-linejoin="round" class="feather feather-log-out">
                      <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                      <polyline points="16 17 21 12 16 7"></polyline>
                      <line x1="21" y1="12" x2="9" y2="12"></line>
                    </svg>
                  </div>
                </form>
              @else
                <a href="/auth/login"
                  class="peer block px-4 py-3 text-sm text-slate-900 dark:text-white hover:text-slate-800/75 dark:hover:text-slate-100/75 transition-colors duration-300">ورود/ثبت
                  نام</a>
                <div
                  class="pointer-events-none text-slate-800/75 dark:text-slate-100/75 absolute -left-12 -rotate-180 peer-hover:left-4 peer-hover:-rotate-360 top-1/2 -translate-y-1/2 transition-all duration-300">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="feather feather-user">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                  </svg>
                </div>
              @endauth
            </li>
          @endif
        </ul>
      </div>
      {{-- End Navigation Menu --}}
    </div>

    {{-- Nav Bar --}}
    <div class="hidden sm:block">
      {{-- Navigation Bar --}}
      <div
        class="flex flex-col justify-start items-center space-y-12 py-2 px-4 shadow-2xl fixed top-0 right-0 bg-white dark:bg-slate-900 w-20 h-full z-40">
        <div>
          <a href="/" class="glow-primary/70 glow-hover transition-all duration-200">
            <x-app-logo size="12" />
          </a>
        </div>
        @if (!auth()->user()?->is_admin())
          <div>
            <a href="javascript:void(0)" id="open-shop"
              class="w-4 h-4 text-gray-400 dark:text-slate-400 hover:text-primary transition-all duration-200">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round">
                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                <polyline points="9 22 9 12 15 12 15 22"></polyline>
              </svg>
            </a>
          </div>
          <div>
            @if (url()->current() == route('cart') || url()->current() == route('checkout'))
              <a href="javascript:void(0)" class="w-4 h-4 text-primary glow-primary pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                  fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round" class="fill-primary/20 stroke-primary">
                  <circle cx="9" cy="21" r="1"></circle>
                  <circle cx="20" cy="21" r="1"></circle>
                  <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                </svg>
              </a>
            @else
              <a href="javascript:void(0)" id="open-cart"
                class="w-4 h-4 text-gray-400 dark:text-slate-400 glow-primary-0 hover:text-primary transition-all duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                  fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round">
                  <circle cx="9" cy="21" r="1"></circle>
                  <circle cx="20" cy="21" r="1"></circle>
                  <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                </svg>
              </a>
            @endif
          </div>
          <div class="relative">
            @if (url()->current() === route('products.search'))
              <a href="javascript:void(0)"
                class="flex justify-center items-center text-primary glow-primary pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                  fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round" class="fill-primary/20">
                  <circle cx="11" cy="11" r="8"></circle>
                  <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
              </a>
            @else
              <a href="javascript:void(0)"
                class="open-search flex justify-center items-center text-gray-400 dark:text-slate-400 hover:text-primary transition-all duration-100">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                  fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round">
                  <circle cx="11" cy="11" r="8"></circle>
                  <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
              </a>
              <a href="javascript:void(0)"
                class="close-search hidden justify-center items-center text-primary hover:text-primary/50 transition-all duration-100">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                  fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round">
                  <line x1="18" y1="6" x2="6" y2="18"></line>
                  <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
              </a>
            @endif
          </div>
        @else
          <a href="javascript:void(0)" id="open-shop"
            class="group relative flex justify-center items-center w-8 h-8 !mt-8 text-gray-400 dark:text-slate-400 transition-all duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="lucide lucide-menu">
              <line x1="4" x2="20" y1="12" y2="12" />
              <line x1="4" x2="20" y1="6" y2="6" />
              <line x1="4" x2="20" y1="18" y2="18" />
            </svg>
          </a>
        @endif

        {{-- Start Mode Toggler --}}
        <div class="absolute bottom-20">
          <button type="button" class="light-toggler group dark:block hidden text-gray-400 hover:text-gray-500">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="lucide lucide-moon-star">
              <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9" />
              <path d="M20 3v4" class="animate-[pulse_1s_linear_infinite]" />
              <path d="M22 5h-4" class="animate-[pulse_1s_linear_infinite]" />
            </svg>
          </button>
          <button type="button"
            class="dark-toggler group dark:hidden block animate-[spin_4s_linear_infinite] text-yellow-500 hover:text-yellow-600">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="lucide lucide-sun">
              <circle cx="12" cy="12" r="4" />
              <path d="M12 2v2" />
              <path d="m19.07 4.93-1.41 1.41" />
              <path d="M20 12h2" />
              <path d="m17.66 17.66 1.41 1.41" />
              <path d="M12 20v2" />
              <path d="m6.34 17.66-1.41 1.41" />
              <path d="M2 12h2" />
              <path d="m4.93 4.93 1.41 1.41" />
            </svg>
          </button>
        </div>
        {{-- End Mode Toggler --}}

        {{-- Start SignOut Btn --}}
        <div class="absolute bottom-8">
          @auth
            <form action="/auth/logout" method="post">
              @csrf
              <button class="w-4 h-4 text-gray-400 dark:text-slate-400 hover:text-primary transition-all duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                  fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round" class="feather feather-log-out">
                  <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                  <polyline points="16 17 21 12 16 7"></polyline>
                  <line x1="21" y1="12" x2="9" y2="12"></line>
                </svg>
              </button>
            </form>
          @else
            <a href="/auth/login"
              class="w-4 h-4 text-gray-400 dark:text-slate-400 hover:text-primary transition-all duration-200">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-user">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
              </svg>
            </a>
          @endauth
        </div>
        {{-- End SignOut Btn --}}
      </div>
      @if (!auth()->user()?->is_admin())
        {{-- Start Normal Shop Menu --}}
        <div id="shop-menu"
          class="w-[calc(100%-5rem)] sm:w-72 h-full fixed top-0 right-20 translate-x-full transition-all duration-300 z-30">
          <ul class="divide-slate-200/15 divide-y-[1px]">
            <li class="relative overflow-hidden">
              <p class="px-4 py-6 text-lg text-white">نــــــفــــــوس</p>
              <a href="javascript:void(0)" id="close-shop"
                class="block text-white absolute left-4 top-1/2 hover:rotate-90 -translate-y-1/2 transition-all duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                  fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round" class="feather feather-x">
                  <line x1="18" y1="6" x2="6" y2="18"></line>
                  <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
              </a>
            </li>
            <li class="relative overflow-hidden">
              <a href="{{ route('shop') }}"
                class="peer block px-4 py-6 text-xs text-white hover:text-slate-100/75 transition-colors duration-300">فروشگاه</a>
              <div
                class="pointer-events-none text-slate-100/75 absolute -left-12 -rotate-180 peer-hover:left-4 peer-hover:-rotate-360 top-1/2 -translate-y-1/2 transition-all duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                  fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round" class="feather feather-grid">
                  <rect x="3" y="3" width="7" height="7"></rect>
                  <rect x="14" y="3" width="7" height="7"></rect>
                  <rect x="14" y="14" width="7" height="7"></rect>
                  <rect x="3" y="14" width="7" height="7"></rect>
                </svg>
              </div>
            </li>
            <li class="relative overflow-hidden">
              <a href="{{ route('products') }}"
                class="peer block px-4 py-6 text-xs text-white hover:text-slate-100/75 transition-colors duration-300">تمامی
                محصولات</a>
              <div
                class="pointer-events-none text-slate-100/75 absolute -left-12 -rotate-180 peer-hover:left-4 peer-hover:-rotate-360 top-1/2 -translate-y-1/2 transition-all duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                  fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round" class="feather feather-box">
                  <path
                    d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                  </path>
                  <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                  <line x1="12" y1="22.08" x2="12" y2="12"></line>
                </svg>
              </div>
            </li>
            <li class="relative overflow-hidden">
              <a href="{{ auth()->user()?->is_admin() ? route('admin.orders') : route('dashboard') }}"
                class="peer flex justify-start items-center gap-2 px-4 py-6 text-xs text-white hover:text-slate-100/75 transition-colors duration-300">
                <span>حساب کاربری</span>
                @auth
                <livewire:track-messages />
                @endauth
              </a>
              <div
                class="pointer-events-none text-slate-100/75 absolute -left-12 -rotate-180 peer-hover:left-4 peer-hover:-rotate-360 top-1/2 -translate-y-1/2 transition-all duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                  fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round" class="feather feather-user">
                  <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                  <circle cx="12" cy="7" r="4"></circle>
                </svg>
              </div>
            </li>
            @if (!auth()->user()?->is_admin())
              <li class="relative overflow-hidden">
                <a href="{{ route('orders') }}"
                  class="peer block px-4 py-6 text-xs text-white hover:text-slate-100/75 transition-colors duration-300">سفارشات
                </a>
                <div
                  class="pointer-events-none text-slate-100/75 absolute -left-12 -rotate-180 peer-hover:left-4 peer-hover:-rotate-360 top-1/2 -translate-y-1/2 transition-all duration-300">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="feather feather-credit-card">
                    <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                    <line x1="1" y1="10" x2="23" y2="10"></line>
                  </svg>
                </div>
              </li>
              <li class="relative overflow-hidden">
                <a href="{{ route('wishlist') }}"
                  class="peer block px-4 py-6 text-xs text-white hover:text-slate-100/75 transition-colors duration-300">لیست
                  علاقه مندی</a>
                <div
                  class="pointer-events-none text-slate-100/75 absolute -left-12 -rotate-180 peer-hover:left-4 peer-hover:-rotate-360 top-1/2 -translate-y-1/2 transition-all duration-300">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="feather feather-heart">
                    <path
                      d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                    </path>
                  </svg>
                </div>
              </li>
            @endif
          </ul>
          <div class="flex justify-start items-center gap-2 absolute bottom-6 right-4">
            @auth
              <img src="{{ route('user-avatar', ['user' => auth()->id()]) }}" alt="guest"
                class="w-8 h-8 rounded-full">
            @else
              <img src="/img/fallback-avatar.png" alt="guest" class="w-8 h-8 rounded-full">
            @endauth
            <a href="{{ auth()->user()?->is_admin() ? route('admin.orders') : route('dashboard') }}"
              class="group block">
              @auth
                <p class="text-sm text-slate-200 group-hover:text-gray-400">
                  {{ auth()->user()->name() }}</p>
              @else
                <p class="text-sm text-slate-200 group-hover:text-gray-400">خوش آمدید مهمان</p>
              @endauth
              @if (auth()->user()?->is_admin())
                <p class="text-xs text-slate-200 group-hover:text-gray-400">خوش آمدید
                  ادمین </p>
              @else
                <p class="text-xs text-slate-200 group-hover:text-gray-400"><livewire:total-cart-items />
                  کالا در سبد خرید</p>
              @endif
            </a>
          </div>
        </div>
        {{-- End Normal Shop Menu --}}
        {{-- Start Cart Menu --}}
        <div id="cart-menu"
          class="bg-white dark:bg-slate-800 w-[calc(100%-5rem)] sm:w-96 h-full fixed top-0 right-20 translate-x-full transition-all duration-300 z-30">
          @livewire('shop-menu')
        </div>
        {{-- End Cart Menu --}}
      @else
        {{-- Start Admin Shop Menu --}}
        <div id="shop-menu"
          class="w-[calc(100%-5rem)] sm:w-72 h-full fixed top-0 right-20 translate-x-full transition-all duration-300 z-30">
          <ul class="divide-slate-200/15 divide-y-[1px]">
            <li class="relative overflow-hidden">
              <p class="px-4 py-6 text-lg text-white">نــــــفــــــوس</p>
              <a href="javascript:void(0)" id="close-shop"
                class="block text-white absolute left-4 top-1/2 hover:rotate-90 -translate-y-1/2 transition-all duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                  fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round" class="feather feather-x">
                  <line x1="18" y1="6" x2="6" y2="18"></line>
                  <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
              </a>
            </li>
            <li class="relative overflow-hidden">
              <a href="{{ route('admin.orders') }}"
                class="peer block px-4 py-6 text-xs text-white hover:text-slate-100/75 transition-colors duration-300">مدیریت
                سفارشات</a>
              <div
                class="pointer-events-none text-slate-100/75 absolute -left-12 -rotate-180 peer-hover:left-4 peer-hover:-rotate-360 top-1/2 -translate-y-1/2 transition-all duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                  fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round" class="lucide lucide-receipt-text">
                  <path d="M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1Z" />
                  <path d="M14 8H8" />
                  <path d="M16 12H8" />
                  <path d="M13 16H8" />
                </svg>
              </div>
            </li>
            <li class="relative overflow-hidden">
              <a href="{{ route('admin.orders') }}"
                class="peer block px-4 py-6 text-xs text-white hover:text-slate-100/75 transition-colors duration-300">مدیریت
                کامنت ها</a>
              <div
                class="pointer-events-none text-slate-100/75 absolute -left-12 -rotate-180 peer-hover:left-4 peer-hover:-rotate-360 top-1/2 -translate-y-1/2 transition-all duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                  fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round" class="lucide lucide-messages-square">
                  <path d="M14 9a2 2 0 0 1-2 2H6l-4 4V4c0-1.1.9-2 2-2h8a2 2 0 0 1 2 2z" />
                  <path d="M18 9h2a2 2 0 0 1 2 2v11l-4-4h-6a2 2 0 0 1-2-2v-1" />
                </svg>
              </div>
            </li>
            <li class="relative overflow-hidden">
              <a href="{{ route('admin.users') }}"
                class="peer block px-4 py-6 text-xs text-white hover:text-slate-100/75 transition-colors duration-300">مدیریت
                کاربران</a>
              <div
                class="pointer-events-none text-slate-100/75 absolute -left-12 -rotate-180 peer-hover:left-4 peer-hover:-rotate-360 top-1/2 -translate-y-1/2 transition-all duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                  fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round" class="lucide lucide-users">
                  <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                  <circle cx="9" cy="7" r="4" />
                  <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                  <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                </svg>
              </div>
            </li>
            <li class="relative overflow-hidden">
              <a href="{{ route('admin.products') }}"
                class="peer block px-4 py-6 text-xs text-white hover:text-slate-100/75 transition-colors duration-300">مدیریت
                محصولات</a>
              <div
                class="pointer-events-none text-slate-100/75 absolute -left-12 -rotate-180 peer-hover:left-4 peer-hover:-rotate-360 top-1/2 -translate-y-1/2 transition-all duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                  fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round" class="lucide lucide-package-search">
                  <path
                    d="M21 10V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l2-1.14" />
                  <path d="m7.5 4.27 9 5.15" />
                  <polyline points="3.29 7 12 12 20.71 7" />
                  <line x1="12" x2="12" y1="22" y2="12" />
                  <circle cx="18.5" cy="15.5" r="2.5" />
                  <path d="M20.27 17.27 22 19" />
                </svg>
              </div>
            </li>
          </ul>
          <div class="flex justify-between items-center gap-2 absolute bottom-6 right-4">
            <img src="{{ route('user-avatar', ['user' => auth()->id()]) }}" alt="guest"
              class="w-8 h-8 rounded-full">
            <a href="{{ auth()->user()?->is_admin() ? route('admin.orders') : route('dashboard') }}"
              class="group block">
              <p class="text-sm text-slate-200 group-hover:text-gray-400">
                {{ auth()->user()->name() }}</p>
              <p class="text-xs text-slate-200 group-hover:text-gray-400">حساب ادمین</p>
            </a>
          </div>
        </div>
        {{-- End Admin Shop Menu --}}
      @endif
    </div>
    {{-- Search Menu --}}
    @if (!auth()->user()?->is_admin())
      <div id="search-menu"
        class="flex justify-center w-full h-full bg-slate-100/90 dark:bg-slate-900/90 fixed top-0 right-0 sm:right-20 translate-x-full transition-all duration-300 z-30">
        <livewire:search-menu />
      </div>
    @endif

    {{-- Content --}}
    <div class="mr-0 mt-12 sm:mr-20 sm:mt-0 bg-layout dark:bg-slate-700">
      {{ $slot }}
    </div>
  </div>

  @livewireStyles
  @livewireScripts
</body>

</html>
