<div class="flex flex-col justify-center items-center">
  <x-svg.empty-bag />
  <p class="text-slate-800 dark:text-slate-200 font-bold mt-2">سبد خرید شما خالی است!</p>
  <p class="text-sm text-slate-600 dark:text-gray-400 my-2">آن را از محصولات متنوع پر کنید!</p>
  <a href="{{ route('shop') }}"
    class="block py-2 px-8 w-fit text-primary bg-transparent border-[1px] border-primary hover:bg-primary hover:text-slate-200 glow-primary glow-hover rounded-full whitespace-nowrap transition-all duration-300">ادامه
    خرید</a>
  <p class="text-sm text-slate-400 my-2">
    @auth
      کالا های درون سبد خرید شما اینجا نمایش داده میشوند
    @else
      می توانید بعداً حساب کاربری خود را ایجاد کنید
    @endauth
  </p>
</div>
