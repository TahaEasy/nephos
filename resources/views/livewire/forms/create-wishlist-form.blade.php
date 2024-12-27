<div>
  <div class="flex justify-center items-start py-4 px-6 w-full">
    <div class="max-w-80">
      <form wire:submit.prevent="save_wishlist_item" class="flex flex-col justify-center items-center text-center">
        <x-svg.add-wishlist size="32" />
        <p class="text-sm text-gray-400 font-normal my-2">یک زیر لیست جدید برای طبقه بندی موارد لیست علاقه
          مندی خود اضافه کنید. سپس می توانید آنها را مدیریت کنید و راحت تر آنها را پیدا کنید.</p>
        <div class="relative text-right w-full mb-2">
          <input type="text" autocomplete="off" name="title" id="title" placeholder="نام لیست علاقه مندی"
            wire:model.live="title"
            class="peer outline-none rounded-sm @error('title') border-red-600 @else dark:border-gray-700 focus:dark:border-gray-300 border-gray-300 hover:border-gray-400 focus:border-gray-700 @enderror dark:bg-slate-800 dark:text-slate-200 border-[1px] w-full py-1 pe-2 ps-2 transition-all duration-200">
          @error('title')
            <p class="text-xs text-red-600 mt-1 mb-2">{{ $message }}</p>
          @enderror
        </div>
        <button
          class="block py-3 px-4 w-full text-center text-xs text-white bg-primary hover:bg-primary/80 hover:shadow-xl shadow-white rounded-sm whitespace-nowrap transition-all duration-300">
          <span wire:loading.remove wire:target="save_wishlist_item">ایجاد لیست علاقه مندی</span>
          <span wire:loading wire:target="save_wishlist_item">
            <x-spinner size="4" color="slate-200" />
          </span>
        </button>
      </form>
    </div>
  </div>
</div>
