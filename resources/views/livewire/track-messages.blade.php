<div wire:poll.3s="trackUserMessages">
  @if ($unseen_messages && count($unseen_messages) > 0)
    <span
      class="flex justify-center items-center text-xs text-slate-800 dark:text-slate-200 border border-slate-800 dark:border-slate-200 rounded-full p-[0.6rem] w-4 h-4">{{ count(auth()->user()->unseen_messages) }}</span>
  @endif
</div>
