<x-layout title="محصولات">
  @vite('resources/js/sortMenu.js')
  <div class="flex justify-center items-center w-full h-full">
    @livewire('products-style')
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

</x-layout>
