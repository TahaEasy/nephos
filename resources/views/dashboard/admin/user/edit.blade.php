<x-admin-user-dashboard-layout :userId="$user->id" header="ویرایش اطلاعات">
  @vite('resources/js/uploadAvatar.js')
  @vite('resources/css/croppie.css')
  <form action="{{ route('admin.user.update', ['user' => $user->id]) }}" method="POST" id="main-form"
    class="sm:grid flex flex-col grid-cols-5 w-full gap-6 mb-8" enctype="multipart/form-data">
    @csrf
    @method('put')
    <x-modal header="آپــلود تــصویــر" modal="upload-avatar">
      <div class="relative z-0">
        <div id="upload-box">
          <input type="file" accept="image/*" name="avatar" id="avatar" class="hidden">
          <input type="hidden" name="base64_image" id="base64-image">

          <label for="avatar"
            class="group flex justify-center items-center py-6 px-2 sm:px-28 w-full min-h-72 border-2 border-gray-400 border-dashed cursor-pointer">
            <div>
              <div class="croppie-container">
                <img src="/img/illustrations/profile.svg" alt="upload-image" id="item"
                  class="w-64 h-32 opacity-45 grayscale group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-500">
              </div>
              <div>
                <p class="text-center text-gray-400">برای آپلود تصویر</p>
                <p class="text-center text-gray-400">اینجا را کلیک کنید.</p>
              </div>
            </div>
          </label>
        </div>
        <div id="setup-box" class="hidden w-full h-full">
          <div>
            <img src="" alt="preview" id="preview">
          </div>
          <div class="flex xs:flex-row flex-col justify-center items-center gap-4">
            <button id="destroy-image" type="button"
              class="block py-3 px-8 w-fit text-sm text-white bg-primary hover:bg-primary/80 hover:shadow-xl shadow-white rounded-full transition-all duration-300">تعویض
              تصویر</button>
            <button id="save-image" type="button"
              class="block py-3 px-8 w-fit text-sm text-white bg-submit hover:bg-submit/80 hover:shadow-xl shadow-white rounded-full transition-all duration-300">استفاده
              از
              تصویر</button>
          </div>
        </div>
      </div>
    </x-modal>
    <div class="col-span-2">
      <div
        class="relative flex flex-col justify-start items-center gap-4 bg-white dark:bg-slate-800 text-center rounded-sm hover:drop-shadow-xl w-full transition-all duration-300">
        <div class="flex flex-col justify-center items-center p-4 transition-all duration-200" id="user-details-box">
          <a href="javascript:void(0)" data-modal="upload-avatar"
            class="open-modal-menu block group relative rounded-full w-24 h-24 overflow-hidden">
            <img src="{{ route('user-avatar', ['user' => $user->id]) }}" id="avatar-image" alt="avatar"
              class="w-24 h-24 mb-2">
            <div
              class="absolute top-0 right-0 flex justify-center items-center text-primary w-full h-full opacity-0 group-hover:opacity-100 bg-slate-200/40 transition-all duration-150">
              <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-plus upload-icon" aria-hidden="true">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
              </svg>
            </div>
          </a>
          <div class="my-1">
            @error('avatar')
              <p class="text-center text-red-600 text-sm my-1">{{ $message }}</p>
            @enderror
            <p class="text-slate-800 dark:text-slate-200 font-semibold">
              {{ $user->name() }}
            </p>
            <p class="text-xs text-gray-400">{{ $user->email }}</p>
          </div>
          <div class="py-4">
            <button class="bubbly-button">ذخیره
              تغییرات</button>
          </div>
        </div>
      </div>
    </div>
    <div class="flex flex-col col-span-3 gap-6">
      <div
        class="flex flex-col justify-start bg-white dark:bg-slate-800 rounded-sm hover:drop-shadow-xl w-full transition-all duration-300">
        <div class="flex flex-col justify-start bg-slate-50 dark:bg-slate-700/40 border-b-[1px] border-b-gray-400/50">
          <div class="flex justify-between items-center p-4 py-3">
            <p class="text-sm text-gray-500 font-extrabold">جزئــیات حــساب کاربــری</p>
            <a href="{{ route('admin.user.dashboard', ['user' => $user->id]) }}"
              class="group/arrowlink flex justify-start items-center text-xs ml-0 xs:ml-4">
              <span
                class="ml-2 text-gray-400 group-hover/arrowlink:text-primary transition-all duration-150">بازگشت</span>
              <svg height="18" width="18" version="1.1"
                class="group-hover/arrowlink:-translate-x-2 fill-gray-400 group-hover/arrowlink:fill-primary transition-all duration-150"
                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 330 330"
                xml:space="preserve">
                <path id="XMLID_308_"
                  d="M315,150H105V90c0-6.067-3.655-11.537-9.26-13.858c-5.606-2.322-12.058-1.038-16.347,3.252l-75,75c-5.858,5.858-5.858,15.355,0,21.213l75,75c2.87,2.87,6.705,4.394,10.61,4.394c1.932,0,3.881-0.374,5.737-1.142c5.605-2.322,9.26-7.791,9.26-13.858v-60h210c8.284,0,15-6.716,15-15C330,156.716,323.284,150,315,150z M75,203.787L36.213,165L75,126.213V203.787z" />
              </svg>
            </a>
          </div>
        </div>
        <div class="flex sm:flex-row flex-col p-4 py-6 relative overflow-hidden">
          <div class="sm:w-1/2 w-full">
            <div class="pe-4">
              <div class="flex justify-between">
                <label for="f_name"
                  class="block text-right text-sm text-slate-600 dark:text-gray-400 mb-1 font-semibold">نام</label>
                @error('f_name')
                  <p class="text-xs text-red-600">{{ $message }}</p>
                @enderror
              </div>
              <div class="relative text-right w-full">
                <input type="text" autocomplete="off" name="f_name" id="f_name"
                  value="{{ old('f_name') ?? $user->f_name }}"
                  class="peer outline-none rounded-sm @error('f_name') border-red-600 @else dark:border-gray-700 focus:dark:border-gray-300 border-gray-300 hover:border-gray-400 focus:border-gray-700 @enderror dark:bg-slate-800 dark:text-slate-200 border-[1px] w-full py-1 pe-2 ps-2 transition-all duration-200">
              </div>
            </div>
            <div class="mt-4 pe-4">
              <div class="flex justify-between">
                <label for="email"
                  class="block text-right text-sm text-slate-600 dark:text-gray-400 mb-1 font-semibold">ایمیل</label>
                @error('email')
                  <p class="text-xs text-red-600">{{ $message }}</p>
                @enderror
              </div>
              <div class="relative text-right w-full">
                <input type="email" autocomplete="off" name="email" id="email"
                  value="{{ old('email') ?? $user->email }}"
                  class="peer outline-none rounded-sm @error('email') border-red-600 @else dark:border-gray-700 focus:dark:border-gray-300 border-gray-300 hover:border-gray-400 focus:border-gray-700 @enderror dark:bg-slate-800 dark:text-slate-200 border-[1px] w-full py-1 pe-2 ps-2 transition-all duration-200">
              </div>
            </div>
          </div>
          <div class="sm:w-1/2 w-full">
            <div class="pe-4">
              <div class="flex justify-between">
                <label for="l_name"
                  class="block text-right text-sm text-slate-600 dark:text-gray-400 mb-1 font-semibold">نام
                  خانوادگی</label>
                @error('l_name')
                  <p class="text-xs text-red-600">{{ $message }}</p>
                @enderror
              </div>
              <div class="relative text-right w-full">
                <input type="text" autocomplete="off" name="l_name" id="l_name"
                  value="{{ old('l_name') ?? $user->l_name }}"
                  class="peer outline-none rounded-sm @error('l_name') border-red-600 @else dark:border-gray-700 focus:dark:border-gray-300 border-gray-300 hover:border-gray-400 focus:border-gray-700 @enderror dark:bg-slate-800 dark:text-slate-200 border-[1px] w-full py-1 pe-2 ps-2 transition-all duration-200">
              </div>
            </div>
            <div class="mt-4 pe-4">
              <div class="flex justify-between">
                <label for="phone"
                  class="block text-right text-sm text-slate-600 dark:text-gray-400 mb-1 font-semibold">تلفن
                  همراه</label>
                @error('phone')
                  <p class="text-xs text-red-600">{{ $message }}</p>
                @enderror
              </div>
              <div class="relative text-right w-full">
                <input type="text" autocomplete="off" name="phone" id="phone"
                  value="{{ old('phone') ?? $user->phone }}"
                  class="peer outline-none rounded-sm @error('phone') border-red-600 @else dark:border-gray-700 focus:dark:border-gray-300 border-gray-300 hover:border-gray-400 focus:border-gray-700 @enderror dark:bg-slate-800 dark:text-slate-200 border-[1px] w-full py-1 pe-2 ps-2 transition-all duration-200">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div
        class="flex flex-col justify-start bg-white dark:bg-slate-800 rounded-sm hover:drop-shadow-xl w-full transition-all duration-300">
        <div class="flex flex-col justify-start bg-slate-50 dark:bg-slate-700/40 border-b-[1px] border-b-gray-400/50">
          <div class="flex justify-start items-center p-4 py-5">
            <p class="text-sm text-gray-500 font-extrabold">آدرس شــما</p>
          </div>
        </div>
        <div class="flex sm:flex-row flex-col p-4 py-6">
          <div class="sm:w-1/2 w-full">
            <div class="pe-4">
              <div class="flex justify-between">
                <label for="province"
                  class="block text-right text-sm text-slate-600 dark:text-gray-400 mb-1 font-semibold">استان</label>
                @error('province')
                  <p class="text-xs text-red-600">{{ $message }}</p>
                @enderror
              </div>
              <div class="relative text-right w-full">
                <input type="text" autocomplete="off" name="province" id="province"
                  value="{{ old('province') ?? $user->province }}"
                  class="peer outline-none rounded-sm @error('province') border-red-600 @else dark:border-gray-700 focus:dark:border-gray-300 border-gray-300 hover:border-gray-400 focus:border-gray-700 @enderror dark:bg-slate-800 dark:text-slate-200 border-[1px] w-full py-1 pe-2 ps-2 transition-all duration-200">
              </div>
            </div>
            <div class="mt-4 pe-4">
              <div class="flex justify-between">
                <label for="street"
                  class="block text-right text-sm text-slate-600 dark:text-gray-400 mb-1 font-semibold">خیابان</label>
                @error('street')
                  <p class="text-xs text-red-600">{{ $message }}</p>
                @enderror
              </div>
              <div class="relative text-right w-full">
                <input type="text" autocomplete="off" name="street" id="street"
                  value="{{ old('street') ?? $user->street }}"
                  class="peer outline-none rounded-sm @error('street') border-red-600 @else dark:border-gray-700 focus:dark:border-gray-300 border-gray-300 hover:border-gray-400 focus:border-gray-700 @enderror dark:bg-slate-800 dark:text-slate-200 border-[1px] w-full py-1 pe-2 ps-2 transition-all duration-200">
              </div>
            </div>
            <div class="mt-4 pe-4">
              <div class="flex justify-between">
                <label for="plaque"
                  class="block text-right text-sm text-slate-600 dark:text-gray-400 mb-1 font-semibold">پلاک</label>
                @error('plaque')
                  <p class="text-xs text-red-600">{{ $message }}</p>
                @enderror
              </div>
              <div class="relative text-right w-full">
                <input type="text" autocomplete="off" name="plaque" id="plaque"
                  value="{{ old('plaque') ?? $user->plaque }}"
                  class="peer outline-none rounded-sm @error('plaque') border-red-600 @else dark:border-gray-700 focus:dark:border-gray-300 border-gray-300 hover:border-gray-400 focus:border-gray-700 @enderror dark:bg-slate-800 dark:text-slate-200 border-[1px] w-full py-1 pe-2 ps-2 transition-all duration-200">
              </div>
            </div>
          </div>
          <div class="sm:w-1/2 w-full">
            <div class="pe-4">
              <div class="flex justify-between">
                <label for="city"
                  class="block text-right text-sm text-slate-600 dark:text-gray-400 mb-1 font-semibold">شهر</label>
                @error('city')
                  <p class="text-xs text-red-600">{{ $message }}</p>
                @enderror
              </div>
              <div class="relative text-right w-full">
                <input type="text" autocomplete="off" name="city" id="city"
                  value="{{ old('city') ?? $user->city }}"
                  class="peer outline-none rounded-sm @error('city') border-red-600 @else dark:border-gray-700 focus:dark:border-gray-300 border-gray-300 hover:border-gray-400 focus:border-gray-700 @enderror dark:bg-slate-800 dark:text-slate-200 border-[1px] w-full py-1 pe-2 ps-2 transition-all duration-200">
              </div>
            </div>
            <div class="mt-4 pe-4">
              <div class="flex justify-between">
                <label for="alley"
                  class="block text-right text-sm text-slate-600 dark:text-gray-400 mb-1 font-semibold">کوچه</label>
                @error('alley')
                  <p class="text-xs text-red-600">{{ $message }}</p>
                @enderror
              </div>
              <div class="relative text-right w-full">
                <input type="text" autocomplete="off" name="alley" id="alley"
                  value="{{ old('alley') ?? $user->alley }}"
                  class="peer outline-none rounded-sm @error('alley') border-red-600 @else dark:border-gray-700 focus:dark:border-gray-300 border-gray-300 hover:border-gray-400 focus:border-gray-700 @enderror dark:bg-slate-800 dark:text-slate-200 border-[1px] w-full py-1 pe-2 ps-2 transition-all duration-200">
              </div>
            </div>
            <div class="mt-4 pe-4">
              <div class="flex justify-between">
                <label for="post_code"
                  class="block text-right text-sm text-slate-600 dark:text-gray-400 mb-1 font-semibold">کد
                  پستی</label>
                @error('post_code')
                  <p class="text-xs text-red-600">{{ $message }}</p>
                @enderror
              </div>
              <div class="relative text-right w-full">
                <input type="text" autocomplete="off" name="post_code" id="post_code"
                  value="{{ old('post_code') ?? $user->post_code }}"
                  class="peer outline-none rounded-sm @error('post_code') border-red-600 @else dark:border-gray-700 focus:dark:border-gray-300 border-gray-300 hover:border-gray-400 focus:border-gray-700 @enderror dark:bg-slate-800 dark:text-slate-200 border-[1px] w-full py-1 pe-2 ps-2 transition-all duration-200">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</x-admin-user-dashboard-layout>
