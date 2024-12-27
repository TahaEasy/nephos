<span>
  <span class="sm:inline-block hidden">
    {{ $total_cart_items == 0 ? 'بدون' : $total_cart_items }}
  </span>
  <span class="sm:hidden inline-block">
    {{ $total_cart_items == 0 ? '0' : $total_cart_items }}
  </span>
</span>
