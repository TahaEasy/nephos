<div class="lg:flex justify-start items-center whitespace-nowrap">
  @for ($i = 1; $i <= 5; $i++)
    @if ($i - $rating > 0 && $i - $rating < 1)
      <span
        class="text-transparent bg-gradient-to-l bg-clip-text from-yellow-400 from-50% to-gray-400 to-50% {{ isset($smallStars) ? 'text-xxs' : 'text-xs' }} ml-[2px]">
        <i class="fa-solid fa-star"></i>
      </span>
    @elseif ($i <= $rating)
      <span class="text-yellow-400 {{ isset($smallStars) ? 'text-xxs' : 'text-xs' }} ml-[2px]">
        <i class="fa-solid fa-star"></i>
      </span>
    @else
      <span class="text-gray-400 {{ isset($smallStars) ? 'text-xxs' : 'text-xs' }} ml-[2px]">
        <i class="fa-solid fa-star"></i>
      </span>
    @endif
  @endfor

  @empty($hideRate)
    <span class="hidden lg:inline text-xxs text-gray-400 mr-[2px]">{{ $total ? $total . ' نظر' : 'بدون نظر' }}</span>
  @endempty
</div>
