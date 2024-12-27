<div>
  <div wire:poll.10s>
    <div class="flex justify-between items-center">
      <p class="text-slate-800 dark:text-slate-200 font-bold text-lg">پیام ها</p>
      <div
        class="relative dark:text-slate-200 has-[input:checked]:bg-layout dark:has-[input:checked]:bg-slate-700 flex justify-between items-center bg-white dark:bg-slate-800 border-white dark:border-slate-800 border-[1px] rounded-full px-2 xs:px-4 py-2 transition-all duration-300">
        <input type="checkbox" id="dropdown-checkbox"
          class="dropdown peer absolute top-0 left-0 w-full h-full opacity-0 cursor-pointer z-10">

        <p class="text-xxs xs:text-sm text-gray-600 dark:text-slate-300" wire:loading wire:target="setValue">صبر کنید...
        </p>
        <p class="text-xxs xs:text-sm text-gray-600 dark:text-slate-300" wire:loading.remove wire:target="setValue">
          {{ __('messages.' . $selectedValue) }}
        </p>
        <span
          class="peer-checked:rotate-180 dark:text-slate-200 flex justify-center items-center -translate-x-1/4 text-xl transition-all duration-300">
          <svg class="fill-gray-600 dark:fill-slate-300 w-[15px] h-[15px] xs:w-[20px] xs:h-[20px]" width="20"
            height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
              d="M12.7071 14.7071C12.3166 15.0976 11.6834 15.0976 11.2929 14.7071L6.29289 9.70711C5.90237 9.31658 5.90237 8.68342 6.29289 8.29289C6.68342 7.90237 7.31658 7.90237 7.70711 8.29289L12 12.5858L16.2929 8.29289C16.6834 7.90237 17.3166 7.90237 17.7071 8.29289C18.0976 8.68342 18.0976 9.31658 17.7071 9.70711L12.7071 14.7071Z" />
          </svg>
        </span>

        <div
          class="absolute top-8 left-0 z-20 w-56 py-2 h-max bg-white dark:bg-slate-800 rounded-md drop-shadow-lg shadow-slate-500 opacity-0 invisible peer-checked:top-12 peer-checked:opacity-100 peer-checked:visible transition-all duration-300">
          <x-dropdown-item :selected="$selectedValue" name="read" fun='setValue' />
          <x-dropdown-item :selected="$selectedValue" name="unread" fun='setValue' />
        </div>
      </div>
    </div>
    <div>
      @if ($messages && count($messages) > 0)
        <div class="flex justify-end items-center mt-2">
          @if ($selectedValue === 'unread')
            <button wire:click="all_messages_seen()" wire:loading.attr="disabled" wire:target="all_messages_seen()"
              class="flex justify-end items-center gap-2 h-8 -mt-px text-sm text-slate-800 hover:bg-slate-100 dark:text-slate-200 dark:hover:bg-slate-600 border border-t border-slate-700/30 dark:border-slate-400 px-2 py-1">
              <span>همه را خواندم</span>
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-check-check">
                <path d="M18 6 7 17l-5-5" />
                <path d="m22 10-7.5 7.5L13 16" />
              </svg>
            </button>
          @endif
          @if ($selectedValue === 'read')
            <button wire:click="all_messages_delete()" wire:loading.attr="disabled" wire:target="all_messages_delete()"
              class="flex justify-end items-center gap-2 h-8 -mt-px text-sm text-slate-800 hover:bg-slate-100 dark:text-slate-200 dark:hover:bg-slate-600 border border-t border-slate-700/30 dark:border-slate-400 px-2 py-1">
              <span>حذف همه</span>
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-trash-2">
                <path d="M3 6h18" />
                <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                <line x1="10" x2="10" y1="11" y2="17" />
                <line x1="14" x2="14" y1="11" y2="17" />
              </svg>
            </button>
          @endif
        </div>
        @foreach ($messages as $message)
          <div
            class="flex justify-start items-center gap-2 mt-6 px-4 py-2 rounded-sm rounded-ee-none border border-slate-700/30 dark:border-slate-400">
            <div>
              <div class="flex justify-start gap-2">
                @if ($message->type === 'info')
                  <svg class="max-w-none w-5 h-5 text-blue-700" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 192 512">
                    <path fill="currentColor" fill-opacity="0.5"
                      d="M20 448h152a20 20 0 0 1 20 20v24a20 20 0 0 1-20 20H20a20 20 0 0 1-20-20v-24a20 20 0 0 1 20-20z" />
                    <path fill="currentColor"
                      d="M96 128a64 64 0 1 0-64-64 64 64 0 0 0 64 64zm28 64H20a20 20 0 0 0-20 20v24a20 20 0 0 0 20 20h28v192h96V212a20 20 0 0 0-20-20z" />
                  </svg>
                  <p class="text-sm leading-normal text-sea">{{ $message->title }}</p>
                @endif
                @if ($message->type === 'danger')
                  <img src="/img/logos/nephos-red.svg" alt="nephos-warn" class="max-w-none w-5 h-5">
                  <p class="text-sm leading-normal text-redy">{{ $message->title }}</p>
                @endif
                @if ($message->type === 'success')
                  <img src="/img/logos/nephos-green-s.svg" alt="nephos-warn" class="max-w-none w-5 h-5">
                  <p class="text-sm leading-normal text-muddy">{{ $message->title }}</p>
                @endif
                @if ($message->type === 'warning')
                  <img src="/img/logos/nephos-gold.svg" alt="nephos-warn" class="max-w-none w-5 h-5">
                  <p class="text-sm leading-normal text-orangey">{{ $message->title }}</p>
                @endif
              </div>
              <p class="text-sm text-start leading-normal mt-1 text-slate-800 dark:text-slate-200">
                {{ $message->content }}
              </p>
            </div>
          </div>
          <div class="flex justify-between items-start">
            <p
              class="flex justify-end items-center h-8 -mt-px text-xs text-slate-800 dark:text-slate-200 border border-t-0 border-slate-700/30 dark:border-slate-400 px-2 py-1">
              تاریخ: {{ verta($message->created_at)->format('d F Y') }}
              ({{ verta($message->created_at)->formatDifference() }})
            </p>
            @if (!$message->is_seen)
              <button wire:click="message_seen({{ $message->id }})" wire:loading.attr="disabled"
                wire:target="message_seen({{ $message->id }})"
                class="flex justify-end items-center gap-2 h-8 -mt-px text-sm text-slate-800 hover:bg-slate-100 dark:text-slate-200 dark:hover:bg-slate-600 border border-t-0 hover:border-t border-slate-700/30 dark:border-slate-400 px-2 py-1">
                <span>خواندم</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="lucide lucide-check">
                  <path d="M20 6 9 17l-5-5" />
                </svg>
              </button>
            @endif
          </div>
        @endforeach
      @else
        <div>
          <div class="flex justify-center items-center py-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="90" height="90" viewBox="0 0 24 24"
              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="lucide lucide-message-square-off text-gray-400">
              <path d="M21 15V5a2 2 0 0 0-2-2H9" />
              <path d="m2 2 20 20" />
              <path d="M3.6 3.6c-.4.3-.6.8-.6 1.4v16l4-4h10" />
            </svg>
          </div>
          <p class="text-slate-800 dark:text-slate-200 text-sm">پیامی وجود ندارد!</p>
        </div>
      @endif
    </div>

    <div dir="ltr" class="mt-4">
      {{ $messages->links(data: ['scrollTo' => false]) }}
    </div>
  </div>
</div>
