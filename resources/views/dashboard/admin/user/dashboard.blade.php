<x-admin-user-dashboard-layout :userId="$user->id" header="جزئیات کاربر">
  <div class="sm:grid flex flex-col grid-cols-5 w-full gap-6 mb-8">
    <div class="col-span-2">
      <div
        class="flex flex-col justify-start items-center gap-4 bg-white dark:bg-slate-800 text-center rounded-sm hover:drop-shadow-xl w-full transition-all duration-300">
        <div class="flex flex-col justify-center items-center p-4">
          <img src="{{ route('user-avatar', ['user' => $user->id]) }}" alt="avatar" class="w-20 h-20 mb-2 rounded-full">
          <p class="text-slate-800 dark:text-slate-200 font-semibold">{{ $user->name() }}
          </p>
          <p class="text-xs text-gray-400">{{ $user->email }}</p>
        </div>
        <div class="relative bg-slate-50 dark:bg-slate-700/40 border-t-[1px] border-t-gray-400/50 w-full p-4">
          <p class="text-xs text-gray-400">نــوع حــساب کاربر:</p>
          <div class="flex justify-center">
            <p
              class="text-lg font-bold w-fit text-slate-800 dark:text-primary/80 hover:dark:text-primary hover:text-primary/80 cursor-default transition-all duration-300">
              {{ $user->is_seller ? 'فروشنده' : 'مشتری' }}
            </p>
          </div>
        </div>
      </div>
      @if ($user->is_address_incomplete())
        <div class="flex justify-start items-center gap-2 mt-6 px-4 py-2 rounded-sm bg-slate-700 dark:bg-slate-900">
          <div class="xl:block hidden">
            <img src="/img/logos/nephos-gold.svg" alt="nephos-warn" class="max-w-none w-10 h-10">
          </div>
          <div>
            <div class="flex justify-start xl:gap-0 gap-2">
              <img src="/img/logos/nephos-gold.svg" alt="nephos-warn" class="xl:hidden block max-w-none w-5 h-5">
              <p class="text-sm leading-normal text-[#ffd700]">هشدار!</p>
            </div>
            <p class="xl:text-xs text-xxs leading-normal mt-1 text-slate-200">اطلاعات بخش آدرس برای تکمیل سفارشات
              ضروری هستند و حتما باید کامل شده باشند اما برخی از اطلاعات این کاربر هنوز کامل نیستند!</p>
          </div>
        </div>
      @endif
    </div>
    <div class="flex flex-col col-span-3 gap-6">
      <div
        class="flex flex-col justify-start bg-white dark:bg-slate-800 rounded-sm hover:drop-shadow-xl w-full transition-all duration-300">
        <div class="flex flex-col justify-start bg-slate-50 dark:bg-slate-700/40 border-b-[1px] border-b-gray-400/50">
          <div class="flex justify-between items-center p-4 py-3">
            <p class="text-sm text-gray-500 font-extrabold">جزئــیات حــساب کاربــری</p>
            <a href="{{ route('admin.user.edit', ['user' => $user->id]) }}"
              class="flex justify-center items-center p-[10px] border-[1px] border-dashed border-gray-400 rounded-full text-gray-400 hover:text-primary hover:border-primary hover:border-solid hover:rotate-90 transition-all duration-200">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-settings feather-icons">
                <circle cx="12" cy="12" r="3"></circle>
                <path
                  d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                </path>
              </svg>
            </a>
          </div>
        </div>
        <div class="sm:gap-0 gap-2 flex p-4 py-6 relative overflow-hidden">
          <div class="absolute block -left-6 top-1/2 -translate-y-1/2">
            <img src="/img/svg/nephos-grayscale.svg" alt="nephos-gray" class="opacity-40 dark:opacity-100 w-36 h-36">
          </div>
          <div class="w-1/2">
            <div>
              <p class="text-slate-800 dark:text-slate-200">نام</p>
              <p class="text-gray-400 text-sm overflow-clip">{{ $user->f_name }}</p>
            </div>
            <div class="mt-4">
              <p class="text-slate-800 dark:text-slate-200">ایمیل</p>
              <p class="text-gray-400 text-sm overflow-clip">{{ $user->email }}</p>
            </div>
          </div>
          <div class="w-1/2">
            <div>
              <p class="text-slate-800 dark:text-slate-200">نام خانوادگی</p>
              <p class="text-gray-400 text-sm overflow-clip">{{ $user->l_name }}</p>
            </div>
            <div class="mt-4">
              <p class="text-slate-800 dark:text-slate-200">تلفن همراه</p>
              <p class="text-gray-400 text-sm overflow-clip">{{ $user->phone ?? '- - -' }}</p>
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
        <div class="flex p-4 py-6">
          <div class="w-1/2">
            <div>
              <p class="text-slate-800 dark:text-slate-200">استان</p>
              <p class="text-gray-400 text-sm overflow-clip">{{ $user->province ?? '- - -' }}</p>
            </div>
            <div class="mt-4">
              <p class="text-slate-800 dark:text-slate-200">خیابان</p>
              <p class="text-gray-400 text-sm overflow-clip">{{ $user->street ?? '- - -' }}</p>
            </div>
            <div class="mt-4">
              <p class="text-slate-800 dark:text-slate-200">پلاک</p>
              <p class="text-gray-400 text-sm overflow-clip">{{ $user->plaque ?? '- - -' }}</p>
            </div>
          </div>
          <div class="w-1/2">
            <div>
              <p class="text-slate-800 dark:text-slate-200">شهر</p>
              <p class="text-gray-400 text-sm overflow-clip">{{ $user->city ?? '- - -' }}</p>
            </div>
            <div class="mt-4">
              <p class="text-slate-800 dark:text-slate-200">کوچه</p>
              <p class="text-gray-400 text-sm overflow-clip">{{ $user->alley ?? '- - -' }}</p>
            </div>
            <div class="mt-4">
              <p class="text-slate-800 dark:text-slate-200">کد پستی</p>
              <p class="text-gray-400 text-sm overflow-clip">{{ $user->post_code ?? '- - -' }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-admin-user-dashboard-layout>
