  <ul class="divide-slate-700/20 dark:divide-slate-400/20 h-full divide-y-[1px]">
    <li class="relative overflow-hidden">
      <p class="px-4 py-6 text-lg dark:text-slate-200">سبد خرید سریع</p>
      <a href="javascript:void(0)" id="close-cart"
        class="block dark:text-slate-200 absolute left-4 top-1/2 hover:rotate-90 -translate-y-1/2 transition-all duration-300">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
          class="feather feather-x">
          <line x1="18" y1="6" x2="6" y2="18"></line>
          <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
      </a>
    </li>
    <li class="relative overflow-hidden">
      <p class="px-4 py-6 font-bold dark:text-slate-200">
        {{ number_format($cart_total_price) ? number_format($cart_total_price) . ' تومان' : '- - - - -' }}</p>

      <a href="{{ route('cart') }}"
        class="block bg-primary glow-primary glow-hover text-sm py-3 px-4 rounded-md text-white absolute left-4 top-1/2 -translate-y-1/2 transition-all duration-300">
        مشاهده سبد خرید
      </a>
    </li>
    {{-- Cart Products --}}
    <div class="h-3/5 overflow-y-scroll !p-0">
      @auth
        @if (auth()->user()->cart->total_items() > 0)
          @foreach (auth()->user()->cart->cart_items as $cart_item)
            <livewire:cart-item :item="$cart_item" wire:key="{{ $cart_item->id }}" />
          @endforeach
        @else
          <div class="mt-12">
            <x-empty-cart />
          </div>
        @endif
      @else
        @if ($cookie_items_exist)
          @foreach ($cart_items as $index => $cart_item)
            <livewire:cart-item :item="$cart_item" wire:key="{{ $index }}" />
          @endforeach
        @else
          <div class="mt-12">
            <x-empty-cart />
          </div>
        @endif
      @endauth
    </div>
  </ul>
