<div class="flex md:flex-row flex-col justify-between text-slate-950 dark:text-gray-200">
  @auth
    <x-modal header="افزودن به لیست علاقه مندی" modal="wishlist">
      <livewire:forms.create-wishlist-item-form />
    </x-modal>

    <x-modal header="به این محصول نظر دهید" modal="comment"
      img="{{ auth()->user()->avatar ? route('user-avatar', ['user' => auth()->id()]) : '/img/fallback-avatar.png' }}">
      <livewire:forms.create-comment :productId="$product->id" />
    </x-modal>
  @endauth
  <div
    class="flex flex-col justify-start md:justify-between items-center static md:sticky top-0 w-full md:w-2/5 h-[80vh] sm:h-screen bg-white dark:bg-slate-800 shadow-lg md:px-12 px-4 pb-4 md:pt-12 pt-4">
    <div class="w-full">
      <div class="flex justify-end items-start w-full">
        <p class="font-semibold me-1">{{ $product->total_hearts() }}</p>
        <svg xmlns="http://www.w3.org/2000/svg" class="fill-red-500" width="18" height="18" viewBox="0 0 24 24"
          fill="none">
          <path
            d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
          </path>
        </svg>
      </div>
      <div class="flex flex-col justify-start w-full h-full relative">
        <div
          class="{{ $slide == 'preview' ? 'flex' : 'hidden' }} min-h-[60vh] sm:min-h-[80vh] justify-center items-center w-full h-full transition-all duration-200">
          <div class="flex justify-center items-center w-60 h-60">
            <img src="{{ route('product-images', ['slug' => $product->slug]) }}" alt="product" class="w-auto h-auto">
          </div>
        </div>
        <div
          class="{{ $slide == 'details' ? 'block' : 'hidden' }} max-h-[60vh] sm:max-h-[80vh] mt-2 md:mt-12 overflow-y-scroll transition-all duration-200">
          <div class="border-b-[1px] border-slate-300/50 dark:border-slate-600/50 py-2">
            <p class="text-sm font-medium text-slate-800 dark:text-slate-200">نام محصول</p>
            <p class="text-xs text-gray-400 leading-normal">{{ $product->name }}</p>
          </div>
          <div class="border-b-[1px] border-slate-300/50 dark:border-slate-600/50 py-2">
            <p class="text-sm font-medium text-slate-800 dark:text-slate-200">محصول کد انبار</p>
            <p class="text-xs text-gray-400 leading-normal">SKU-{{ $product->id }}</p>
          </div>
          <div class="border-b-[1px] border-slate-300/50 dark:border-slate-600/50 py-2">
            <p class="text-sm font-medium text-slate-800 dark:text-slate-200">فروشنده</p>
            <p class="text-xs text-gray-400 leading-normal">{{ $product->user->name() }}</p>
          </div>
          <div class="border-b-[1px] border-slate-300/50 dark:border-slate-600/50 py-2">
            <p class="text-sm font-medium text-slate-800 dark:text-slate-200">توضیحات</p>
            <p class="text-xs text-gray-400 leading-normal">{!! $product->description !!}</p>
          </div>
          <div class="border-b-[1px] border-slate-300/50 dark:border-slate-600/50 py-2">
            <p class="text-sm font-medium text-slate-800 dark:text-slate-200">وضعیت محصول</p>
            <p class="text-xs text-gray-400 leading-normal">موجود</p>
          </div>
        </div>
        <div
          class="{{ $slide == 'comments' ? 'flex' : 'hidden' }} flex-col items-center max-h-[70vh] mt-2 md:mt-12 transition-all duration-200">
          <h1 class="text-2xl">امـــتیاز مـــحصول</h1>
          <div class="py-3 px-4 my-4 border-[1px] border-slate-400/25 bg-gray-200/30 dark:bg-gray-100/5">
            <x-rate-star :rating="$product->avg_rate()" hide_rate />
          </div>
          @if ($product->avg_rate())
            <p class="lg:text-sm text-xs mb-2 text-gray-400">امتیاز <span
                class="text-primary">{{ $product->avg_rate() }} از
                ۵</span> در مجموع
              <span class="text-primary">{{ $product->total_rates() }}</span> نظر
            </p>
          @else
            <p class="lg:text-sm text-xs mb-2 text-gray-400">متاسفانه <span class="text-primary">بــدون
                امتــیاز</p>
          @endif
          @auth
            @if (auth()->user()->is_admin)
              <p class="bg-red-300 text-red-700 text-xs p-2">حساب های ادمین نمیتوانند نظردهی کنند</p>
            @else
              <a href="javascript:void(0)" data-modal="comment"
                class="open-modal-menu text-sm text-gray-400 hover:text-primary transition-all duration-150">افزودن
                نظر +</a>
            @endif
          @else
            <p class="bg-red-300 text-red-700 text-xs p-2">برای ثبت نظر باید حساب کاربری داشته باشید!</p>
          @endauth

          {{-- Comments --}}
          @if (count($product->comments) <= 0)
            <div class="flex justify-center w-full mt-5">
              <p class="text-red-500">نظری برای این محصول وجود ندارد!</p>
            </div>
          @else
            <div class="mt-4 overflow-y-scroll w-full">
              @foreach ($product->comments as $comment)
                <x-comment :$comment />
              @endforeach
            </div>
          @endif
        </div>
      </div>
    </div>
    <div class="relative flex justify-between items-end w-full h-full z-20">
      <div>
        @auth
          @if (auth()->user()->is_admin)
            <a href="javascript:void(0)" wire:click="adminsCantLike()" class="group">
              <svg xmlns="http://www.w3.org/2000/svg"
                class="fill-transparent group-hover:stroke-red-600 dark:group-hover:stroke-red-500 stroke-gray-400 stroke-2 transition-all duration-150"
                width="20" height="20" viewBox="0 0 24 24">
                <path
                  d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                </path>
              </svg>
            </a>
          @else
            <a href="javascript:void(0)" wire:click="select_product()" data-modal="wishlist"
              class="open-modal-menu group">
              <svg xmlns="http://www.w3.org/2000/svg"
                class="fill-transparent group-hover:stroke-red-600 dark:group-hover:stroke-red-500 stroke-gray-400 stroke-2 transition-all duration-150"
                width="20" height="20" viewBox="0 0 24 24">
                <path
                  d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                </path>
              </svg>
            </a>
          @endif
        @else
          <a href="javascript:void(0)" wire:click="loginBro()" class="group">
            <svg xmlns="http://www.w3.org/2000/svg"
              class="fill-transparent group-hover:stroke-red-600 dark:group-hover:stroke-red-500 stroke-gray-400 stroke-2 transition-all duration-150"
              width="20" height="20" viewBox="0 0 24 24">
              <path
                d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
              </path>
            </svg>
          </a>
        @endauth
      </div>
      <span class="hidden w-[20px] h-[20px]"></span>
      <div class="flex justify-end items-center">
        <div class="flex justify-start items-center gap-4">
          <a href="javascript:void(0)" class="group" wire:click="setSlide('preview')">
            <svg xmlns="http://www.w3.org/2000/svg" wire:loading.remove.block wire:target="setSlide('preview')"
              class="{{ $slide == 'preview' ? 'stroke-primary' : 'stroke-gray-400' }} hover:stroke-primary transition-all duration-150"
              width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
              stroke-linecap="round" stroke-linejoin="round">
              <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
              <circle cx="8.5" cy="8.5" r="1.5"></circle>
              <polyline points="21 15 16 10 5 21"></polyline>
            </svg>
            <span wire:loading.flex wire:target="setSlide('preview')">
              <x-spinner size="[20px]" color="primary" />
            </span>
          </a>
          <a href="javascript:void(0)" class="group" wire:click="setSlide('details')">
            <svg xmlns="http://www.w3.org/2000/svg" wire:loading.remove.block wire:target="setSlide('details')"
              class="{{ $slide == 'details' ? 'stroke-primary' : 'stroke-gray-400' }} hover:stroke-primary transition-all duration-150"
              width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
              <line x1="3" y1="12" x2="21" y2="12"></line>
              <line x1="3" y1="6" x2="21" y2="6"></line>
              <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
            <span wire:loading.flex wire:target="setSlide('details')">
              <x-spinner size="[20px]" color="primary" />
            </span>
          </a>
          <a href="javascript:void(0)" class="group" wire:click="setSlide('comments')">
            <svg xmlns="http://www.w3.org/2000/svg" wire:loading.remove.block wire:target="setSlide('comments')"
              class="{{ $slide == 'comments' ? 'stroke-primary' : 'stroke-gray-400' }} hover:stroke-primary transition-all duration-150"
              width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="feather feather-message-circle">
              <path
                d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z">
              </path>
            </svg>
            <span wire:loading.flex wire:target="setSlide('comments')">
              <x-spinner size="[20px]" color="primary" />
            </span>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="flex flex-col justify-between items-start w-full md:w-3/5 min-h-screen pt-6 md:pt-2">
    <div class="xs:px-12 px-4 md:mb-auto mb-12 w-full overflow-hidden">
      <div class="flex justify-between items-center">
        <div class="flex justify-start items-center gap-4 mt-4">
          <div>
            <x-product-logo type="{{ $product->category }}" />
          </div>
          <p class="text-xl text-slate-800 dark:text-gray-400">
            {{ __('messages.' . $product->category) }}
          </p>
        </div>
        @if ($product->discount)
          <p
            class="relative text-sm text-primary mt-4 me-3 xs:me-0 p-2 border border-primary shadow-none dark:shadow-discount-glow transition-all duration-300">
            {{ $product->discount }}%
            تخفیف
            <span class="absolute top-1/2 left-0 -translate-x-full w-96 h-px bg-primary"></span>
          </p>
        @endif
      </div>
      <div class="lg:mt-24 mt-6">
        <h1 class="text-4xl italic mb-4">{{ $product->name }}</h1>
        <p class="text-sm text-justify max-w-3xl text-gray-400">
          {!! $product->description !!}</p>
      </div>
      <div class="flex justify-between items-start my-6">
        <div>
          <p>قیمت</p>
          <div class="flex justify-start items-center flex-wrap gap-2">
            <p class="text-xl font-bold text-primary">
              {{ $product->discount ? number_format($product->price - ($product->price * $product->discount) / 100) : number_format($product->price) }}
              تومان</p>
            @if ($product->discount)
              <p class="text-sm whitespace-nowrap text-gray-400 line-through">
                {{ number_format($product->price) }} تومان</p>
            @endif
          </div>
        </div>
        <div class="flex justify-end items-end gap-4">
          <div>
            <p>تعداد</p>

            <div
              class="flex justify-between bg-white dark:bg-slate-800 border-slate-700/10 border-[1px] shadow-xl lg:shadow-none rounded-full">
              <button
                class="flex justify-center items-center px-4 py-1 text-slate-700/50 dark:text-slate-200/50 hover:text-primary/90 text-xl w-5 transition-colors duration-200"
                wire:click="increaseQuantity" wire:loading.attr="disabled">+</button>
              <span wire:loading.remove.flex wire:target="increaseQuantity, decreaseQuantity"
                class="flex justify-center items-center min-w-8 dark:text-slate-200 px-2 py-1">{{ $quantity }}</span>
              <span wire:loading.flex wire:target="increaseQuantity, decreaseQuantity"
                class="flex justify-center items-center min-w-8">
                <x-spinner size='4' color="primary" />
              </span>
              <button
                class="flex justify-center items-center px-4 py-1 text-slate-700/50 dark:text-slate-200/50 hover:text-primary/90 text-xl w-5 transition-colors duration-200"
                wire:click="decreaseQuantity" wire:loading.attr="disabled">
                -
              </button>
            </div>
          </div>
          <span class="hidden pointer-events-none"></span>
          <div class="lg:block hidden">
            <a href="javascript:void(0)" wire:click="add_cart_item()"
              wire:loading.class.add="pointer-events-none animate-[pulse_0.5s_linear_infinite]"
              wire:target="add_cart_item"
              class="block py-3 px-4 w-fit text-xs text-white bg-primary hover:bg-primary/80 glow-primary glow-hover rounded-full whitespace-nowrap transition-all duration-300">اضافه
              کردن به سبد خرید</a>
          </div>
        </div>
      </div>
      <div class="lg:hidden flex justify-center items-center mt-4">
        <a href="javascript:void(0)" wire:click="add_cart_item()"
          wire:loading.class.add="pointer-events-none animate-[pulse_0.5s_linear_infinite]"
          wire:target="add_cart_item"
          class="block py-3 px-4 mb-5 w-full max-w-96 text-center lg:text-xs text-base text-white bg-primary hover:bg-primary/80 glow-primary glow-hover rounded-full transition-all duration-300">اضافه
          کردن به سبد خرید</a>
      </div>
    </div>
    <div class="relative bg-white dark:bg-slate-800 shadow-xl pb-12 lg:pt-12 pt-4 px-12 mt-8 w-full">
      <p
        class="lg:absolute static start-0 top-1/2 lg:-translate-y-1/2 translate-y-0 lg:-rotate-90 rotate-0 mb-4 lg:w-auto w-full text-center text-2xl text-gray-400 lg:cursor-vertical-text cursor-auto">
        پیشنهادات</p>
      <div wire:ignore class="flex md:flex-row flex-col justify-evenly items-center md:gap-y-0 gap-y-4">
        @foreach ($related_products as $related_product)
          <div class="flex flex-col justify-center items-center">
            <img src="{{ route('product-images', ['slug' => $related_product->slug]) }}" alt="related-product"
              class="w-20 h-20">
            <a href="{{ route('product', ['product' => $related_product->slug]) }}"
              class="inline-block hover:text-primary dark:mt-4">{{ $related_product->name }}</a>
            <p class="hidden md:block text-sm text-gray-400 text-center">
              {{ Str::limit($related_product->description, 20) }}</p>
            <p class="block md:hidden text-sm text-gray-400 text-center">
              {{ Str::limit($related_product->description, 60) }}</p>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
