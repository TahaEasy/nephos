<div>
  <div wire:poll.10s>
    <div class="flex items-baseline sm:items-end justify-between flex-column flex-wrap flex-col sm:flex-row pb-4 mt-8">
      <div class="w-full sm:w-3/5 pe-0 sm:pe-2 pb-2 sm:pb-0">
        <div class="flex justify-between">
          <label for="searchId"
            class="block text-right text-sm text-slate-600 dark:text-gray-400 mb-1 font-semibold">جستوجو
            (شماره سفارش)</label>
        </div>
        <div class="relative text-right w-full">
          <input type="text" autocomplete="off" name="searchId" id="searchId" wire:model.live="searchId"
            wire:keydown="resetPage"
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
    <div class="block sm:flex items-center justify-start flex-wrap gap-8 pb-4">
      <div
        class="flex flex-col sm:flex-row items-start sm:items-center justify-between flex-wrap gap-2 sm:gap-4 mt-4 sm:mt-0">
        <p class="dark:text-white">فیلتر وضعیت:</p>
        <div class="w-full sm:w-auto">
          <span class="hidden w-[15px] h-[15px]"></span>
          <div
            class="relative w-full sm:w-56 dark:text-slate-200 has-[input:checked]:bg-layout dark:has-[input:checked]:bg-slate-700 flex justify-between items-center bg-white dark:bg-slate-800 border-white dark:border-slate-800 border-[1px] rounded-full px-2 xs:px-4 py-2 transition-all duration-300">
            <input type="checkbox" id="status-dropdown-checkbox"
              class="dropdown peer absolute top-0 left-0 w-full h-full opacity-0 cursor-pointer z-10">

            <p class="text-sm text-gray-600 dark:text-slate-300" wire:loading wire:target="setStatus">صبر
              کنید...
            </p>
            <p class="text-sm text-gray-600 dark:text-slate-300" wire:loading.remove wire:target="setStatus">
              {{ __('messages.' . $selectedStatus) }}
            </p>
            <span
              class="peer-checked:rotate-180 dark:text-slate-200 flex justify-center items-center -translate-x-1/4 text-xl transition-all duration-300">
              <svg class="fill-gray-600 dark:fill-slate-300 w-[15px] h-[15px] xs:w-[20px] xs:h-[20px]" width="20"
                height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M12.7071 14.7071C12.3166 15.0976 11.6834 15.0976 11.2929 14.7071L6.29289 9.70711C5.90237 9.31658 5.90237 8.68342 6.29289 8.29289C6.68342 7.90237 7.31658 7.90237 7.70711 8.29289L12 12.5858L16.2929 8.29289C16.6834 7.90237 17.3166 7.90237 17.7071 8.29289C18.0976 8.68342 18.0976 9.31658 17.7071 9.70711L12.7071 14.7071Z" />
              </svg>
            </span>

            <div
              class="absolute top-8 right-0 z-20 w-full sm:w-56 py-2 h-max bg-white dark:bg-slate-800 rounded-md drop-shadow-lg shadow-slate-500 opacity-0 invisible peer-checked:top-12 peer-checked:opacity-100 peer-checked:visible transition-all duration-300">
              <x-dropdown-item :selected="$selectedStatus" name="waiting" fun='setStatus' />
              <x-dropdown-item :selected="$selectedStatus" name="in-progress" fun='setStatus' />
              <x-dropdown-item :selected="$selectedStatus" name="sending" fun='setStatus' />
              <x-dropdown-item :selected="$selectedStatus" name="delivered" fun='setStatus' />
              <x-dropdown-item :selected="$selectedStatus" name="failure" fun='setStatus' />
              <x-dropdown-item :selected="$selectedStatus" name="all" fun='setStatus' />
            </div>
          </div>
        </div>
      </div>
      <div
        class="flex flex-col sm:flex-row items-start sm:items-center justify-between flex-wrap gap-2 sm:gap-4 mb-4 sm:mb-0">
        <p class="dark:text-white">فیلتر چینش:</p>
        <div class="w-full sm:w-auto">
          <span class="hidden w-[15px] h-[15px]"></span>
          <div
            class="relative w-full sm:w-56 dark:text-slate-200 has-[input:checked]:bg-layout dark:has-[input:checked]:bg-slate-700 flex justify-between items-center bg-white dark:bg-slate-800 border-white dark:border-slate-800 border-[1px] rounded-full px-2 xs:px-4 py-2 transition-all duration-300">
            <input type="checkbox" id="order-dropdown-checkbox"
              class="dropdown peer absolute top-0 left-0 w-full h-full opacity-0 cursor-pointer z-10">

            <p class="text-sm text-gray-600 dark:text-slate-300" wire:loading wire:target="setOrderBy">صبر
              کنید...
            </p>
            <p class="text-sm text-gray-600 dark:text-slate-300" wire:loading.remove wire:target="setOrderBy">
              {{ __('messages.' . $selectedOrderBy) }}
            </p>
            <span
              class="peer-checked:rotate-180 dark:text-slate-200 flex justify-center items-center -translate-x-1/4 text-xl transition-all duration-300">
              <svg class="fill-gray-600 dark:fill-slate-300 w-[15px] h-[15px] xs:w-[20px] xs:h-[20px]" width="20"
                height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M12.7071 14.7071C12.3166 15.0976 11.6834 15.0976 11.2929 14.7071L6.29289 9.70711C5.90237 9.31658 5.90237 8.68342 6.29289 8.29289C6.68342 7.90237 7.31658 7.90237 7.70711 8.29289L12 12.5858L16.2929 8.29289C16.6834 7.90237 17.3166 7.90237 17.7071 8.29289C18.0976 8.68342 18.0976 9.31658 17.7071 9.70711L12.7071 14.7071Z" />
              </svg>
            </span>

            <div
              class="absolute top-8 right-0 z-20 w-full sm:w-56 py-2 h-max bg-white dark:bg-slate-800 rounded-md drop-shadow-lg shadow-slate-500 opacity-0 invisible peer-checked:top-12 peer-checked:opacity-100 peer-checked:visible transition-all duration-300">
              <x-dropdown-item :selected="$selectedOrderBy" name="updated_at" fun='setOrderBy' />
              <x-dropdown-item :selected="$selectedOrderBy" name="created_at" fun='setOrderBy' />
              <x-dropdown-item :selected="$selectedOrderBy" name="id" fun='setOrderBy' />
            </div>
          </div>
        </div>
      </div>
    </div>
    @if (count($orders ?? 0) > 0)
      <div class="overflow-x-auto pb-14">
        <table class="w-full text-sm text-left rtl:text-right shadow-md text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th scope="col" class="whitespace-nowrap px-6 py-3">
                شماره
              </th>
              <th scope="col" class="whitespace-nowrap px-6 py-3">
                <div class="flex justify-center items-center">
                  <div class="relative flex flex-col items-center group">
                    <i class="fad fa-question-circle text-lg text-gray-600 dark:text-white"></i>
                    <div
                      class="absolute top-0 right-0 group-hover:opacity-100 group-hover:visible flex flex-col items-start opacity-0 invisible mt-8 transition-all duration-100">
                      <div class="w-3 h-3 -mb-2 rotate-45 bg-gray-600"></div>
                      <span
                        class="relative w-max z-10 p-2 -ms-3 text-xs rounded-sm leading-none text-white whitespace-no-wrap bg-gray-600 shadow-lg">
                        <p>وضعیت:</p>
                        <ul>
                          <li class="my-2">
                            <strong class="text-yellow-500">در انتظار تایید:</strong> ابتدا سفارش باید تایید شود تا
                            مراحل
                            آماده سازی سفارش شروع شوند
                          </li>
                          <li class="my-2">
                            <strong class="text-cyan-500">آماده سازی:</strong> محصولات سفارش در حال آماده سازی و
                            بارگیری
                            میباشند
                          </li>
                          <li class="my-2">
                            <strong class="text-purple-500">درحال ارسال:</strong> سفارش در حال انتقال است و در انتظار
                            رسیدن به دست مشتری میباشد
                          </li>
                          <li class="my-2">
                            <strong class="text-green-600">تکمیل:</strong> سفارش با موفقیت به دست مشتری رسیده
                          </li>
                          <li class="my-2">
                            <strong class="text-red-500">ناموفق:</strong> سفارش هنگام خریداری لغو شده یا با مشکل مواجه
                            شده است
                          </li>
                        </ul>
                      </span>
                    </div>
                  </div>
                </div>
              </th>
              <th scope="col" class="whitespace-nowrap px-6 py-3">
                سفارش دهنده
              </th>
              <th scope="col" class="whitespace-nowrap px-6 py-3">
                کل مبلغ
              </th>
              <th scope="col" class="whitespace-nowrap px-6 py-3">
                تاریخ ثبت
              </th>
              <th scope="col" class="whitespace-nowrap px-6 py-3">
                عملیات
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($orders as $order)
              <tr wire:key="order-{{ $order->id }}"
                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-slate-200 dark:hover:bg-gray-900">
                <td scope="row" class="align-middle px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                  <p class="font-bold">#{{ $order->id }}</p>
                </td>
                <td class="align-middle whitespace-nowrap px-6">
                  <div class="flex justify-center items-center">
                    <div class="flex flex-col items-center group">
                      @if ($order->status === 'in-progress')
                        <div class="relative w-fit h-fit bg-cyan-600/30 p-1 rounded-full">
                          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="text-cyan-600 lucide lucide-refresh-ccw">
                            <path d="M21 12a9 9 0 0 0-9-9 9.75 9.75 0 0 0-6.74 2.74L3 8" />
                            <path d="M3 3v5h5" />
                            <path d="M3 12a9 9 0 0 0 9 9 9.75 9.75 0 0 0 6.74-2.74L21 16" />
                            <path d="M16 16h5v5" />
                          </svg>
                          <div
                            class="absolute bottom-0 right-1/2 translate-x-1/2 group-hover:opacity-100 group-hover:visible flex flex-col items-center opacity-0 invisible mb-7 transition-all duration-100">
                            <span
                              class="relative w-max z-10 p-2 rounded-sm text-xs leading-none text-white whitespace-no-wrap bg-cyan-600 shadow-lg">آماده
                              سازی</span>
                            <div class="w-3 h-3 -mt-2 rotate-45 bg-cyan-600"></div>
                          </div>
                        </div>
                      @endif
                      @if ($order->status === 'waiting')
                        <div class="relative w-fit h-fit bg-yellow-600/30 p-1 rounded-full">
                          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="text-yellow-600 lucide lucide-clock">
                            <circle cx="12" cy="12" r="10" />
                            <polyline points="12 6 12 12 16 14" />
                          </svg>
                          <div
                            class="absolute bottom-0 right-1/2 translate-x-1/2 group-hover:opacity-100 group-hover:visible flex flex-col items-center opacity-0 invisible mb-7 transition-all duration-100">
                            <span
                              class="relative w-max z-10 p-2 rounded-sm text-xs leading-none text-white whitespace-no-wrap bg-yellow-600 shadow-lg">در
                              انتظار تایید</span>
                            <div class="w-3 h-3 -mt-2 rotate-45 bg-yellow-600"></div>
                          </div>
                        </div>
                      @endif
                      @if ($order->status === 'sending')
                        <div class="relative w-fit h-fit bg-purple-600/30 p-1 rounded-full">
                          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="text-purple-600 lucide lucide-truck">
                            <path d="M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2" />
                            <path d="M15 18H9" />
                            <path d="M19 18h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.624l-3.48-4.35A1 1 0 0 0 17.52 8H14" />
                            <circle cx="17" cy="18" r="2" />
                            <circle cx="7" cy="18" r="2" />
                          </svg>
                          <div
                            class="absolute bottom-0 right-1/2 translate-x-1/2 group-hover:opacity-100 group-hover:visible flex flex-col items-center opacity-0 invisible mb-7 transition-all duration-100">
                            <span
                              class="relative w-max z-10 p-2 rounded-sm text-xs leading-none text-white whitespace-no-wrap bg-purple-600 shadow-lg">درحال
                              ارسال</span>
                            <div class="w-3 h-3 -mt-2 rotate-45 bg-purple-600"></div>
                          </div>
                        </div>
                      @endif
                      @if ($order->status === 'delivered')
                        <div class="relative w-fit h-fit bg-green-600/30 p-1 rounded-full">
                          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="text-green-600 lucide lucide-package-check">
                            <path d="m16 16 2 2 4-4" />
                            <path
                              d="M21 10V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l2-1.14" />
                            <path d="m7.5 4.27 9 5.15" />
                            <polyline points="3.29 7 12 12 20.71 7" />
                            <line x1="12" x2="12" y1="22" y2="12" />
                          </svg>
                          <div
                            class="absolute bottom-0 right-1/2 translate-x-1/2 group-hover:opacity-100 group-hover:visible flex flex-col items-center opacity-0 invisible mb-7 transition-all duration-100">
                            <span
                              class="relative w-max z-10 p-2 rounded-sm text-xs leading-none text-white whitespace-no-wrap bg-green-600 shadow-lg">تکمیل</span>
                            <div class="w-3 h-3 -mt-2 rotate-45 bg-green-600"></div>
                          </div>
                        </div>
                      @endif
                      @if ($order->status === 'failure')
                        <div class="relative w-fit h-fit bg-red-600/30 p-1 rounded-full">
                          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="text-red-600 lucide lucide-circle-x">
                            <circle cx="12" cy="12" r="10" />
                            <path d="m15 9-6 6" />
                            <path d="m9 9 6 6" />
                          </svg>
                          <div
                            class="absolute bottom-0 right-1/2 translate-x-1/2 group-hover:opacity-100 group-hover:visible flex flex-col items-center opacity-0 invisible mb-7 transition-all duration-100">
                            <span
                              class="relative w-max z-10 p-2 rounded-sm text-xs leading-none text-white whitespace-no-wrap bg-red-600 shadow-lg">ناموفق</span>
                            <div class="w-3 h-3 -mt-2 rotate-45 bg-red-600"></div>
                          </div>
                        </div>
                      @endif
                    </div>
                  </div>
                </td>
                <td scope="row" class="align-middle px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                  <div class="flex items-center justify-start w-max">
                    <img class="w-10 h-10 rounded-full" src="{{ route('user-avatar', ['user' => $order->user->id]) }}"
                      alt="{{ $order->user->name() }}">
                    <div class="ps-3">
                      <a href="{{ route('admin.user.orders', ['user' => $order->user->id]) }}"
                        class="block text-base font-semibold hover:text-primary hover:underline">{{ $order->user->name() }}</a>
                      <div class="font-normal text-gray-500">{{ $order->user->email }}</div>
                    </div>
                  </div>
                </td>
                <td class="align-middle whitespace-nowrap px-6 py-4">
                  {{ number_format($order->sum_price()) }} تومان
                </td>
                <td class="align-middle whitespace-nowrap px-6 py-4">
                  {{ verta($order->created_at)->format('d F Y') }}
                  ({{ verta($order->created_at)->formatDifference() }})
                </td>
                <td class="align-middle whitespace-nowrap px-6 py-4">
                  <a href="{{ route('order', ['order' => $order->id]) }}"
                    class="group flex justify-start items-center w-fit p-1 font-medium rounded-sm text-white bg-blue-600 hover:bg-blue-600/80 border border-blue-800 transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                      fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                      stroke-linejoin="round" class="lucide lucide-eye pe-1">
                      <path
                        d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0" />
                      <circle cx="12" cy="12" r="3" />
                    </svg>
                    <span class="text-xs ps-1 border-s border-blue-800">جزئیات سفارش</span>
                  </a>
                  @if ($order->status === 'sending')
                    <a href="javascript:void(0)" wire:click="updateOrder({{ $order->id }})"
                      class="group flex justify-start items-center w-fit p-1 mt-2 font-medium rounded-sm text-white bg-green-600 hover:bg-green-600/80 border border-green-800 transition-all duration-200">
                      <svg wire:loading.remove.flex wire:target="updateOrder({{ $order->id }})"
                        xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-chevrons-up pe-1">
                        <path d="m17 11-5-5-5 5" />
                        <path d="m17 18-5-5-5 5" />
                      </svg>
                      <span wire:loading.flex wire:target="updateOrder({{ $order->id }})" class="flex pe-1">
                        <x-spinner size="[15px]" color="white" />
                      </span>
                      <span class="text-xs ps-1 border-s border-green-800">بروزرسانی وضعیت به "تکمیل"</span>
                    </a>
                  @endif
                  @if ($order->status === 'waiting')
                    <a href="javascript:void(0)" wire:click="updateOrder({{ $order->id }})"
                      class="group flex justify-start items-center w-fit p-1 mt-2 font-medium rounded-sm text-white bg-cyan-600 hover:bg-cyan-600/80 border border-cyan-800 transition-all duration-200">
                      <svg wire:loading.remove.flex wire:target="updateOrder({{ $order->id }})"
                        xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-chevrons-up pe-1">
                        <path d="m17 11-5-5-5 5" />
                        <path d="m17 18-5-5-5 5" />
                      </svg>
                      <span wire:loading.flex wire:target="updateOrder({{ $order->id }})" class="flex pe-1">
                        <x-spinner size="[15px]" color="white" />
                      </span>
                      <span class="text-xs ps-1 border-s border-cyan-800">بروزرسانی وضعیت به "درحال آماده سازی"</span>
                    </a>
                  @endif
                  @if ($order->status === 'in-progress')
                    <a href="javascript:void(0)" wire:click="updateOrder({{ $order->id }})"
                      class="group flex justify-start items-center w-fit p-1 mt-2 font-medium rounded-sm text-white bg-purple-600 hover:bg-purple-600/80 border border-purple-800 transition-all duration-200">
                      <svg wire:loading.remove.flex wire:target="updateOrder({{ $order->id }})"
                        xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-chevrons-up pe-1">
                        <path d="m17 11-5-5-5 5" />
                        <path d="m17 18-5-5-5 5" />
                      </svg>
                      <span wire:loading.flex wire:target="updateOrder({{ $order->id }})" class="flex pe-1">
                        <x-spinner size="[15px]" color="white" />
                      </span>
                      <span class="text-xs ps-1 border-s border-purple-800">بروزرسانی وضعیت به "درحال ارسال"</span>
                    </a>
                  @endif
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    @else
      <p class="text-redy text-center my-3">متاسفانه هیچ سفارشی پیدا نشد!</p>
    @endif

    <div dir="ltr" class="mt-4">
      {{ $orders->links(data: ['scrollTo' => false]) }}
    </div>
  </div>
</div>
