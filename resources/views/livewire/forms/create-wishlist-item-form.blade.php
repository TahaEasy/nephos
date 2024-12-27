<div>
  @if (count(auth()->user()->wishlists ?? 0))
    <form wire:submit.prevent="add_wishlist_item">
      <div class="flex justify-center items-start py-4 px-6 w-full">
        <div class="max-w-80">
          <p class="text-gray-400 text-sm text-center mb-2">یک زیر لیست جدید برای طبقه بندی موارد لیست علاقه مندی خود
            اضافه
            کنید. سپس می
            توانید آنها را مدیریت کنید و
            راحت تر آنها را پیدا کنید.</p>
          <ul class="space-y-3 divide-gray-400/40 divide-y border-gray-400/40 border-[1px] rounded-md p-3 pt-0 mb-2">
            @foreach (auth()->user()->wishlists as $key => $wishlist)
              <li class="relative flex justify-between items-center pt-3" wire:key="{{ $key }}">
                <input type="radio" name="wishlist-item" wire:model="selected_wishlist_id"
                  @if ($key == 0) checked @endif
                  class="peer absolute top-0 left-0 w-full h-full opacity-0 cursor-pointer" value="{{ $wishlist->id }}">
                <div class="peer-checked:[&_p]:text-primary">
                  <p class="text-slate-800 dark:text-slate-200 peer-checked:text-primary font-medium">
                    {{ $wishlist->title }}</p>
                  <span class="block text-sm text-gray-400">
                    {{ $wishlist->total_wishlist_items() > 0 ? $wishlist->total_wishlist_items() . ' مورد' : 'خالی' }}
                  </span>
                </div>
                <div
                  class="flex justify-center items-center peer-checked:[&_div]:w-8 peer-checked:[&_div]:h-8 peer-checked:[&_div]:opacity-100">
                  <div
                    class="overflow-hidden flex justify-center items-center w-0 h-0 p-2 text-slate-200 bg-primary shadow-lg shadow-primary rounded-full opacity-0 transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                      fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                      stroke-linejoin="round">
                      <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                  </div>
                </div>
              </li>
            @endforeach
          </ul>
          @error('selected_wishlist_id')
            <p class="text-xs text-red-600 mt-1 mb-2">{{ $message }}</p>
          @enderror
          @error('selected_product_id')
            <p class="text-xs text-red-600 mt-1 mb-2">{{ $message }}</p>
          @enderror
          <button
            class="block py-3 px-4 w-full text-center text-xs text-white bg-primary hover:bg-primary/80 hover:shadow-xl shadow-white rounded-sm whitespace-nowrap transition-all duration-300">
            <span wire:loading.remove wire:target="add_wishlist_item">افزودن به لیست علاقه مندی</span>
            <span wire:loading wire:target="add_wishlist_item">
              <x-spinner size="4" color="text-200" />
            </span>
          </button>
        </div>
      </div>
    </form>
  @else
    <div class="flex justify-center items-start py-4 px-6 w-full">
      <div class="max-w-80">
        <x-no-wishlist />
        <a href="{{ route('wishlist') }}"
          class="block py-3 px-4 w-full text-center text-xs text-white bg-primary hover:bg-primary/80 hover:shadow-xl shadow-white rounded-full whitespace-nowrap transition-all duration-300">افزودن
          لیست علاقه مندی</a>
      </div>
    </div>
  @endif
</div>
