@vite('resources/js/modal.js')
<div id="{{ 'modal-' . $modal }}"
  class="fixed top-0 right-0 flex justify-center items-center w-full h-full bg-primary/30 overflow-hidden z-40 invisible opacity-0 transition-all duration-200">
  <div data-modal="{{ $modal }}"
    class="modal-box bg-white dark:bg-slate-700 xs:min-w-[500px] min-w-none w-full xs:w-max mx-2 xs:mx-0 rounded-md overflow-hidden">
    <div class="flex justify-between px-4 py-3 bg-gray-200 dark:bg-slate-800">
      <div class="flex items-center gap-1">
        <img src="{{ isset($img) ? $img : '/img/svg/nephos-grayscale.svg' }}" alt="user"
          class="w-10 h-10 max-w-none rounded-full">
        <p class="text-sm text-slate-900 dark:text-gray-400">{{ $header }}</p>
      </div>
      <div class="flex items-center">
        <a href="javascript:void(0)" data-modal="{{ $modal }}"
          class="close-modal-menu text-gray-400 dark:text-gray-400 hover:text-primary transition-all duration-150">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-x">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
          </svg>
        </a>
      </div>
    </div>
    <div class="px-4 py-2">
      {{ $slot }}
    </div>
  </div>
</div>
