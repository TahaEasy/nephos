<div class="flex justify-between items-center space-x-5 rtl:space-x-reverse">
  <div
    class="overflow-hidden z-50 flex ml-0 sm:ml-2 cursor-pointer pointer-events-auto select-none justify-start items-center gap-2 mt-1 sm:mt-6 px-4 py-2 rounded-md shadow ltr:border-l-8 rtl:border-r-8 bg-gray-200 hover:bg-gray-200/80 dark:hover:bg-gray-900/80 dark:bg-slate-900 transition-all duration-150"
    x-bind:class="{
        'border-[#3075ff]': toast.type === 'info',
        'border-[#00b289]': toast.type === 'success',
        'border-yellow-500': toast.type === 'warning',
        'border-red-500': toast.type === 'danger',
        'border-slate-800 dark:border-slate-200': toast.type === 'debug'
    }">
    <div>
      @include('tall-toasts::includes.icon')
    </div>
    <div>
      <p class="text-sm leading-normal font-bold"
        x-bind:class="{
            'text-[#308dff]': toast.type === 'info',
            'text-[#00b289]': toast.type === 'success',
            'text-yellow-500': toast.type === 'warning',
            'text-red-500': toast.type === 'danger',
            'text-slate-800 dark:text-slate-200': toast.type === 'debug'
        }"
        x-html="toast.title" x-show="toast.title !== undefined"></p>
      <p class="text-sm leading-normal mt-1 text-slate-800 dark:text-slate-200" x-show="toast.message !== undefined"
        x-html="toast.message">
      </p>
    </div>
  </div>
</div>
