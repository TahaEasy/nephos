<li
  class="group flex justify-between items-center relative overflow-hidden py-3 px-4 border-b-slate-700/20 dark:border-b-slate-400/20 border-b-[1px]">
  <div class="flex justify-start gap-2">
    <img src="{{ route('product-images', ['slug' => $product->slug]) }}" alt="modern-table" class="w-14 h-14">
    <div>
      <a href="{{ route('product', ['product' => $product->slug]) }}"
        class="text-sm hover:text-primary text-neutral-700 dark:text-slate-200 font-bold">{{ $product->name }}</a>
      <p class="text-sm text-primary">
        {{ number_format($product->discount ? $product->price - ($product->price * $product->discount) / 100 : $product->price) }}
        تومان</p>
      @if ($product->discount)
        <p class="text-xxs whitespace-nowrap text-gray-400 line-through">
          {{ number_format($product->price) }} تومان</p>
      @endif
      @auth
        <p class="text-sm text-neutral-700 dark:text-slate-200">× {{ $item->quantity }}</p>
      @else
        <p class="text-sm text-neutral-700 dark:text-slate-200">× {{ $quantity }}</p>
      @endauth
    </div>
  </div>
  <div class="me-12">
    <div
      class="flex justify-between bg-white dark:bg-slate-800 border-slate-700/10 border-[1px] shadow-lg rounded-full">
      <button wire:click="increaseQuantity()" wire:loading.attr="disabled"
        class="flex justify-center items-center px-4 py-1 text-slate-700/50 dark:text-slate-200/50 hover:text-primary/90 text-xl w-5 transition-colors duration-200">+</button>
      <span wire:loading.remove.flex wire:target="increaseQuantity, decreaseQuantity"
        class="flex justify-center items-center min-w-8 dark:text-slate-200 px-2 py-1">{{ $quantity }}</span>
      <span wire:loading.flex wire:target="increaseQuantity, decreaseQuantity"
        class="flex justify-center items-center min-w-8">
        <x-spinner size='4' color="primary" />
      </span>
      <button wire:click="decreaseQuantity()" wire:loading.attr="disabled"
        class="flex justify-center items-center px-4 py-1 text-slate-700/50 dark:text-slate-200/50 hover:text-primary/90 text-xl w-5 transition-colors duration-200">
        -
      </button>
    </div>
  </div>
  <button wire:click="delete_cart_item()" wire:loading.attr="disabled"
    class="flex justify-center items-center absolute -left-10 group-hover:left-0 bg-neutral-300/60 text-neutral-700/50 hover:bg-neutral-400/70 dark:text-slate-400 dark:bg-neutral-300/5 hover:text-neutral-700 dark:hover:text-slate-300 dark:hover:bg-neutral-300/10 h-full w-10 transition-all duration-300">
    <svg xmlns="http://www.w3.org/2000/svg" wire:loading.remove.flex wire:target="delete_cart_item" width="20"
      height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
      stroke-linejoin="round" class="feather feather-x">
      <line x1="18" y1="6" x2="6" y2="18"></line>
      <line x1="6" y1="6" x2="18" y2="18"></line>
    </svg>
    <span wire:loading.flex wire:target="delete_cart_item" class="flex justify-center items-center">
      <x-spinner size='[20px]'
        color="neutral-700/50 dark:text-slate-400 hover:text-neutral-700 dark:hover:text-slate-300" />
    </span>
  </button>
</li>
