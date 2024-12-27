<div>
  <div wire:poll.10s>
    @if ($unconfirmed_comments && count($unconfirmed_comments) > 0)
      <p class="relative mb-4 pb-1 text-center text-lg font-bold text-slate-800 dark:text-slate-200">
        کامنت های تایید نشده
        <span
          class="absolute bottom-0 right-1/2 translate-y-full translate-x-1/2 w-20 h-1 bg-slate-800 dark:bg-slate-200 rounded-full"></span>
      </p>
      @foreach ($unconfirmed_comments as $comment)
        <div class="group relative overflow-hidden" wire:key="{{ $comment->id }}">
          <div
            class="flex justify-start items-start gap-2 py-4 pe-4 border-y border-slate-400/30 dark:border-slate-600/50">
            <div>
              <img src="{{ route('user-avatar', ['user' => $comment->user->id]) }}" alt="user" class="w-8 h-8 max-w-none rounded-full">
            </div>
            <div>
              <div class="flex flex-wrap gap-2 gap-y-0">
                <a href="{{ route('admin.user.comments', ['user' => $comment->user->id]) }}"
                  class="flex items-center lg:text-sm text-xs hover:text-primary hover:underline text-slate-800 dark:text-slate-200 whitespace-nowrap">
                  {{ $comment->user->name() }}</a>
                <x-rate-star :rating="$comment->rating" hideRate smallStars />
              </div>
              <p class="mt-1 lg:text-sm text-xs text-slate-800 dark:text-slate-200 whitespace-nowrap">
                <strong>تاریخ:</strong> {{ verta($comment->created_at)->format('d F Y') }}
                ({{ verta($comment->created_at)->formatDifference() }})
              </p>
              <p class="mt-1 lg:text-sm text-xs text-slate-800 dark:text-slate-200 whitespace-nowrap">
                <strong>محصول:</strong>
                <a href="{{ route('admin.products.edit', ['slug' => $comment->product->slug]) }}"
                  class="hover:text-primary hover:underline text-slate-800 dark:text-slate-200 whitespace-nowrap">
                  {{ $comment->product->name }}
                </a>
              </p>
              <p class="mt-1 lg:text-sm text-xs text-slate-800 dark:text-slate-200 whitespace-nowrap">
                <strong>متن:</strong>
              </p>
              <p class="text-xxs text-gray-400 leading-normal">{!! $comment->content !!}</p>
            </div>
          </div>

          <button wire:click="confirmComment({{ $comment->id }})"
            class="group absolute sm:-left-24 left-4 top-6 -translate-y-1/2 group-hover:left-4 flex justify-start items-center w-fit p-1 font-medium rounded-sm text-white bg-blue-600 hover:bg-blue-600/80 border border-blue-800 transition-all duration-200">
            <svg wire:loading.remove.flex wire:target="confirmComment({{ $comment->id }})"
              xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="lucide lucide-check pe-1">
              <path d="M20 6 9 17l-5-5" />
            </svg>
            <span wire:loading.flex wire:target="confirmComment({{ $comment->id }})" class="flex pe-1">
              <x-spinner size="[15px]" color="white" />
            </span>
            <span class="text-xs ps-1 border-s border-blue-800">تایید کامنت</span>
          </button>

          <button wire:click="cancelComment({{ $comment->id }})"
            class="group absolute sm:-left-24 left-4 top-14 -translate-y-1/2 group-hover:left-4 flex justify-start items-center w-fit p-1 font-medium rounded-sm text-white bg-red-600 hover:bg-red-600/80 border border-red-800 transition-all duration-200">
            <svg wire:loading.remove.flex wire:target="cancelComment({{ $comment->id }})"
              xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="lucide lucide-circle-x pe-1">
              <circle cx="12" cy="12" r="10" />
              <path d="m15 9-6 6" />
              <path d="m9 9 6 6" />
            </svg>
            <span wire:loading.flex wire:target="cancelComment({{ $comment->id }})" class="flex pe-1">
              <x-spinner size="[15px]" color="white" />
            </span>
            <span class="text-xs ps-1 border-s border-red-800">لغو کامنت</span>
          </button>
        </div>
      @endforeach
    @endif

    <div dir="ltr" class="my-8">
      {{ $unconfirmed_comments->links(data: ['scrollTo' => false]) }}
    </div>

    <p class="relative my-4 pb-1 text-center text-lg font-bold text-slate-800 dark:text-slate-200">
      کامنت های سایت
      <span
        class="absolute bottom-0 right-1/2 translate-y-full translate-x-1/2 w-20 h-1 bg-slate-800 dark:bg-slate-200 rounded-full"></span>
    </p>
    @if ($comments && count($comments) > 0)
      @foreach ($comments as $comment)
        <div class="group relative overflow-hidden" wire:key="{{ $comment->id }}">
          <div
            class="flex justify-start items-start gap-2 py-4 pe-4 border-y border-slate-400/30 dark:border-slate-600/50">
            <div>
              <img src="{{ route('user-avatar', ['user' => $comment->user->id]) }}" alt="user" class="w-8 h-8 max-w-none rounded-full">
            </div>
            <div>
              <div class="flex flex-wrap gap-2 gap-y-0">
                <a href="{{ route('admin.user.comments', ['user' => $comment->user->id]) }}"
                  class="flex items-center lg:text-sm text-xs  hover:text-primary hover:underline text-slate-800 dark:text-slate-200 whitespace-nowrap">
                  {{ $comment->user->name() }}</a>
                <x-rate-star :rating="$comment->rating" hideRate smallStars />
              </div>
              <p class="mt-1 lg:text-sm text-xs text-slate-800 dark:text-slate-200 whitespace-nowrap">
                <strong>تاریخ:</strong> {{ verta($comment->created_at)->format('d F Y') }}
                ({{ verta($comment->created_at)->formatDifference() }})
              </p>
              <p class="mt-1 lg:text-sm text-xs text-slate-800 dark:text-slate-200 whitespace-nowrap">
                <strong>محصول:</strong>
                <a href="{{ route('admin.products.edit', ['slug' => $comment->product->slug]) }}"
                  class="hover:text-primary hover:underline text-slate-800 dark:text-slate-200 whitespace-nowrap">
                  {{ $comment->product->name }}
                </a>
              </p>
              <p class="mt-1 lg:text-sm text-xs text-slate-800 dark:text-slate-200 whitespace-nowrap">
                <strong>متن:</strong>
              </p>
              <p class="text-xxs text-gray-400 leading-normal">{!! $comment->content !!}</p>
            </div>
          </div>
          <button wire:click="delete_comment({{ $comment->id }})" wire:loading.attr="disabled"
            wire:loading.class="!border-redy !border-solid" wire:target="delete_comment"
            class="absolute left-4 top-10 sm:-top-10 -translate-y-1/2 group-hover:top-10 block p-2 border-[1px] border-gray-400 border-solid hover:border-redy rounded-full text-gray-400 hover:text-redy transition-all duration-200">
            <svg wire:loading.remove.block wire:target="delete_comment" xmlns="http://www.w3.org/2000/svg"
              width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
              stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
              <polyline points="3 6 5 6 21 6"></polyline>
              <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
              <line x1="10" y1="11" x2="10" y2="17"></line>
              <line x1="14" y1="11" x2="14" y2="17"></line>
            </svg>
            <div wire:loading.block wire:target="delete_comment"
              class="h-[18px] w-[18px] animate-spin rounded-full border-4 border-solid border-current border-e-transparent align-[-0.125em] text-redy motion-reduce:animate-[spin_1.5s_linear_infinite]"
              role="status">
              <span
                class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">صبر
                کنید...</span>
            </div>
          </button>
        </div>
      @endforeach
    @else
      <p class="text-redy text-center">متاسفانه در حال حاضر هیچ کامنتی وجود ندارد!</p>
    @endif

    <div dir="ltr" class="mt-8">
      {{ $comments->links(data: ['scrollTo' => false]) }}
    </div>
  </div>
</div>
