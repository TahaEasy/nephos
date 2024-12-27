<div class="w-9/12 mt-12">
  @auth
    <x-modal header="افزودن به لیست علاقه مندی" modal="wishlist" wire:key="wishlist-modal">
      <livewire:forms.create-wishlist-item-form />
    </x-modal>
  @endauth
  <div class="flex justify-between items-center">
    <div class="flex justify-start items-center gap-2">
      @if ($productStyle === 'block')
        <a href="javascript:void(0)" class="text-primary pointer-events-none">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-grid">
            <rect x="3" y="3" width="7" height="7"></rect>
            <rect x="14" y="3" width="7" height="7"></rect>
            <rect x="14" y="14" width="7" height="7"></rect>
            <rect x="3" y="14" width="7" height="7"></rect>
          </svg>
        </a>
      @else
        <a href="javascript:void(0)" wire:click="setStyle('block')" class="hidden xs:block text-gray-400">
          <svg xmlns="http://www.w3.org/2000/svg" wire:loading.remove.flex wire:target="setStyle('block')"
            width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid">
            <rect x="3" y="3" width="7" height="7"></rect>
            <rect x="14" y="3" width="7" height="7"></rect>
            <rect x="14" y="14" width="7" height="7"></rect>
            <rect x="3" y="14" width="7" height="7"></rect>
          </svg>
          <span wire:loading.flex wire:target="setStyle('block')" class="flex justify-center items-center">
            <x-spinner size='5' color="primary" />
          </span>
        </a>
      @endif
      @if ($productStyle === 'list')
        <a href="javascript:void(0)" class="text-primary pointer-events-none">
          <svg xmlns="http://www.w3.org/2000/svg" wire:loading.remove.flex wire:target="setStyle('list')" width="28"
            height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round" class="feather feather-list">
            <line x1="8" y1="6" x2="21" y2="6"></line>
            <line x1="8" y1="12" x2="21" y2="12"></line>
            <line x1="8" y1="18" x2="21" y2="18"></line>
            <line x1="3" y1="6" x2="3.01" y2="6"></line>
            <line x1="3" y1="12" x2="3.01" y2="12"></line>
            <line x1="3" y1="18" x2="3.01" y2="18"></line>
          </svg>
        </a>
      @else
        <a href="javascript:void(0)" wire:click="setStyle('list')" class="hidden xs:block text-gray-400">
          <svg xmlns="http://www.w3.org/2000/svg" wire:loading.remove.flex wire:target="setStyle('list')" width="24"
            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round" class="feather feather-list">
            <line x1="8" y1="6" x2="21" y2="6"></line>
            <line x1="8" y1="12" x2="21" y2="12"></line>
            <line x1="8" y1="18" x2="21" y2="18"></line>
            <line x1="3" y1="6" x2="3.01" y2="6"></line>
            <line x1="3" y1="12" x2="3.01" y2="12"></line>
            <line x1="3" y1="18" x2="3.01" y2="18"></line>
          </svg>
          <span wire:loading.flex wire:target="setStyle('list')" class="flex justify-center items-center w-6 h-5">
            <x-spinner size='5' color="primary" />
          </span>
        </a>
      @endif
    </div>

    {{-- start dropdown --}}
    <div
      class="relative w-40 xs:w-52 dark:text-slate-200 has-[input:checked]:bg-layout dark:has-[input:checked]:bg-slate-700 flex justify-between items-center bg-white dark:bg-slate-800 border-white dark:border-slate-800 border-[1px] rounded-full px-2 xs:px-4 py-2 transition-all duration-300">
      <input type="checkbox" id="dropdown-checkbox"
        class="dropdown peer absolute top-0 left-0 w-full h-full opacity-0 cursor-pointer z-10">

      <p class="text-xxs xs:text-sm text-gray-600 dark:text-slate-300" wire:loading wire:target="setOrderBy">صبر
        کنید...
      </p>
      <p class="text-xxs xs:text-sm text-gray-600 dark:text-slate-300" wire:loading.remove wire:target="setOrderBy">
        {{ __('messages.' . $orderBy) }}</p>
      <span
        class="peer-checked:rotate-180 dark:text-slate-200 flex justify-center items-center -translate-x-1/4 text-xl transition-all duration-300">
        <svg class="fill-gray-600 dark:fill-slate-300 w-[15px] h-[15px] xs:w-[20px] xs:h-[20px]" width="20"
          height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd"
            d="M12.7071 14.7071C12.3166 15.0976 11.6834 15.0976 11.2929 14.7071L6.29289 9.70711C5.90237 9.31658 5.90237 8.68342 6.29289 8.29289C6.68342 7.90237 7.31658 7.90237 7.70711 8.29289L12 12.5858L16.2929 8.29289C16.6834 7.90237 17.3166 7.90237 17.7071 8.29289C18.0976 8.68342 18.0976 9.31658 17.7071 9.70711L12.7071 14.7071Z" />
        </svg>
      </span>

      <div
        class="absolute top-8 left-0 z-20 w-52 py-2 h-max bg-white dark:bg-slate-800 rounded-md drop-shadow-lg shadow-slate-500 opacity-0 invisible peer-checked:top-12 peer-checked:opacity-100 peer-checked:visible transition-all duration-300">
        <x-dropdown-item :selected="$orderBy" name="newest-products" fun='setOrderBy' />
        <x-dropdown-item :selected="$orderBy" name="cheapest-products" fun='setOrderBy' />
        <x-dropdown-item :selected="$orderBy" name="most-expensive-products" fun='setOrderBy' />
        <x-dropdown-item :selected="$orderBy" name="most-discount" fun='setOrderBy' />
        <x-dropdown-item :selected="$orderBy" name="random-order" fun='setOrderBy' />
      </div>
    </div>
    {{-- end dropdown --}}

  </div>
  <div>
    {{-- house --}}
    <div class="my-8">
      <livewire:products-header id="house" header="منزل" />
      <div class="{{ $productStyle == 'block' ? 'grid grid-cols-1 xs:grid-cols-2 gap-4' : '' }}">
        @foreach ($products_house as $product)
          <livewire:product :$productStyle :$product wire:key="{{ $product->id }}" />
        @endforeach
      </div>
      <div class="mt-4" dir="ltr">
        {{ $products_house->links(data: ['scrollTo' => '#house']) }}
      </div>
    </div>

    {{-- office --}}
    <div class="my-8">
      <livewire:products-header id="office" header="محل کار" />
      <div class="{{ $productStyle == 'block' ? 'grid grid-cols-1 xs:grid-cols-2 gap-4' : '' }}">
        @foreach ($products_office as $product)
          <livewire:product :$productStyle :$product :key="$product->id" />
        @endforeach
      </div>
      <div class="mt-4" dir="ltr">
        {{ $products_office->links(data: ['scrollTo' => '#office']) }}
      </div>
    </div>

    {{-- kids --}}
    <div class="my-8">
      <livewire:products-header id="kids" header="برای کودکان" />
      <div class="{{ $productStyle == 'block' ? 'grid grid-cols-1 xs:grid-cols-2 gap-4' : '' }}">
        @foreach ($products_kids as $product)
          <livewire:product :$productStyle :$product :key="$product->id" />
        @endforeach
      </div>
      <div class="mt-4" dir="ltr">
        {{ $products_kids->links(data: ['scrollTo' => '#kids']) }}
      </div>
    </div>

    {{-- kitchen --}}
    <div class="my-8">
      <livewire:products-header id="kitchen" header="آشپزخانه" />
      <div class="{{ $productStyle == 'block' ? 'grid grid-cols-1 xs:grid-cols-2 gap-4' : '' }}">
        @foreach ($products_kitchen as $product)
          <livewire:product :$productStyle :$product :key="$product->id" />
        @endforeach
      </div>
      <div class="mt-4" dir="ltr">
        {{ $products_kitchen->links(data: ['scrollTo' => '#kitchen']) }}
      </div>
    </div>

    {{-- accessories --}}
    <div class="my-8">
      <livewire:products-header id="accessories" header="لوازم جانبی" />
      <div class="{{ $productStyle == 'block' ? 'grid grid-cols-1 xs:grid-cols-2 gap-4' : '' }}">
        @foreach ($products_accessories as $product)
          <livewire:product :$productStyle :$product :key="$product->id" />
        @endforeach
      </div>
      <div class="mt-4" dir="ltr">
        {{ $products_accessories->links(data: ['scrollTo' => '#accessories']) }}
      </div>
    </div>
  </div>
</div>
