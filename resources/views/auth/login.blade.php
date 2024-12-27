<x-auth-head>
  <form action="/auth/login" method="POST" class="xs:min-w-96 min-w-0 xs:w-auto w-full px-2">
    @csrf
    <div>
      <div class="flex justify-between">
        <label for="email"
          class="block text-right text-sm text-slate-600 dark:text-gray-400 mb-1 font-semibold">ایمیل</label>
        @error('email')
          <p class="text-xs text-red-600">{{ $message }}</p>
        @enderror
      </div>
      <div class="relative text-right w-full">
        <input type="email" autocomplete="off" name="email" id="email" value="{{ old('email') }}"
          class="peer outline-none rounded-sm @error('email') border-red-600 @else dark:border-gray-700 focus:dark:border-gray-300 border-gray-300 hover:border-gray-400 focus:border-gray-700 @enderror dark:bg-slate-800 dark:text-slate-200 border-[1px] w-full py-2 pe-2 ps-12 transition-all duration-200">
        <span
          class="absolute right-4 top-1/2 -translate-y-1/2 @error('email') text-red-600 @else text-gray-300 @enderror peer-focus:text-primary ransition-all duration-200">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-mail">
            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
            </path>
            <polyline points="22,6 12,13 2,6"></polyline>
          </svg>
        </span>
      </div>
    </div>
    <div class="mt-4">
      <div class="flex justify-between">
        <label for="password" class="block text-right text-sm text-slate-600 dark:text-gray-400 mb-1 font-semibold">رمز
          عبور</label>
        @error('password')
          <p class="text-xs text-red-600">{{ $message }}</p>
        @enderror
      </div>
      <div class="relative text-right w-full">
        <input type="password" name="password" id="password"
          class="password-input peer outline-none rounded-sm @error('password') border-red-600 @else dark:border-gray-700 focus:dark:border-gray-300 border-gray-300 hover:border-gray-400 focus:border-gray-700 @enderror dark:bg-slate-800 dark:text-slate-200 border-[1px] w-full py-2 px-12 transition-all duration-200">
        <span
          class="absolute right-4 top-1/2 -translate-y-1/2 @error('password') text-red-600 @else text-gray-300 @enderror peer-focus:text-primary ransition-all duration-200">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-lock">
            <rect x="3" y="11" width="18" height="11" rx="2" ry="2">
            </rect>
            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
          </svg>
        </span>
        <a href="javascript:void"
          class="eye-toggler absolute left-4 top-1/2 -translate-y-1/2 ransition-all duration-200">
          <svg class="eye" width="22" height="24" viewBox="0 0 25 26" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <g>
              <path
                d="M11.9994 10.5886C10.6694 10.5886 9.58838 11.6706 9.58838 13.0006C9.58838 14.3296 10.6694 15.4106 11.9994 15.4106C13.3294 15.4106 14.4114 14.3296 14.4114 13.0006C14.4114 11.6706 13.3294 10.5886 11.9994 10.5886ZM11.9994 16.9106C9.84238 16.9106 8.08838 15.1566 8.08838 13.0006C8.08838 10.8436 9.84238 9.08862 11.9994 9.08862C14.1564 9.08862 15.9114 10.8436 15.9114 13.0006C15.9114 15.1566 14.1564 16.9106 11.9994 16.9106Z"
                fill="#98A3B8" fill-opacity="0.58"></path>
              <g>
                <mask maskUnits="userSpaceOnUse" x="2" y="4" width="20" height="18">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M2 4.94751H21.9998V21.0525H2V4.94751Z"
                    fill="white"></path>
                </mask>
                <g mask="url(#mask0_33437_4760)">
                  <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M3.56975 12.9998C5.42975 17.1088 8.56275 19.5518 11.9998 19.5528C15.4368 19.5518 18.5697 17.1088 20.4298 12.9998C18.5697 8.89177 15.4368 6.44877 11.9998 6.44777C8.56375 6.44877 5.42975 8.89177 3.56975 12.9998ZM12.0017 21.0528H11.9978H11.9967C7.86075 21.0498 4.14675 18.1508 2.06075 13.2958C1.97975 13.1068 1.97975 12.8928 2.06075 12.7038C4.14675 7.84977 7.86175 4.95077 11.9967 4.94777C11.9987 4.94677 11.9987 4.94677 11.9998 4.94777C12.0017 4.94677 12.0017 4.94677 12.0028 4.94777C16.1388 4.95077 19.8527 7.84977 21.9387 12.7038C22.0208 12.8928 22.0208 13.1068 21.9387 13.2958C19.8537 18.1508 16.1388 21.0498 12.0028 21.0528H12.0017Z"
                    fill="#98A3B8" fill-opacity="0.58"></path>
                </g>
              </g>
            </g>
          </svg>
          <svg class="eye-slash hidden" width="20" height="17" viewBox="0 0 20 17" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path
              d="M7.94557 10.1681C7.41849 9.64191 7.09766 8.92691 7.09766 8.12482C7.09766 6.51791 8.39199 5.22266 9.99799 5.22266C10.7927 5.22266 11.5242 5.54441 12.0422 6.07057"
              stroke="#98A3B8" stroke-opacity="0.58" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
            </path>
            <path d="M12.8451 8.64062C12.6324 9.82312 11.7011 10.7563 10.5195 10.9708" stroke="#98A3B8"
              stroke-opacity="0.58" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
            </path>
            <path
              d="M5.09911 13.0145C3.64436 11.8724 2.41236 10.204 1.51953 8.1241C2.42153 6.03502 3.66178 4.35752 5.1257 3.20619C6.58045 2.05485 8.25887 1.42969 9.9987 1.42969C11.7486 1.42969 13.4261 2.06402 14.89 3.2236"
              stroke="#98A3B8" stroke-opacity="0.58" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
            </path>
            <path
              d="M16.8241 5.24023C17.4548 6.07807 18.0094 7.04515 18.4759 8.12407C16.6729 12.3013 13.4865 14.8176 9.99678 14.8176C9.2057 14.8176 8.42561 14.6892 7.67578 14.439"
              stroke="#98A3B8" stroke-opacity="0.58" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
            </path>
            <path d="M17.229 0.894531L2.76953 15.354" stroke="#98A3B8" stroke-opacity="0.58" stroke-width="1.5"
              stroke-linecap="round" stroke-linejoin="round"></path>
          </svg>
        </a>
      </div>
    </div>
    <div class="flex justify-between items-center my-4">
      <label for="offer-toggler" class="text-gray-400 font-medium">مرا به خاطر بسپار</label>
      <div class="relative bg-zinc-300 dark:bg-slate-500 w-14 h-7 rounded-full p-1">
        <input type="checkbox" @if (old('remember') == 'true') checked @endif name="remember" value="true"
          id="offer-toggler" class="relative peer w-full h-full opacity-0 cursor-pointer z-10">
        <span
          class="flex justify-center items-center absolute left-[calc(100%-1.75rem)] peer-checked:left-1 top-1/2 w-6 h-6 -translate-y-1/2 peer-checked:rotate-360 text-gray-400 peer-checked:text-white bg-white dark:bg-slate-200 peer-checked:bg-primary rounded-full transition-all duration-300">
          <svg id="offer-disagreed" xmlns="http://www.w3.org/2000/svg" width="14" height="14"
            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round">
            <circle cx="12" cy="12" r="10"></circle>
          </svg>
          <svg id="offer-agreed" xmlns="http://www.w3.org/2000/svg" width="14" height="14"
            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round" class="hidden">
            <polyline points="20 6 9 17 4 12"></polyline>
          </svg>
        </span>
      </div>
    </div>
    <div>
      <button
        class="block py-3 px-8 w-full text-sm text-white bg-primary hover:bg-primary/80 glow-primary glow-hover rounded-full transition-all duration-300">ورود</button>
    </div>
    <div class="flex justify-center items-center">
      <a href="javascript:void(0)"
        class="mt-4 w-fit text-gray-600 dark:text-gray-400 hover:text-primary transition-all duration-150">کلمه
        عبور را فراموش
        کرده اید؟</a>
    </div>
  </form>
</x-auth-head>
