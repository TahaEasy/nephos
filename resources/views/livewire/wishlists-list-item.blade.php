<div>
  <div
    class="group relative flex justify-between items-center px-6 py-4 @if ($wishlist->id == $current_index) bg-slate-100/70 dark:bg-slate-700/30 @else hover:bg-slate-100/50 dark:hover:bg-slate-700/40 @endif ">
    <input type="radio" name="selected_wishlist" wire:click="select_wishlist({{ $wishlist->id }})"
      class="peer opacity-0 absolute top-0 right-0 w-full h-full cursor-pointer z-10">
    <p
      class="@if ($wishlist->id == $current_index) text-slate-800 dark:text-slate-200 @else text-gray-400 dark:text-slate-500 @endif group-hover:text-slate-500 text-sm">
      {{ $wishlist->title }}</p>
    @if ($isItemLoading)
      <div class="flex justify-start items-center">
        <x-spinner size="5" color="gray-400" />
      </div>
    @else
      <div
        class="flex justify-end gap-2 items-center @if ($wishlist->id == $current_index) opacity-100 visible @else opacity-0 invisible @endif">
        <p class="text-gray-400 text-sm static">
          {{ $total_wishlist_items ? $total_wishlist_items . ' مورد' : 'خالی' }}</p>
        <button wire:click="delete_wishlist()" wire:loading.attr="disabled" wire:target="delete_wishlist"
          class="group rounded-full text-gray-400 hover:text-primary transition-all duration-200 z-20">
          <svg wire:loading.remove.flex wire:target="delete_wishlist" xmlns="http://www.w3.org/2000/svg" width="18"
            height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
            <polyline points="3 6 5 6 21 6"></polyline>
            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
            <line x1="10" y1="11" x2="10" y2="17"></line>
            <line x1="14" y1="11" x2="14" y2="17"></line>
          </svg>
          <span wire:loading.flex wire:target="delete_wishlist">
            <x-spinner size="[18px]" color="primary" />
          </span>
        </button>
      </div>
    @endif
  </div>
</div>
