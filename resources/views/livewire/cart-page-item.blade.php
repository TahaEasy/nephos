<div
  class="flex xs:flex-row flex-col justify-between xs:items-center items-start xs:static relative xs:gap-0 gap-2 px-5 py-6 pb-2 xs:pb-6 border-2 border-dashed border-transparent hover:border-primary hover:border-solid bg-white dark:bg-slate-800 rounded-sm hover:drop-shadow-xl w-full transition-all duration-300">
  <div class="flex justify-start items-center gap-2">
    <div>
      <img src="{{ route('product-images', ['slug' => $cart_item->product->slug]) }}" alt="cart_product" class="w-20 h-20">
    </div>
    <div class="flex flex-col justify-start gap-1">
      <a href="{{ route('product', ['product' => $cart_item->product->slug]) }}"
        class="text-sm hover:text-primary text-gray-800 dark:text-slate-200 font-semibold">{{ $cart_item->product->name }}</a>
      <div class="lg:hidden block">
        @if ($cart_item->product->discount > 0)
          <p class="text-gray-800 dark:text-slate-200 font-semibold">
            {{ number_format($cart_item->product->discount_price()) }} تومان</p>
          <p class="text-gray-600 dark:text-gray-400 text-sm line-through">
            {{ number_format($cart_item->product->price) }} تومان
          </p>
        @else
          <p class="text-gray-800 dark:text-slate-200 font-semibold">{{ number_format($cart_item->product->price) }}
            تومان</p>
        @endif
      </div>
      <p class="text-gray-600 dark:text-gray-400 text-sm lg:block hidden">
        دسته بندی: {{ __('messages.' . $cart_item->product->category) }}
      </p>
    </div>
  </div>
  <div class="xs:hidden flex justify-between items-end w-full mt-4">
    <div
      class="flex justify-between bg-white dark:bg-slate-800 border-slate-700/10 border-[1px] shadow-lg max-h-12 rounded-full">
      <button wire:click="increaseQuantity()" wire:loading.attr="disabled"
        class="flex justify-center items-center px-4 text-slate-700/50 dark:text-slate-200/50 hover:text-primary/90 text-xl w-5 transition-colors duration-200">+</button>
      <span wire:loading.remove.flex wire:target="increaseQuantity, decreaseQuantity"
        class="flex justify-center items-center min-w-8 dark:text-slate-200 px-2 py-1">{{ $quantity }}</span>
      <span wire:loading.flex wire:target="increaseQuantity, decreaseQuantity"
        class="flex justify-center items-center min-w-8">
        <x-spinner size='4' color="primary" />
      </span>
      <button wire:click="decreaseQuantity()" wire:loading.attr="disabled"
        class="flex justify-center items-center px-4 text-slate-700/50 dark:text-slate-200/50 hover:text-primary/90 text-xl w-5 transition-colors duration-200">
        -
      </button>
    </div>
    <button wire:click="delete_cart_item" wire:loading.attr="disabled"
      wire:loading.class="!border-primary !border-solid" wire:target="delete_cart_item"
      class="group xs:hidden block p-2 border-[1px] border-transparent border-dashed hover:border-primary hover:border-solid rounded-full text-gray-400 hover:text-primary transition-all duration-200">
      <svg wire:loading.remove.block wire:target="delete_cart_item" xmlns="http://www.w3.org/2000/svg" width="18"
        height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
        stroke-linejoin="round" class="feather feather-trash-2">
        <polyline points="3 6 5 6 21 6"></polyline>
        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
        <line x1="10" y1="11" x2="10" y2="17"></line>
        <line x1="14" y1="11" x2="14" y2="17"></line>
      </svg>
      <div wire:loading.block wire:target="delete_cart_item"
        class="h-[18px] w-[18px] animate-spin rounded-full border-4 border-solid border-current border-e-transparent align-[-0.125em] text-primary motion-reduce:animate-[spin_1.5s_linear_infinite]"
        role="status">
        <span
          class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">صبر
          کنید...</span>
      </div>
    </button>
  </div>
  <div class="xs:flex hidden justify-between items-center gap-2">
    <div class="lg:flex hidden flex-col items-start">
      <p class="text-sm dark:text-gray-400 text-gray-600">قیمت</p>
      @if ($cart_item->product->discount > 0)
        <p class="text-gray-800 dark:text-slate-200 font-semibold">
          {{ number_format($cart_item->product->discount_price()) }} تومان</p>
        <p class="text-gray-600 dark:text-gray-400 text-sm line-through">{{ number_format($cart_item->product->price) }}
          تومان
        </p>
      @else
        <p class="text-gray-800 dark:text-slate-200 font-semibold">{{ number_format($cart_item->product->price) }}
          تومان
        </p>
      @endif
    </div>
    <div
      class="flex justify-between bg-white dark:bg-slate-800 border-slate-700/10 border-[1px] shadow-lg max-h-12 rounded-full">
      <button wire:click="increaseQuantity()" wire:loading.attr="disabled"
        class="flex justify-center items-center px-4 text-slate-700/50 dark:text-slate-200/50 hover:text-primary/90 text-xl w-5 transition-colors duration-200">+</button>
      <span wire:loading.remove.flex wire:target="increaseQuantity, decreaseQuantity"
        class="flex justify-center items-center min-w-8 dark:text-slate-200 px-2 py-1">{{ $quantity }}</span>
      <span wire:loading.flex wire:target="increaseQuantity, decreaseQuantity"
        class="flex justify-center items-center min-w-8">
        <x-spinner size='4' color="primary" />
      </span>
      <button wire:click="decreaseQuantity()" wire:loading.attr="disabled"
        class="flex justify-center items-center px-4 text-slate-700/50 dark:text-slate-200/50 hover:text-primary/90 text-xl w-5 transition-colors duration-200">
        -
      </button>
    </div>
  </div>
  <div class="xs:block hidden">
    <button wire:click="delete_cart_item" wire:loading.attr="disabled"
      wire:loading.class="!border-primary !border-solid" wire:target="delete_cart_item"
      class="group p-2 border-[1px] border-transparent border-dashed hover:border-primary hover:border-solid rounded-full text-gray-400 hover:text-primary transition-all duration-200">
      <svg wire:loading.remove.block wire:target="delete_cart_item" xmlns="http://www.w3.org/2000/svg" width="18"
        height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
        stroke-linejoin="round" class="feather feather-trash-2">
        <polyline points="3 6 5 6 21 6"></polyline>
        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
        <line x1="10" y1="11" x2="10" y2="17"></line>
        <line x1="14" y1="11" x2="14" y2="17"></line>
      </svg>
      <div wire:loading.block wire:target="delete_cart_item"
        class="h-[18px] w-[18px] animate-spin rounded-full border-4 border-solid border-current border-e-transparent align-[-0.125em] text-primary motion-reduce:animate-[spin_1.5s_linear_infinite]"
        role="status">
        <span
          class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">صبر
          کنید...</span>
      </div>
    </button>
  </div>
</div>
