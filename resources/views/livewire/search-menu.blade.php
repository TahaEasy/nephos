  <div class="mt-16 sm:mt-8 pe-0 sm:pe-20">
    <div class="relative">
      <input type="text" autocomplete="off" name="search" id="search-input" placeholder="جستوجوی یک محصول"
        wire:model.live="search"
        class="peer font-tanha text-4xl md:text-6xl xl:text-8xl pr-1 h-full w-full border-b dark:text-slate-100/90 bg-transparent pt-4 pb-1.5 font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border-blue-gray-200 focus:border-primary focus:outline-0 dark:border-gray-400 disabled:border-0 disabled:bg-blue-gray-50" />
    </div>
    <div
      class="flex flex-col xs:flex-row justify-center xs:justify-between items-start xs:items-center gap-4 xs:gap-0 mt-4 ps-2 sm:ps-0">
      <p class="text-sm text-slate-800 dark:text-slate-200">نام محصول مورد نظر خود را وارد کنید</p>
      <a href="{{ route('products.search') }}"
        class="group flex justify-end items-center gap-2 text-sm text-slate-400 dark:text-slate-200 hover:text-primary border xs:border-0 border-slate-400 dark:border-slate-200 rounded-md hover:border-primary p-1 xs:p-0">
        <span class="rotate-0 group-hover:rotate-180 transition-all duration-200">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-settings">
            <path
              d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z" />
            <circle cx="12" cy="12" r="3" />
          </svg>
        </span>
        <span>جستوجو پیشرفته</span>
      </a>
    </div>
    @if (trim($this->search) != '')
      @if (count($products ?? 0) > 0)
        <div class="grid md:grid-cols-2 grid-cols-1 mt-4">
          @foreach ($products as $product)
            <div class="flex justify-center items-center">
              <a href="{{ route('product', ['product' => $product->slug]) }}"
                class="group flex justify-start items-center gap-3 w-4/5 border-[1px] border-gray-400/50 px-4 py-2 hover:border-primary mt-4 rounded-md transition-all duration-200">
                <div>
                  <img src="{{ route('product-images', ['slug' => $product->slug]) }}" alt="{{ $product->name }}"
                    class="grayscale group-hover:grayscale-0 w-10 h-10 transition-all duration-200">
                </div>
                <div>
                  <p class="text-slate-800 dark:text-slate-200">
                    {{ mb_strimwidth($product->name, 0, 20, '...') }}
                  </p>
                  @if ($product->discount)
                    <p class="text-gray-400 group-hover:text-primary transition-all duration-200">
                      {{ number_format($product->discount_price()) }} تومان</p>
                    <p
                      class="text-xs text-gray-300 dark:text-gray-500 line-through group-hover:text-gray-400 dark:group-hover:text-gray-500 transition-all duration-200">
                      {{ number_format($product->price) }} تومان</p>
                  @else
                    <p class="text-gray-400 group-hover:text-primary transition-all duration-200">
                      {{ number_format($product->price) }} تومان</p>
                  @endif
                </div>
              </a>
            </div>
          @endforeach
        </div>
        <div class="mt-6 px-2 sm:px-0" dir="ltr">
          {{ $products->links(data: ['scrollTo' => false]) }}
        </div>
      @else
        <p class="text-redy text-center mt-4">متاسفانه محصولی با این نام پیدا نشد!</p>
      @endif
    @endif
  </div>
