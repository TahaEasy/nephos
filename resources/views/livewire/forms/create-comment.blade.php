<div>
  @vite('resources/js/commentMenu.js')
  <form action="/comments/create" method="POST" wire:submit="submit">
    <div class="flex justify-between my-2">
      @csrf
      <div class="flex justify-start items-center">
        <label for="star-input-1" id="star-1" class="text-gray-400 pe-[6px] cursor-pointer transition-all duration-150">
          <i class="fa-solid fa-star"></i>
        </label>
        <input type="radio" name="rating" class="hidden star-input" id="star-input-1" value="1"
          wire:model="rating">
        <label for="star-input-2" id="star-2"
          class="text-gray-400 pe-[6px] cursor-pointer transition-all duration-150">
          <i class="fa-solid fa-star"></i>
        </label>
        <input type="radio" name="rating" class="hidden star-input" id="star-input-2" value="2"
          wire:model="rating">
        <label for="star-input-3" id="star-3"
          class="text-gray-400 pe-[6px] cursor-pointer transition-all duration-150">
          <i class="fa-solid fa-star"></i>
        </label>
        <input type="radio" name="rating" class="hidden star-input" id="star-input-3" value="3"
          wire:model="rating">
        <label for="star-input-4" id="star-4"
          class="text-gray-400 pe-[6px] cursor-pointer transition-all duration-150">
          <i class="fa-solid fa-star"></i>
        </label>
        <input type="radio" name="rating" class="hidden star-input" id="star-input-4" value="4"
          wire:model="rating">
        <label for="star-input-5" id="star-5"
          class="text-gray-400 pe-[6px] cursor-pointer transition-all duration-150">
          <i class="fa-solid fa-star"></i>
        </label>
        <input type="radio" name="rating" class="hidden star-input" id="star-input-5" value="5"
          wire:model="rating">
      </div>
      <p class="text-yellow-200"></p>
      <p class="text-gray-600 dark:text-gray-400 text-sm" id="rate-text">انتخاب کنید</p>
    </div>
    @error('rating')
      <p class="text-sm text-red-600 mb-4">{{ $message }}</p>
    @enderror
    @error('content')
      <p class="text-sm text-red-600 mt-4">{{ $message }}</p>
    @enderror
    <div class="relative border-[1px] border-slate-400/30">
      <textarea
        class="p-2 mb-12 w-full h-20 dark:bg-transparent focus:h-52 text-sm leading-normal resize-none outline-none transition-all duration-700"
        name="content" placeholder="چیزی بنویسید..." wire:model="content"></textarea>

      <button
        class="absolute left-2 bottom-0 block bg-primary hover:bg-primary/80 hover:shadow-lg shadow-white text-xs py-2 px-3 rounded-md text-white -translate-y-1/2 transition-all duration-300">
        <span wire:loading.remove.flex wire:target="submit">ارسال نظر</span>
        <span wire:loading.flex wire:target="submit" class="px-2">
          <x-spinner size="4" color="white" />
        </span>
      </button>
    </div>
  </form>
</div>
