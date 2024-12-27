<div class="min-h-screen">
  <div class="flex justify-center items-center w-full h-full">
    @vite('resources/js/sortMenu.js')
    <div class="w-9/12 mt-12">
      @auth
        <x-modal header="افزودن به لیست علاقه مندی" modal="wishlist" wire:key="wishlist-modal">
          <livewire:forms.create-wishlist-item-form />
        </x-modal>
      @endauth

      <div class="flex items-baseline sm:items-end justify-between flex-column flex-wrap flex-col sm:flex-row pb-4 mt-8">
        <div class="w-full">
          <div class="flex justify-between">
            <label for="search"
              class="block text-right text-sm text-slate-600 dark:text-gray-400 mb-1 font-semibold">جستوجو
              (نام محصول)</label>
          </div>
          <div class="relative text-right w-full">
            <input type="text" autocomplete="off" name="search" id="search"
              wire:model.live.trim.debounce.300ms="search" wire:change="reset_page"
              class="peer outline-none rounded-sm dark:border-gray-700 focus:dark:border-gray-300 border-gray-300 hover:border-gray-400 focus:border-gray-700 dark:bg-slate-800 dark:text-slate-200 border-[1px] w-full py-2 pe-2 ps-12 transition-all duration-200">
            <span
              class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-300 peer-focus:text-primary ransition-all duration-200">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
              </svg>
            </span>
            <span wire:loading.flex wire:target="search" class="flex absolute left-4 top-1/2 -translate-y-1/2">
              <x-spinner size="[18px]" color="gray-400" />
            </span>
          </div>
        </div>
      </div>


      {{-- Filters --}}
      <div>
        <div
          class="flex justify-between items-start md:items-center xl:items-center flex-col md:flex-row gap-8 w-full pb-8">
          <div class="flex justify-start items-center flex-col md:flex-row gap-4 md:gap-8 w-full">
            {{-- Start Filter Category --}}
            <div class="block md:flex items-center justify-start flex-wrap gap-4 w-full md:w-auto">
              <p class="block md:hidden lg:block text-sm dark:text-white mb-1 md:mb-0">فیلتر دسته بندی:</p>
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
            {{-- Start order by dropdown --}}
            <div class="block md:flex items-center justify-start flex-wrap gap-4 w-full md:w-auto">
              <p class="block md:hidden lg:block text-sm dark:text-white mb-1 md:mb-0">فیلتر چینش:</p>
              <div
                class="relative w-full md:w-52 dark:text-slate-200 has-[input:checked]:bg-layout dark:has-[input:checked]:bg-slate-700 flex justify-between items-center bg-white dark:bg-slate-800 border-white dark:border-slate-800 border-[1px] rounded-full px-2 xs:px-4 py-2 transition-all duration-300">
                <input type="checkbox" id="dropdown-checkbox"
                  class="dropdown peer absolute top-0 left-0 w-full h-full opacity-0 cursor-pointer z-10">

                <p class="text-sm text-gray-600 dark:text-slate-300" wire:loading wire:target="setOrderBy">
                  صبر
                  کنید...
                </p>
                <p class="text-sm text-gray-600 dark:text-slate-300" wire:loading.remove wire:target="setOrderBy">
                  {{ __('messages.' . $orderBy) }}</p>
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
                  <x-dropdown-item :selected="$orderBy" name="newest-products" fun='setOrderBy' />
                  <x-dropdown-item :selected="$orderBy" name="cheapest-products" fun='setOrderBy' />
                  <x-dropdown-item :selected="$orderBy" name="most-expensive-products" fun='setOrderBy' />
                  <x-dropdown-item :selected="$orderBy" name="most-discount" fun='setOrderBy' />
                </div>
              </div>
            </div>
            {{-- End order by dropdown --}}
          </div>
          {{-- Start Set Style --}}
          <div class="hidden xs:flex justify-between items-center">
            <div class="flex justify-start items-center gap-2">
              @if ($productStyle == 'block')
                <a href="javascript:void(0)" class="text-primary pointer-events-none">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="feather feather-grid">
                    <rect x="3" y="3" width="7" height="7"></rect>
                    <rect x="14" y="3" width="7" height="7"></rect>
                    <rect x="14" y="14" width="7" height="7"></rect>
                    <rect x="3" y="14" width="7" height="7"></rect>
                  </svg>
                </a>
              @else
                <a href="javascript:void(0)" wire:click="setStyle('block')" class="hidden xs:block text-gray-400">
                  <svg xmlns="http://www.w3.org/2000/svg" wire:loading.remove.flex wire:target="setStyle('block')"
                    width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid">
                    <rect x="3" y="3" width="7" height="7"></rect>
                    <rect x="14" y="3" width="7" height="7"></rect>
                    <rect x="14" y="14" width="7" height="7"></rect>
                    <rect x="3" y="14" width="7" height="7"></rect>
                  </svg>
                  <span wire:loading.flex wire:target="setStyle('block')" class="flex justify-center items-center">
                    <x-spinner size='5' color="primary" />
                  </span>
                </a>
              @endif
              @if ($productStyle == 'list')
                <a href="javascript:void(0)" class="text-primary pointer-events-none">
                  <svg xmlns="http://www.w3.org/2000/svg" wire:loading.remove.flex wire:target="setStyle('list')"
                    width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list">
                    <line x1="8" y1="6" x2="21" y2="6"></line>
                    <line x1="8" y1="12" x2="21" y2="12"></line>
                    <line x1="8" y1="18" x2="21" y2="18"></line>
                    <line x1="3" y1="6" x2="3.01" y2="6"></line>
                    <line x1="3" y1="12" x2="3.01" y2="12"></line>
                    <line x1="3" y1="18" x2="3.01" y2="18"></line>
                  </svg>
                </a>
              @else
                <a href="javascript:void(0)" wire:click="setStyle('list')" class="hidden xs:block text-gray-400">
                  <svg xmlns="http://www.w3.org/2000/svg" wire:loading.remove.flex wire:target="setStyle('list')"
                    width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list">
                    <line x1="8" y1="6" x2="21" y2="6"></line>
                    <line x1="8" y1="12" x2="21" y2="12"></line>
                    <line x1="8" y1="18" x2="21" y2="18"></line>
                    <line x1="3" y1="6" x2="3.01" y2="6"></line>
                    <line x1="3" y1="12" x2="3.01" y2="12"></line>
                    <line x1="3" y1="18" x2="3.01" y2="18"></line>
                  </svg>
                  <span wire:loading.flex wire:target="setStyle('list')"
                    class="flex justify-center items-center w-6 h-5">
                    <x-spinner size='5' color="primary" />
                  </span>
                </a>
              @endif
            </div>
          </div>
          {{-- End Set Style --}}
        </div>
      </div>

      @if ($search)
        @if (strlen(trim($search)) > 4)
          <div>
            {{-- house --}}
            @if ($products_house)
              <div class="my-8">
                <livewire:products-header id="house" header="منزل" />
                <div class="{{ $productStyle == 'block' ? 'grid grid-cols-1 xs:grid-cols-2 gap-4' : '' }}">
                  @foreach ($products_house as $product)
                    <livewire:product :$productStyle :$product wire:key="{{ $product->id }}" />
                  @endforeach
                </div>
                <div class="mt-4" dir="ltr">
                  {{ $products_house->links(data: ['scrollTo' => '#house']) }}
                </div>
              </div>
            @endif

            {{-- office --}}
            @if ($products_office)
              <div class="my-8">
                <livewire:products-header id="office" header="محل کار" />
                <div class="{{ $productStyle == 'block' ? 'grid grid-cols-1 xs:grid-cols-2 gap-4' : '' }}">
                  @foreach ($products_office as $product)
                    <livewire:product :$productStyle :$product :key="$product->id" />
                  @endforeach
                </div>
                <div class="mt-4" dir="ltr">
                  {{ $products_office->links(data: ['scrollTo' => '#office']) }}
                </div>
              </div>
            @endif

            {{-- kids --}}
            @if ($products_kids)
              <div class="my-8">
                <livewire:products-header id="kids" header="برای کودکان" />
                <div class="{{ $productStyle == 'block' ? 'grid grid-cols-1 xs:grid-cols-2 gap-4' : '' }}">
                  @foreach ($products_kids as $product)
                    <livewire:product :$productStyle :$product :key="$product->id" />
                  @endforeach
                </div>
                <div class="mt-4" dir="ltr">
                  {{ $products_kids->links(data: ['scrollTo' => '#kids']) }}
                </div>
              </div>
            @endif

            {{-- kitchen --}}
            @if ($products_kitchen)
              <div class="my-8">
                <livewire:products-header id="kitchen" header="آشپزخانه" />
                <div class="{{ $productStyle == 'block' ? 'grid grid-cols-1 xs:grid-cols-2 gap-4' : '' }}">
                  @foreach ($products_kitchen as $product)
                    <livewire:product :$productStyle :$product :key="$product->id" />
                  @endforeach
                </div>
                <div class="mt-4" dir="ltr">
                  {{ $products_kitchen->links(data: ['scrollTo' => '#kitchen']) }}
                </div>
              </div>
            @endif

            {{-- accessories --}}
            @if ($products_accessories)
              <div class="my-8">
                <livewire:products-header id="accessories" header="لوازم جانبی" />
                <div class="{{ $productStyle == 'block' ? 'grid grid-cols-1 xs:grid-cols-2 gap-4' : '' }}">
                  @foreach ($products_accessories as $product)
                    <livewire:product :$productStyle :$product :key="$product->id" />
                  @endforeach
                </div>
                <div class="mt-4" dir="ltr">
                  {{ $products_accessories->links(data: ['scrollTo' => '#accessories']) }}
                </div>
              </div>
            @endif
          </div>
          @if (!$products_house && !$products_office && !$products_kitchen && !$products_kids && !$products_accessories)
            @if (!$selectedCategory || $selectedCategory === 'all')
              <p class="text-sm text-redy text-center">متاسفانه محصولی با این نام پیدا نشد!</p>
            @else
              <p class="text-sm text-redy text-center">متاسفانه محصولی با این نام در این دسته بندی پیدا نشد!</p>
            @endif
          @endif
        @else
          <p class="text-sm text-redy text-center">لطفا حداقل 3 حرف وارد کنید</p>
        @endif
      @else
        <p class="text-sm text-redy text-center">لطفا در کادر بالا نام یک محصول را بنویسید</p>
      @endif
    </div>

  </div>

  {{-- Sorts Menu --}}
  <div class="hidden sm:block">
    <a href="javascript:void(0)"
      class="fixed top-4 left-8 has-[input:checked]:shadow-none flex justify-center items-center bg-white dark:bg-slate-800 shadow-md p-6 rounded-full overflow-hidden h-4 z-20">
      <input type="checkbox" id="toggle-sorts-menu"
        class="peer cursor-pointer opacity-0 absolute z-20 top-0 left-0 w-full h-full">
      <span
        class="absolute w-4 h-px bg-primary dark:bg-gray-400 transition-all duration-200 top-[40%] peer-checked:top-1/2 peer-checked:rotate-45"></span>
      <span
        class="absolute w-4 h-px bg-primary dark:bg-gray-400 transition-all duration-200 peer-checked:opacity-0 top-1/2 -translate-y-1/2"></span>
      <span
        class="absolute w-4 h-px bg-primary dark:bg-gray-400 transition-all duration-200 bottom-[40%] peer-checked:bottom-1/2 peer-checked:translate-y-1/2 peer-checked:-rotate-45"></span>
    </a>

    <div
      class="fixed top-0 left-0 w-64 h-full w-76 bg-white dark:bg-slate-800 shadow-xl -translate-x-full transition-all duration-200 z-10"
      id="sorts-menu">
      <ul class="pt-16">
        <li class="w-full my-9">
          <a href="#house"
            class="group flex justify-end items-center w-full px-6 text-xs text-gray-600 hover:text-primary transition-all duration-200 font-semibold">
            <span class="ml-4">منزل</span>
            <x-product-logo type="house"
              class="fill-gray-300 dark:fill-gray-400 group-hover:fill-primary transition-all duration-200" />
          </a>
        </li>
        <li class="w-full my-9">
          <a href="#office"
            class="group flex justify-end items-center w-full px-6 text-xs text-gray-600 hover:text-primary transition-all duration-200 font-semibold">
            <span class="ml-4">محل کار</span>
            <x-product-logo type="office"
              class="fill-gray-300 dark:fill-gray-400 group-hover:fill-primary transition-all duration-200" />
          </a>
        </li>
        <li class="w-full my-9">
          <a href="#kids"
            class="group flex justify-end items-center w-full px-6 text-xs text-gray-600 hover:text-primary transition-all duration-200 font-semibold">
            <span class="ml-4">برای کودکان</span>
            <x-product-logo type="kids"
              class="fill-gray-300 dark:fill-gray-400 group-hover:fill-primary transition-all duration-200" />
          </a>
        </li>
        <li class="w-full my-9">
          <a href="#kitchen"
            class="group flex justify-end items-center w-full px-6 text-xs text-gray-600 hover:text-primary transition-all duration-200 font-semibold">
            <span class="ml-4">آشپزخانه</span>
            <x-product-logo type="kitchen"
              class="fill-gray-300 dark:fill-gray-400 group-hover:fill-primary transition-all duration-200" />
          </a>
        </li>
        <li class="w-full my-9">
          <a href="#accessories"
            class="group flex justify-end items-center w-full px-6 text-xs text-gray-600 hover:text-primary transition-all duration-200 font-semibold">
            <span class="ml-4">لوازم جانبی</span>
            <x-product-logo type="accessories"
              class="fill-gray-300 dark:fill-gray-400 group-hover:fill-primary transition-all duration-200" />
          </a>
        </li>
        <li class="w-full my-9">
          <a href="#top"
            class="group flex justify-end items-center w-full px-6 text-xs text-gray-600 hover:text-primary transition-all duration-200 font-semibold">
            <span class="ml-4">برو بالا</span>
            <svg version="1.1"
              class="fill-gray-300 dark:fill-gray-400 group-hover:fill-primary transition-all duration-200"
              width="40" height="40" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512"
              xml:space="preserve">
              <path id="XMLID_21_" d="M213.107,41.894l-37.5-37.5c-5.857-5.858-15.355-5.858-21.213,0l-37.5,37.5
       c-4.29,4.29-5.573,10.742-3.252,16.347c2.322,5.605,7.792,9.26,13.858,9.26H150V315c0,8.284,6.716,15,15,15c8.284,0,15-6.716,15-15
       V67.5h22.5c6.067,0,11.537-3.655,13.858-9.26C218.68,52.635,217.397,46.184,213.107,41.894z" />
            </svg>
          </a>
        </li>
      </ul>
    </div>
  </div>
</div>
