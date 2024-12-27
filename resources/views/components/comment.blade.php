<div class="flex justify-start items-start gap-2 py-4 border-t-[1px] border-slate-400/30 dark:border-slate-600/50">
  <div>
    <img src="{{ route('user-avatar', ['user' => $comment->user->id]) }}" alt="user" class="w-8 h-8 max-w-none rounded-full">
  </div>
  <div>
    <div class="flex flex-wrap gap-2 gap-y-0">
      <p class="flex items-center lg:text-xs text-xxs text-slate-800 dark:text-slate-200 whitespace-nowrap">
        {{ $comment->user->name() }}</p>
      <p></p>
      <x-rate-star :rating="$comment->rating" hideRate smallStars />
    </div>
    <p class="text-xxs text-gray-400 leading-normal">{!! $comment->content !!}</p>
  </div>
</div>
