    <div id="{{ $id }}" class="flex justify-between items-center pb-2 mb-4 border-b-[1px] border-slate-500/20">
        <h1 class="text-2xl dark:text-gray-400">{{ $header }}</h1>
        <span class="w-12 h-12">
            <x-product-logo :type="$id" />
        </span>
    </div>
