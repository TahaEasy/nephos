<div class="flex flex-col justify-center items-center text-center">
  <x-svg.empty-wishlist-item size="44" />
  <p class="text-slate-800 dark:text-slate-200 font-bold mt-2">سفارشی وجود ندارد!</p>
  @isset($admin)
    <p class="text-sm text-slate-600 dark:text-gray-400 my-2 max-w-96">به نظر میرسید این کاربر هنوز سفارشی انجام نداده است،
      سفارشات انجام شده توسط این کاربر اینجا نمایش داده میشود.</p>
  @else
    <p class="text-sm text-slate-600 dark:text-gray-400 my-2 max-w-96">به نظر میرسد تا حالا خریدی انجام نداده اید! به محض
      اینکه
      سفارشی انجام دهید، اینجا نمایش داده میشود.</p>
  @endisset
</div>
