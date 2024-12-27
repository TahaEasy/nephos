<x-layout>
  @vite('resources/js/auth.js')
  <div class="flex justify-center items-start w-full min-h-screen">
    <div class="sm:mt-16 mt-8 text-center">
      <div class="flex justify-center">
        <x-app-logo size="20" />
      </div>
      <div class="flex justify-center items-center mt-6">
        <div class="w-14 text-end">
          <a href="/auth/register"
            class="go-register {{ url()->current() == route('register') ? 'text-primary' : 'text-gray-400 hover:text-primary' }}">ثبت
            نام</a>
        </div>
        <div class="relative bg-zinc-300 w-[4.5rem] h-5 mx-4 rounded-full">
          @isset($regForm)
            <a href="{{ route('login') }}"
              class="go-login block relative peer w-full h-full opacity-0 cursor-pointer z-30"></a>
          @else
            <a href="{{ route('register') }}"
              class="go-register block relative peer w-full h-full opacity-0 cursor-pointer z-30"></a>
          @endisset
          <input type="checkbox" id="auth-toggler" @isset($regForm) checked @endisset
            class="relative peer w-full h-full opacity-0 invisible cursor-pointer z-20">
          <span
            class="absolute left-0 top-1/2 flex justify-center items-center peer-checked:left-[calc(100%-2.5rem)] peer-checked:rotate-720 text-gray-600 dark:text-slate-200 peer-checked:text-white peer-checked:bg-primary -translate-y-1/2 bg-white dark:bg-slate-600 w-10 h-5 transition-all duration-200 after:content-[''] before:absolute before:w-full before:h-4 before:bg-white before:dark:bg-slate-600 peer-checked:before:bg-primary before:transition-all before:duration-200 before:top-0 before:-translate-y-[70%] before:triangle-up after:absolute after:w-full after:h-4 after:bottom-0 after:translate-y-full after:triangle-down after:bg-white after:dark:bg-slate-600 peer-checked:after:bg-primary after:transition-all after:duration-200 z-20">
            @if (url()->current() == route('login'))
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="block"
                id="login-icon">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
              </svg>
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="hidden"
                id="register-icon">
                <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                <polyline points="2 17 12 22 22 17"></polyline>
                <polyline points="2 12 12 17 22 12"></polyline>
              </svg>
            @else
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="hidden"
                id="login-icon">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
              </svg>
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="block"
                id="register-icon">
                <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                <polyline points="2 17 12 22 22 17"></polyline>
                <polyline points="2 12 12 17 22 12"></polyline>
              </svg>
            @endif
          </span>
        </div>
        <div class="w-14 text-start">
          <a href="/auth/login"
            class="go-login {{ url()->current() == route('login') ? 'text-primary' : 'text-gray-400 hover:text-primary' }}">ورود</a>
        </div>
      </div>
      <div class="mt-12">
        {{ $slot }}
      </div>
    </div>
  </div>
</x-layout>
