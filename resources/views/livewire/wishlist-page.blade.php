<div class="flex lg:flex-row flex-col justify-between items-start gap-6 mb-6 relative">
  <x-modal modal="wishlist" header="افزودن به لیست علاقه مندی">
    <livewire:forms.create-wishlist-form />
  </x-modal>
  <div
    class="flex flex-col w-full lg:w-1/3 border-[1px] divide-y-[1px] border-gray-400/30 divide-gray-400/40 bg-white dark:bg-slate-800 rounded-sm lg:sticky static top-4 transition-all duration-300">
    <div class="flex justify-between items-center p-5">
      <p class="text-slate-500 font-semibold">افزودن لیست علاقه مندی</p>
      <button type="button" data-modal="wishlist"
        class="open-modal-menu flex justify-center items-center p-[10px] border-[1px] border-dashed border-gray-400 rounded-full text-gray-400 hover:text-primary hover:border-primary hover:border-solid rotate-45 hover:rotate-[135deg] transition-all duration-200">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <line x1="18" y1="6" x2="6" y2="18"></line>
          <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
      </button>
    </div>
    @if ($wishlists && count($wishlists) > 0)
      @foreach ($wishlists as $key => $wishlist)
        <livewire:wishlists-list-item :$wishlist :index="$key" wire:key="wishlist-{{ $wishlist->id }}" />
      @endforeach
    @else
      <div class="flex justify-center items-start py-4 px-6 w-full">
        <div class="max-w-80">
          <x-no-wishlist />
        </div>
      </div>
    @endif
  </div>
  <div class="flex flex-col w-full lg:w-2/3 gap-6">
    <div wire:loading.remove.block wire:target.except="add_to_cart">
      @if ($wishlist_items)
        @if (count($wishlist_items))
          @foreach ($wishlist_items as $wishlist_item)
            <livewire:wishlist-item :$wishlist_item wire:key="wishlist-items-{{ $wishlist_item->id }}" />
          @endforeach
        @else
          <x-empty-wishlist />
        @endif
      @else
        <div class="flex justify-center items-center w-full h-full">
          <x-svg.nephos size="64" fill="gray-400" opacity="20" />
        </div>
        <span class="hidden opacity-20"></span>
      @endif
    </div>
    <div wire:loading.flex wire:target.except="add_to_cart" class="flex justify-center items-center ">
      <div class="w-40 h-40">
        <x-spinner size="40" color="gray-400" />
      </div>
    </div>
  </div>
</div>
