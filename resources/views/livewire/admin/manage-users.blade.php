<div class="relative sm:rounded-lg">
  <div class="flex items-baseline sm:items-end justify-between flex-column flex-wrap flex-col sm:flex-row pb-4 mt-8">
    <div class="w-full sm:w-3/5 pe-0 sm:pe-2 pb-2 sm:pb-0">
      <div class="flex justify-between">
        <label for="searchName"
          class="block text-right text-sm text-slate-600 dark:text-gray-400 mb-1 font-semibold">جستوجو
          (نام)</label>
      </div>
      <div class="relative text-right w-full">
        <input type="text" autocomplete="off" name="searchName" id="searchName" wire:model.live="searchName"
          wire:keydown="reset_page"
          class="peer outline-none rounded-sm dark:border-gray-700 focus:dark:border-gray-300 border-gray-300 hover:border-gray-400 focus:border-gray-700 dark:bg-slate-800 dark:text-slate-200 border-[1px] w-full py-2 pe-2 ps-12 transition-all duration-200">
        <span
          class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-300 peer-focus:text-primary ransition-all duration-200">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="11" cy="11" r="8"></circle>
            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
          </svg>
        </span>
        <span wire:loading.flex wire:target="searchName" class="flex absolute left-4 top-1/2 -translate-y-1/2">
          <x-spinner size="[18px]" color="gray-400" />
        </span>
      </div>
    </div>
    <div class="w-full sm:w-2/5 ps-0 sm:ps-2 pt-2 sm:pt-0">
      <div class="flex justify-between">
        <label for="searchId"
          class="block text-right text-sm text-slate-600 dark:text-gray-400 mb-1 font-semibold">جستوجو
          (شماره)</label>
      </div>
      <div class="relative text-right w-full">
        <input type="text" autocomplete="off" name="searchId" id="searchId" wire:model.live="searchId"
          wire:keydown="reset_page"
          class="peer outline-none rounded-sm dark:border-gray-700 focus:dark:border-gray-300 border-gray-300 hover:border-gray-400 focus:border-gray-700 dark:bg-slate-800 dark:text-slate-200 border-[1px] w-full py-2 pe-2 ps-12 transition-all duration-200">
        <span
          class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-300 peer-focus:text-primary ransition-all duration-200">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="11" cy="11" r="8"></circle>
            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
          </svg>
        </span>
        <span wire:loading.flex wire:target="searchId" class="flex absolute left-4 top-1/2 -translate-y-1/2">
          <x-spinner size="[18px]" color="gray-400" />
        </span>
      </div>
    </div>
  </div>
  {{-- Filters --}}
  <div>
    <div class="flex justify-start items-center flex-col md:flex-row gap-4 sm:gap-8 w-full pb-8">
      {{-- Start Filter Status --}}
      <div class="block md:flex items-center justify-start flex-wrap gap-4 w-full md:w-auto">
        <p class="dark:text-white mb-1 md:mb-0">فیلتر وضعیت:</p>
        <div
          class="relative w-full md:w-56 dark:text-slate-200 has-[input:checked]:bg-layout dark:has-[input:checked]:bg-slate-700 flex justify-between items-center bg-white dark:bg-slate-800 border-white dark:border-slate-800 border-[1px] rounded-full px-2 xs:px-4 py-2 transition-all duration-300">
          <input type="checkbox" id="status-dropdown-checkbox"
            class="dropdown peer absolute top-0 left-0 w-full h-full opacity-0 cursor-pointer z-10">

          <p class="text-sm text-gray-600 dark:text-slate-300" wire:loading wire:target="setStatus">صبر کنید...
          </p>
          <p class="text-sm text-gray-600 dark:text-slate-300" wire:loading.remove wire:target="setStatus">
            {{ __('messages.' . $selectedStatus) }}</p>
          <span
            class="peer-checked:rotate-180 dark:text-slate-200 flex justify-center items-center -translate-x-1/4 text-xl transition-all duration-300">
            <svg class="fill-gray-600 dark:fill-slate-300 w-[15px] h-[15px] xs:w-[20px] xs:h-[20px]" width="20"
              height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd"
                d="M12.7071 14.7071C12.3166 15.0976 11.6834 15.0976 11.2929 14.7071L6.29289 9.70711C5.90237 9.31658 5.90237 8.68342 6.29289 8.29289C6.68342 7.90237 7.31658 7.90237 7.70711 8.29289L12 12.5858L16.2929 8.29289C16.6834 7.90237 17.3166 7.90237 17.7071 8.29289C18.0976 8.68342 18.0976 9.31658 17.7071 9.70711L12.7071 14.7071Z" />
            </svg>
          </span>

          <div
            class="absolute top-8 left-0 z-20 w-full md:w-56 py-2 h-max bg-white dark:bg-slate-800 rounded-md drop-shadow-lg shadow-slate-500 opacity-0 invisible peer-checked:top-12 peer-checked:opacity-100 peer-checked:visible transition-all duration-300">
            <x-dropdown-item :selected="$selectedStatus" name="all" fun='setStatus' />
            <x-dropdown-item :selected="$selectedStatus" name="customers" fun='setStatus' />
            <x-dropdown-item :selected="$selectedStatus" name="sellers" fun='setStatus' />
            <x-dropdown-item :selected="$selectedStatus" name="banned" fun='setStatus' />
          </div>
        </div>
      </div>
      {{-- End Filter Status --}}
      {{-- Start Filter Order By --}}
      <div class="block md:flex items-center justify-start flex-wrap gap-4 w-full md:w-auto">
        <p class="dark:text-white mb-1 md:mb-0">فیلتر چینش:</p>
        <div
          class="relative w-full md:w-56 dark:text-slate-200 has-[input:checked]:bg-layout dark:has-[input:checked]:bg-slate-700 flex justify-between items-center bg-white dark:bg-slate-800 border-white dark:border-slate-800 border-[1px] rounded-full px-2 xs:px-4 py-2 transition-all duration-300">
          <input type="checkbox" id="order-dropdown-checkbox"
            class="dropdown peer absolute top-0 left-0 w-full h-full opacity-0 cursor-pointer z-10">

          <p class="text-sm text-gray-600 dark:text-slate-300" wire:loading wire:target="setOrderBy">صبر کنید...
          </p>
          <p class="text-sm text-gray-600 dark:text-slate-300" wire:loading.remove wire:target="setOrderBy">
            {{ __('messages.' . $selectedOrderBy) }}</p>
          <span
            class="peer-checked:rotate-180 dark:text-slate-200 flex justify-center items-center -translate-x-1/4 text-xl transition-all duration-300">
            <svg class="fill-gray-600 dark:fill-slate-300 w-[15px] h-[15px] xs:w-[20px] xs:h-[20px]" width="20"
              height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd"
                d="M12.7071 14.7071C12.3166 15.0976 11.6834 15.0976 11.2929 14.7071L6.29289 9.70711C5.90237 9.31658 5.90237 8.68342 6.29289 8.29289C6.68342 7.90237 7.31658 7.90237 7.70711 8.29289L12 12.5858L16.2929 8.29289C16.6834 7.90237 17.3166 7.90237 17.7071 8.29289C18.0976 8.68342 18.0976 9.31658 17.7071 9.70711L12.7071 14.7071Z" />
            </svg>
          </span>

          <div
            class="absolute top-8 left-0 z-20 w-full md:w-56 py-2 h-max bg-white dark:bg-slate-800 rounded-md drop-shadow-lg shadow-slate-500 opacity-0 invisible peer-checked:top-12 peer-checked:opacity-100 peer-checked:visible transition-all duration-300">
            <x-dropdown-item :selected="$selectedOrderBy" name="updated_at" fun='setOrderBy' />
            <x-dropdown-item :selected="$selectedOrderBy" name="created_at" fun='setOrderBy' />
            <x-dropdown-item :selected="$selectedOrderBy" name="name" fun='setOrderBy' />
            <x-dropdown-item :selected="$selectedOrderBy" name="id" fun='setOrderBy' />
          </div>
        </div>
      </div>
      {{-- End Filter Order By --}}
    </div>
  </div>
  @if (count($users ?? 0) > 0)
    <div class="overflow-x-auto">
      <table class="w-full text-sm text-left rtl:text-right shadow-md text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
            <th scope="col" class="px-6 py-3 whitespace-nowrap">
              شماره
            </th>
            <th scope="col" class="px-6 py-3 whitespace-nowrap">
              مشخصات
            </th>
            <th scope="col" class="px-6 py-3 whitespace-nowrap">
              نوع حساب
            </th>
            <th scope="col" class="px-6 py-3 whitespace-nowrap">
              تاریخ ثبت نام
            </th>
            <th scope="col" class="px-6 py-3 whitespace-nowrap">
              عملیات
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
            <tr wire:key="user-{{ $user->id }}"
              class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
              <td scope="row" class="align-middle px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                <p class="font-bold">#{{ $user->id }}</p>
              </td>
              <td scope="row" class="align-middle px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                <div class="flex items-center justify-start w-max">
                  <img class="w-10 h-10 rounded-full" src="{{ route('user-avatar', ['user' => $user->id]) }}"
                    alt="{{ $user->name() }}">
                  <div class="ps-3">
                    <div class="text-base font-semibold">{{ $user->name() }}</div>
                    <div class="font-normal text-gray-500">{{ $user->email }}</div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                {{ $user->is_seller ? 'فروشنده' : 'مشتری' }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  {{ verta($user->created_at)->format('d F Y') }} ({{ verta($user->created_at)->formatDifference() }})
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <a href="{{ route('admin.user.dashboard', ['user' => $user->id]) }}"
                  class="group flex justify-start items-center w-fit p-1 font-medium rounded-sm text-white bg-blue-600 hover:bg-blue-600/80 border border-blue-800 transition-all duration-200">
                  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="lucide lucide-eye pe-1">
                    <path
                      d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0" />
                    <circle cx="12" cy="12" r="3" />
                  </svg>
                  <span class="text-xs ps-1 border-s border-blue-800">جزئیات کاربر</span>
                </a>
                @if ($user->is_seller)
                  <button wire:key="user-customer-{{ $user->id }}"
                    wire:click="makeCustomer({{ $user->id }})"
                    class="group flex justify-start items-center w-fit p-1 mt-1 font-medium rounded-sm text-white bg-green-600 hover:bg-green-600/80 border border-green-800 transition-all duration-200">
                    <svg wire:loading.remove.flex wire:target="makeCustomer({{ $user->id }})"
                      xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                      fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                      stroke-linejoin="round" class="lucide lucide-circle-user pe-1">
                      <circle cx="12" cy="12" r="10" />
                      <circle cx="12" cy="10" r="3" />
                      <path d="M7 20.662V19a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v1.662" />
                    </svg>
                    <span wire:loading.flex wire:target="makeCustomer({{ $user->id }})" class="flex pe-1">
                      <x-spinner size="[15px]" color="white" />
                    </span>
                    <span class="text-xs ps-1 border-s border-green-800">تبدیل به مشتری</span>
                  </button>
                @else
                  <button wire:key="user-seller-{{ $user->id }}" wire:click="makeSeller({{ $user->id }})"
                    class="group flex justify-start items-center w-fit p-1 mt-1 font-medium rounded-sm text-white bg-lime-600 hover:bg-lime-600/80 border border-lime-800 transition-all duration-200">
                    <svg wire:loading.remove.flex wire:target="makeSeller({{ $user->id }})"
                      xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                      fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                      stroke-linejoin="round" class="lucide lucide-square-user pe-1">
                      <rect width="18" height="18" x="3" y="3" rx="2" />
                      <circle cx="12" cy="10" r="3" />
                      <path d="M7 21v-2a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v2" />
                    </svg>
                    <span wire:loading.flex wire:target="makeSeller({{ $user->id }})" class="flex pe-1">
                      <x-spinner size="[15px]" color="white" />
                    </span>
                    <span class="text-xs ps-1 border-s border-lime-800">تبدیل به فروشنده</span>
                  </button>
                @endif
                @if ($user->isBanned())
                  <button wire:key="unban-user-{{ $user->id }}" wire:click="unbanUser({{ $user->id }})"
                    class="group flex justify-start items-center w-fit p-1 mt-1 font-medium rounded-sm text-white bg-orange-600 hover:bg-orange-600/80 border border-orange-800 transition-all duration-200">
                    <svg wire:loading.remove.flex wire:target="unbanUser({{ $user->id }})"
                      xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                      fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                      stroke-linejoin="round" class="lucide lucide-circle-minus pe-1">
                      <circle cx="12" cy="12" r="10" />
                      <path d="M8 12h8" />
                    </svg>
                    <span wire:loading.flex wire:target="unbanUser({{ $user->id }})" class="flex pe-1">
                      <x-spinner size="[15px]" color="white" />
                    </span>
                    <span class="text-xs ps-1 border-s border-orange-800">لغو مسدودیت</span>
                  </button>
                @else
                  <button wire:key="ban-user-{{ $user->id }}" wire:click="banUser({{ $user->id }})"
                    class="group flex justify-start items-center w-fit p-1 mt-1 font-medium rounded-sm text-white bg-red-600 hover:bg-red-600/80 border border-red-800 transition-all duration-200">
                    <svg wire:loading.remove.flex wire:target="banUser({{ $user->id }})"
                      xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                      fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                      stroke-linejoin="round" class="lucide lucide-ban pe-1">
                      <circle cx="12" cy="12" r="10" />
                      <path d="m4.9 4.9 14.2 14.2" />
                    </svg>
                    <span wire:loading.flex wire:target="banUser({{ $user->id }})" class="flex pe-1">
                      <x-spinner size="[15px]" color="white" />
                    </span>
                    <span class="text-xs ps-1 border-s border-red-800">مسدود کردن</span>
                  </button>
                @endif
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="my-3" dir="ltr">
      {{ $users->links(data: ['scrollTo' => false]) }}
    </div>
  @else
    <p class="text-sm text-redy text-center">متاسفانه کاربری پیدا نشد!</p>
  @endif
</div>
