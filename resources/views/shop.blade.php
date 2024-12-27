<x-layout title="فروشگاه">
  <div class="flex flex-col justify-center items-center w-full min-h-screen">
    <div class="w-11/12 lg:w-9/12 h-full md:h-[37rem]">
      <div class="relative mb-8">
        <img src="/img/svg/nephos-grayscale.svg" alt="nephos-gray"
          class="absolute w-20 h-20 opacity-40 dark:opacity-100 right-0 top-1/2 translate-x-1/2 -translate-y-1/2 z-10">
        <h1 class="relative text-slate-900 dark:text-slate-200 text-3xl z-20">فروشگاه</h1>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 grid-rows-none md:grid-rows-4 md:my-0 my-8 gap-6">
        <div class="group overflow-hidden h-52 md:h-auto relative z-20 bg-img bg-shop-accessories p-6">
          <div
            class="absolute top-0 right-0 z-10 bg-slate-700/50 group-hover:bg-slate-700/95 transition-all duration-500 w-full h-full">
          </div>
          <div class="flex flex-col justify-between relative h-full z-10">
            <div>
              <p class="text-lg text-white">لوازم جانبی</p>
              <div class="w-0 group-hover:w-full h-[1px] mt-2 bg-slate-200 transition-all duration-500">
              </div>
              <div
                class="block md:hidden translate-y-1/2 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500">
                <p class="text-white text-sm mt-2">هر چیزی که بخواهید</p>
                <i class="text-white text-xs mt-2">بهترین محصولات جمع‌آوری شده از بین بهترین صنعتگران
                  کشور.</i>
              </div>
            </div>
            <div
              class="flex justify-between items-center mt-4 translate-y-1/2 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500">
              <p class="text-white">{{ $accessories_count }} محصول</p>
              <a href="/products#accessories"
                class="text-white flex hover:text-slate-200/50 transition-all duration-150">
                <span class="text-sm">نمایش</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="-rotate-180 feather feather-chevron-right">
                  <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
              </a>
            </div>
          </div>
        </div>
        <div
          class="group overflow-hidden h-52 md:h-auto relative z-20 row-span-1 md:row-span-2 bg-img bg-shop-house p-6">
          <div
            class="absolute top-0 right-0 z-10 bg-slate-700/50 group-hover:bg-slate-700/95 transition-all duration-500 w-full h-full">
          </div>
          <div class="flex flex-col justify-between relative h-full z-10">
            <div>
              <p class="text-lg text-white">منزل</p>
              <div class="w-0 group-hover:w-full h-[1px] mt-2 bg-slate-200 transition-all duration-500">
              </div>
              <div
                class="translate-y-1/2 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500">
                <p class="text-white text-sm mt-2">آرامش درون منزل</p>
                <i class="text-white text-xs mt-2">بهترین محصولات جمع‌آوری شده از بین بهترین صنعتگران
                  کشور.</i>
              </div>
            </div>
            <div
              class="flex justify-between items-center mt-4 translate-y-1/2 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500">
              <p class="text-white">{{ $house_count }} محصول</p>
              <a href="/products#house" class="text-white flex hover:text-slate-200/50 transition-all duration-150">
                <span class="text-sm">نمایش</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="-rotate-180 feather feather-chevron-right">
                  <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
              </a>
            </div>
          </div>
        </div>
        <div
          class="group overflow-hidden h-52 md:h-auto relative z-20 row-span-1 md:row-span-4 bg-img bg-shop-office p-6">
          <div
            class="absolute top-0 right-0 z-10 bg-slate-700/50 group-hover:bg-slate-700/95 transition-all duration-500 w-full h-full">
          </div>
          <div class="flex flex-col justify-between relative h-full z-10">
            <div>
              <p class="text-lg text-white">محل کار</p>
              <div class="w-0 group-hover:w-full h-[1px] mt-2 bg-slate-200 transition-all duration-500">
              </div>
              <div
                class="translate-y-1/2 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500">
                <p class="text-white text-sm mt-2">مبلمان اداری ممتاز</p>
                <i class="text-white text-xs mt-2">بهترین محصولات جمع‌آوری شده از بین بهترین صنعتگران
                  کشور.</i>
              </div>
            </div>
            <div
              class="flex justify-between items-center mt-4 translate-y-1/2 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500">
              <p class="text-white">{{ $office_count }} محصول</p>
              <a href="/products#office" class="text-white flex hover:text-slate-200/50 transition-all duration-150">
                <span class="text-sm">نمایش</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="-rotate-180 feather feather-chevron-right">
                  <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
              </a>
            </div>
          </div>
        </div>
        <div class="group overflow-hidden h-52 md:h-auto relative z-20 bg-img bg-shop-kitchen p-6">
          <div
            class="absolute top-0 right-0 z-10 bg-slate-700/50 group-hover:bg-slate-700/95 transition-all duration-500 w-full h-full">
          </div>
          <div class="flex flex-col justify-between relative h-full z-10">
            <div>
              <p class="text-lg text-white">آشپزخانه</p>
              <div class="w-0 group-hover:w-full h-[1px] mt-2 bg-slate-200 transition-all duration-500">
              </div>
              <div
                class="block md:hidden translate-y-1/2 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500">
                <p class="text-white text-sm mt-2">بهترین لوازم آشپزی</p>
                <i class="text-white text-xs mt-2">بهترین محصولات جمع‌آوری شده از بین بهترین صنعتگران
                  کشور.</i>
              </div>
            </div>
            <div
              class="flex justify-between items-center mt-4 translate-y-1/2 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500">
              <p class="text-white">{{ $kitchen_count }} محصول</p>
              <a href="/products#kitchen" class="text-white flex hover:text-slate-200/50 transition-all duration-150">
                <span class="text-sm">نمایش</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="-rotate-180 feather feather-chevron-right">
                  <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
              </a>
            </div>
          </div>
        </div>
        <div
          class="group overflow-hidden h-52 md:h-auto relative z-20 row-span-1 md:row-span-2 col-span-1 md:col-span-2 bg-img bg-shop-kids p-6">
          <div
            class="absolute top-0 right-0 z-10 bg-slate-700/50 group-hover:bg-slate-700/95 transition-all duration-500 w-full h-full">
          </div>
          <div class="flex flex-col justify-between relative h-full z-10">
            <div>
              <p class="text-lg text-white">برای کودکان</p>
              <div class="w-0 group-hover:w-full h-[1px] mt-2 bg-slate-200 transition-all duration-500">
              </div>
              <div
                class="translate-y-1/2 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500">
                <p class="text-white text-sm mt-2">زمین بازی</p>
                <i class="text-white text-xs mt-2">بهترین محصولات جمع‌آوری شده از بین بهترین صنعتگران
                  کشور.</i>
              </div>
            </div>
            <div
              class="flex justify-between items-center mt-4 translate-y-1/2 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500">
              <p class="text-white">{{ $kids_count }} محصول</p>
              <a href="/products#kids" class="text-white flex hover:text-slate-200/50 transition-all duration-150">
                <span class="text-sm">نمایش</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                  fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round" class="-rotate-180 feather feather-chevron-right">
                  <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-layout>
