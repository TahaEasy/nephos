<div class="px-12 py-8 bg-white dark:bg-slate-800 border-[1px] border-gray-400/20">
  <div class="flex justify-between items-center">
    <div class="flex justify-start items-center gap-4">
      <div>
        <img src="{{ route('product-images', ['slug' => $wishlist_item->product->slug]) }}" alt="product-image"
          class="w-16 h-16">
      </div>
      <div>
        <a href="{{ route('product', ['product' => $wishlist_item->product->slug]) }}"
          class="inline-block text-slate-800 dark:text-slate-200 font-semibold hover:text-primary">{{ $wishlist_item->product->name }}</a>
        <p class="text-sm text-gray-400">
          دسته بندی: {{ __('messages.' . $wishlist_item->product->category) }}
        </p>
      </div>
    </div>
    <div class="flex justify-end items-center gap-2">
      <button wire:click="add_to_cart" wire:loading.attr="disabled" wire:loading.class="!border-primary !border-solid"
        wire:target="add_to_cart"
        class="group block p-2 border-[1px] border-transparent border-dashed hover:border-primary hover:border-solid rounded-full text-gray-400 hover:text-primary transition-all duration-200">
        <svg wire:loading.remove.block wire:target="add_to_cart" xmlns="http://www.w3.org/2000/svg" width="18"
          height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
          stroke-linecap="round" stroke-linejoin="round">
          <circle cx="9" cy="21" r="1"></circle>
          <circle cx="20" cy="21" r="1"></circle>
          <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
        </svg>
        <div wire:loading.block wire:target="add_to_cart"
          class="h-[18px] w-[18px] animate-spin rounded-full border-4 border-solid border-current border-e-transparent align-[-0.125em] text-primary motion-reduce:animate-[spin_1.5s_linear_infinite]"
          role="status">
          <span
            class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">صبر
            کنید...</span>
        </div>
      </button>
      <button wire:click="delete_wishlist_item" wire:loading.attr="disabled"
        wire:loading.class="!border-primary !border-solid" wire:target="delete_wishlist_item"
        class="group block p-2 border-[1px] border-transparent border-dashed hover:border-primary hover:border-solid rounded-full text-gray-400 hover:text-primary transition-all duration-200">
        <svg wire:loading.remove.block wire:target="delete_wishlist_item" xmlns="http://www.w3.org/2000/svg"
          width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
          stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
          <polyline points="3 6 5 6 21 6"></polyline>
          <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
          <line x1="10" y1="11" x2="10" y2="17"></line>
          <line x1="14" y1="11" x2="14" y2="17"></line>
        </svg>
        <div wire:loading.block wire:target="delete_wishlist_item"
          class="h-[18px] w-[18px] animate-spin rounded-full border-4 border-solid border-current border-e-transparent align-[-0.125em] text-primary motion-reduce:animate-[spin_1.5s_linear_infinite]"
          role="status">
          <span
            class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">صبر
            کنید...</span>
        </div>
      </button>
    </div>
  </div>
</div>
