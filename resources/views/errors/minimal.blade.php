<x-layout title="مشکلی پیش آمده!">
  <div class="h-screen">
    <div class="w-full h-full flex flex-col justify-center items-center">
      <div class="relative">
        <p class="md:text-[18rem] text-[10rem] leading-none text-gray-400/50">@yield('code')</p>
      </div>
      <p class="text-xl text-slate-800 dark:text-slate-200 font-bold sm:px-0 px-2">@yield('title')</p>
      <p class="my-3 text-gray-400 text-sm text-center max-w-96 sm:px-0 px-2">@yield('message')</p>
      <div class="mt-4">
        <a href="/"
          class="block bg-primary px-6 py-2 border-2 border-primary rounded-md text-xs text-slate-200 hover:bg-transparent hover:text-primary transition-all duration-200">بازگشت
          به صفحه اصلی</a>
      </div>
    </div>
  </div>
</x-layout>
