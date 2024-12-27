<div>
  <div>
    <div wire:poll.10s>
      <div class="flex items-baseline sm:items-end justify-between flex-column flex-wrap flex-col sm:flex-row pb-4 mt-8">
        <div class="w-full sm:w-3/5 pe-0 sm:pe-2 pb-2 sm:pb-0">
          <div class="flex justify-between">
            <label for="searchName"
              class="block text-right text-sm text-slate-600 dark:text-gray-400 mb-1 font-semibold">جستوجو
              (نام محصول)</label>
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
          </div>
        </div>
        <div class="w-full sm:w-2/5 ps-0 sm:ps-2 pt-2 sm:pt-0">
          <div class="flex justify-between">
            <label for="searchId"
              class="block text-right text-sm text-slate-600 dark:text-gray-400 mb-1 font-semibold">جستوجو
              (شماره محصول)</label>
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
          </div>
        </div>
      </div>
      {{-- Filters --}}
      <div>
        <div class="flex justify-between items-center flex-col md:flex-row gap-4 w-full pb-8">
          {{-- Start Filter Status --}}
          <div class="block md:flex items-center justify-start flex-wrap gap-4 w-full md:w-auto">
            <p class="dark:text-white mb-1 md:mb-0">فیلتر وضعیت:</p>
            <div>
              <div
                class="relative w-full md:w-52 dark:text-slate-200 has-[input:checked]:bg-layout dark:has-[input:checked]:bg-slate-700 flex justify-between items-center bg-white dark:bg-slate-800 border-white dark:border-slate-800 border-[1px] rounded-full px-2 xs:px-4 py-2 transition-all duration-300">
                <input type="checkbox" id="filter-status-dropdown-checkbox"
                  class="dropdown peer absolute top-0 left-0 w-full h-full opacity-0 cursor-pointer z-10">

                <p class="text-sm text-gray-600 dark:text-slate-300" wire:loading wire:target="setStatus">
                  صبر
                  کنید...
                </p>
                <p class="text-sm text-gray-600 dark:text-slate-300" wire:loading.remove wire:target="setStatus">
                  {{ __('messages.' . $selectedStatus) }}</p>
                <span
                  class="peer-checked:rotate-180 dark:text-slate-200 flex justify-center items-center -translate-x-1/4 text-xl transition-all duration-300">
                  <svg class="fill-gray-600 dark:fill-slate-300 w-[15px] h-[15px] xs:w-[20px] xs:h-[20px]"
                    width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M12.7071 14.7071C12.3166 15.0976 11.6834 15.0976 11.2929 14.7071L6.29289 9.70711C5.90237 9.31658 5.90237 8.68342 6.29289 8.29289C6.68342 7.90237 7.31658 7.90237 7.70711 8.29289L12 12.5858L16.2929 8.29289C16.6834 7.90237 17.3166 7.90237 17.7071 8.29289C18.0976 8.68342 18.0976 9.31658 17.7071 9.70711L12.7071 14.7071Z" />
                  </svg>
                </span>

                <div
                  class="absolute top-8 left-0 z-20 w-full md:w-52 py-2 h-max bg-white dark:bg-slate-800 rounded-md drop-shadow-lg shadow-slate-500 opacity-0 invisible peer-checked:top-12 peer-checked:opacity-100 peer-checked:visible transition-all duration-300">
                  <x-dropdown-item :selected="$selectedStatus" name="all" fun='setStatus' />
                  <x-dropdown-item :selected="$selectedStatus" name="deleted" fun='setStatus' />
                </div>
              </div>
            </div>
          </div>
          {{-- End Filter Status --}}
          {{-- Start Filter OrderBy --}}
          <div class="block md:flex items-center justify-start flex-wrap gap-4 w-full md:w-auto">
            <p class="dark:text-white mb-1 md:mb-0">فیلتر چینش:</p>
            <div>
              <span class="hidden w-[15px] h-[15px]"></span>
              <div
                class="relative w-full md:w-52 dark:text-slate-200 has-[input:checked]:bg-layout dark:has-[input:checked]:bg-slate-700 flex justify-between items-center bg-white dark:bg-slate-800 border-white dark:border-slate-800 border-[1px] rounded-full px-2 xs:px-4 py-2 transition-all duration-300">
                <input type="checkbox" id="filter-orderby-dropdown-checkbox"
                  class="dropdown peer absolute top-0 left-0 w-full h-full opacity-0 cursor-pointer z-10">

                <p class="text-sm text-gray-600 dark:text-slate-300" wire:loading wire:target="setOrderBy">
                  صبر
                  کنید...
                </p>
                <p class="text-sm text-gray-600 dark:text-slate-300" wire:loading.remove wire:target="setOrderBy">
                  {{ __('messages.' . $selectedOrderBy) }}
                </p>
                <span
                  class="peer-checked:rotate-180 dark:text-slate-200 flex justify-center items-center -translate-x-1/4 text-xl transition-all duration-300">
                  <svg class="fill-gray-600 dark:fill-slate-300 w-[15px] h-[15px] xs:w-[20px] xs:h-[20px]"
                    width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M12.7071 14.7071C12.3166 15.0976 11.6834 15.0976 11.2929 14.7071L6.29289 9.70711C5.90237 9.31658 5.90237 8.68342 6.29289 8.29289C6.68342 7.90237 7.31658 7.90237 7.70711 8.29289L12 12.5858L16.2929 8.29289C16.6834 7.90237 17.3166 7.90237 17.7071 8.29289C18.0976 8.68342 18.0976 9.31658 17.7071 9.70711L12.7071 14.7071Z" />
                  </svg>
                </span>

                <div
                  class="absolute top-8 right-0 z-20 w-full md:w-52 py-2 h-max bg-white dark:bg-slate-800 rounded-md drop-shadow-lg shadow-slate-500 opacity-0 invisible peer-checked:top-12 peer-checked:opacity-100 peer-checked:visible transition-all duration-300">
                  <x-dropdown-item :selected="$selectedOrderBy" name="updated_at" fun='setOrderBy' />
                  <x-dropdown-item :selected="$selectedOrderBy" name="created_at" fun='setOrderBy' />
                  <x-dropdown-item :selected="$selectedOrderBy" name="id" fun='setOrderBy' />
                </div>
              </div>
            </div>
          </div>
          {{-- End Filter OrderBy --}}
          {{-- Start Filter Category --}}
          <div class="block md:flex items-center justify-start flex-wrap gap-4 w-full md:w-auto">
            <p class="dark:text-white mb-1 md:mb-0">فیلتر دسته بندی:</p>
            <div>
              <div
                class="relative w-full md:w-52 dark:text-slate-200 has-[input:checked]:bg-layout dark:has-[input:checked]:bg-slate-700 flex justify-between items-center bg-white dark:bg-slate-800 border-white dark:border-slate-800 border-[1px] rounded-full px-2 xs:px-4 py-2 transition-all duration-300">
                <input type="checkbox" id="filter-category-dropdown-checkbox"
                  class="dropdown peer absolute top-0 left-0 w-full h-full opacity-0 cursor-pointer z-10">

                <p class="text-sm text-gray-600 dark:text-slate-300" wire:loading wire:target="setCategory">
                  صبر
                  کنید...
                </p>
                <p class="text-sm text-gray-600 dark:text-slate-300" wire:loading.remove wire:target="setCategory">
                  {{ __('messages.' . $selectedCategory) }}</p>
                <span
                  class="peer-checked:rotate-180 dark:text-slate-200 flex justify-center items-center -translate-x-1/4 text-xl transition-all duration-300">
                  <svg class="fill-gray-600 dark:fill-slate-300 w-[15px] h-[15px] xs:w-[20px] xs:h-[20px]"
                    width="20" height="20" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M12.7071 14.7071C12.3166 15.0976 11.6834 15.0976 11.2929 14.7071L6.29289 9.70711C5.90237 9.31658 5.90237 8.68342 6.29289 8.29289C6.68342 7.90237 7.31658 7.90237 7.70711 8.29289L12 12.5858L16.2929 8.29289C16.6834 7.90237 17.3166 7.90237 17.7071 8.29289C18.0976 8.68342 18.0976 9.31658 17.7071 9.70711L12.7071 14.7071Z" />
                  </svg>
                </span>

                <div
                  class="absolute top-8 left-0 z-20 w-full md:w-52 py-2 h-max bg-white dark:bg-slate-800 rounded-md drop-shadow-lg shadow-slate-500 opacity-0 invisible peer-checked:top-12 peer-checked:opacity-100 peer-checked:visible transition-all duration-300">
                  <x-dropdown-item :selected="$selectedCategory" name="all" fun='setCategory' />
                  <x-dropdown-item :selected="$selectedCategory" name="house" fun='setCategory' />
                  <x-dropdown-item :selected="$selectedCategory" name="office" fun='setCategory' />
                  <x-dropdown-item :selected="$selectedCategory" name="kitchen" fun='setCategory' />
                  <x-dropdown-item :selected="$selectedCategory" name="kids" fun='setCategory' />
                  <x-dropdown-item :selected="$selectedCategory" name="accessories" fun='setCategory' />
                </div>
              </div>
            </div>
          </div>
          {{-- End Filter Category --}}
        </div>
      </div>
      @if ($products && count($products) > 0)
        <div class="overflow-x-auto">
          <table class="w-full text-sm text-left rtl:text-right shadow-md text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
              <tr>
                <th scope="col" class="whitespace-nowrap px-6 py-3">
                  شماره
                </th>
                <th scope="col" class="whitespace-nowrap px-6 py-3">
                  مشخصات
                </th>
                <th scope="col" class="whitespace-nowrap px-6 py-3">
                  قیمت
                </th>
                <th scope="col" class="whitespace-nowrap px-6 py-3">
                  تخفیف
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
              @foreach ($products as $product)
                <tr wire:key="products-{{ $product->id }}"
                  class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-slate-200 dark:hover:bg-gray-900">
                  <td scope="row" class="align-middle px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                    <p class="font-bold">#{{ $product->id }}</p>
                  </td>
                  <td class="align-middle whitespace-nowrap px-6">
                    <div class="flex items-center justify-start w-max">
                      <img class="w-10 h-10" src="{{ route('product-images', ['slug' => $product->slug]) }}"
                        alt="{{ $product->name }}">
                      <div class="ps-3">
                        <p class="block text-slate-800 dark:text-slate-200 text-base font-semibold">
                          {{ $product->name }}</p>
                        <div class="font-normal text-gray-500">
                          دسته بندی:
                          {{ __('messages.' . $product->category) }}
                        </div>
                      </div>
                    </div>
                  </td>
                  <td class="align-middle whitespace-nowrap px-6 py-4">
                    {{ number_format($product->price) }} تومان
                  </td>
                  <td scope="row" class="align-middle px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $product->discount ? "$product->discount %" : 'ندارد' }}
                  </td>
                  <td class="align-middle whitespace-nowrap px-6 py-4">
                    {{ verta($product->created_at)->format('d F Y') }}
                    ({{ verta($product->created_at)->formatDifference() }})
                  </td>
                  <td class="align-middle whitespace-nowrap px-6 py-4">
                    @if ($product->trashed())
                      <button wire:key="restore-product-{{ $product->id }}"
                        wire:click="restoreProduct('{{ $product->slug }}')"
                        class="group flex justify-start items-center w-fit p-1 mt-1 font-medium rounded-sm text-white bg-orange-600 hover:bg-orange-600/80 border border-orange-800 transition-all duration-200">
                        <svg wire:loading.remove.flex wire:target="restoreProduct('{{ $product->slug }}')"
                          xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                          fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round" class="lucide lucide-archive-restore pe-1">
                          <rect width="20" height="5" x="2" y="3" rx="1" />
                          <path d="M4 8v11a2 2 0 0 0 2 2h2" />
                          <path d="M20 8v11a2 2 0 0 1-2 2h-2" />
                          <path d="m9 15 3-3 3 3" />
                          <path d="M12 12v9" />
                        </svg>
                        <span wire:loading.flex wire:target="restoreProduct('{{ $product->slug }}')"
                          class="flex pe-1">
                          <x-spinner size="[15px]" color="white" />
                        </span>
                        <span class="text-xs ps-1 border-s border-orange-800">بازگردانی محصول</span>
                      </button>
                      <button wire:key="force-delete-product-{{ $product->id }}"
                        wire:click="forceDeleteProduct('{{ $product->slug }}')"
                        class="group flex justify-start items-center w-fit p-1 mt-1 font-medium rounded-sm text-white bg-red-600 hover:bg-red-600/80 border border-red-800 transition-all duration-200">
                        <svg wire:loading.remove.flex wire:target="forceDeleteProduct('{{ $product->slug }}')"
                          xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                          fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round" class="lucide lucide-trash-2 pe-1">
                          <path d="M3 6h18" />
                          <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                          <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                          <line x1="10" x2="10" y1="11" y2="17" />
                          <line x1="14" x2="14" y1="11" y2="17" />
                        </svg>
                        <span wire:loading.flex wire:target="forceDeleteProduct('{{ $product->slug }}')"
                          class="flex pe-1">
                          <x-spinner size="[15px]" color="white" />
                        </span>
                        <span class="text-xs ps-1 border-s border-red-800">حذف کامل محصول</span>
                      </button>
                    @else
                      <a href="{{ route('admin.products.edit', ['slug' => $product->slug]) }}"
                        class="group flex justify-start items-center w-fit p-1 font-medium rounded-sm text-white bg-blue-600 hover:bg-blue-600/80 border border-blue-800 transition-all duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                          fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round" class="lucide lucide-pencil pe-1">
                          <path
                            d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z" />
                          <path d="m15 5 4 4" />
                        </svg>
                        <span class="text-xs ps-1 border-s border-blue-800">ویرایش</span>
                      </a>
                      <button wire:key="delete-product-{{ $product->id }}"
                        wire:click="deleteProduct('{{ $product->slug }}')"
                        class="group flex justify-start items-center w-fit p-1 mt-1 font-medium rounded-sm text-white bg-red-600 hover:bg-red-600/80 border border-red-800 transition-all duration-200">
                        <svg wire:loading.remove.flex wire:target="deleteProduct('{{ $product->slug }}')"
                          xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                          fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round" class="lucide lucide-trash-2 pe-1">
                          <path d="M3 6h18" />
                          <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                          <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                          <line x1="10" x2="10" y1="11" y2="17" />
                          <line x1="14" x2="14" y1="11" y2="17" />
                        </svg>
                        <span wire:loading.flex wire:target="deleteProduct('{{ $product->slug }}')"
                          class="flex pe-1">
                          <x-spinner size="[15px]" color="white" />
                        </span>
                        <span class="text-xs ps-1 border-s border-red-800">حذف محصول</span>
                      </button>
                    @endif
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @else
        <p class="text-redy text-center my-3">متاسفانه محصولی پیدا نشد!</p>
      @endif

      <div dir="ltr" class="mt-4 mb-8">
        {{ $products->links(data: ['scrollTo' => false]) }}
      </div>
    </div>
  </div>

</div>
