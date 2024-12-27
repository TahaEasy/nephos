<div class="grid grid-cols-6 bg-white dark:bg-slate-800 border-[1px] border-slate-800/20 p-2 rounded-md">
  <div class="flex justify-start items-center gap-2 col-span-1 xs:col-span-2">
    <img src="{{ route('product-images', ['slug' => $cart_item->product->slug]) }}" alt="order-item-image"
      class="hidden xs:block w-12 h-12">
    <p class="text-slate-800 dark:text-slate-200 text-sm">{{ $cart_item->product->name }}</p>
  </div>
  <div class="flex justify-center items-center w-full h-full">
    <p class="text-sm text-gray-400">{{ $cart_item->quantity }}</p>
  </div>
  <div class="flex xs:hidden justify-start items-center w-full h-full col-span-2">
    @if ($cart_item->product->discount)
      <div>
        <p class="text-sm text-gray-400">{{ number_format($cart_item->product->discount_price()) }}
          تومان
        </p>
        <p class="text-xs text-gray-700 line-through">
          {{ number_format($cart_item->product->price) }} تومان</p>
      </div>
    @else
      <p class="text-sm text-gray-400">{{ number_format($cart_item->product->price) }} تومان</p>
    @endif
  </div>
  <div class="hidden xs:flex justify-center items-center w-full h-full">
    <p class="text-sm text-gray-400">{{ number_format($cart_item->product->price) }} تومان</p>
  </div>
  <div class="hidden xs:flex justify-center items-center w-full h-full">
    <p class="text-sm text-gray-400">
      {{ $cart_item->product->discount == 0 ? 'ندارد' : $cart_item->product->discount . '%' }}</p>
  </div>
  <div class="flex justify-start items-center w-full h-full col-span-2 xs:col-span-1">
    <p class="text-sm text-slate-900 dark:text-slate-200">{{ number_format($total_price) }} تومان</p>
  </div>
</div>
