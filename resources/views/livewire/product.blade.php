    <div
      class="group relative overflow-hidden flex {{ $isBlockStyle ? 'llg:flex-row' : 'xs:flex-row' }} flex-col justify-between items-center gap-8 lg:gap-0 w-full my-2 py-8 px-8 bg-white dark:bg-slate-800 rounded-sm hover:shadow-lg dark:hover:shadow-primary dark:hover:shadow-md transition-all duration-500">
      @if ($product->discount)
        <span class="absolute top-2 right-2 w-16 h-16 z-10">
          <svg class="fill-white" height="20" width="20" version="1.1" id="Capa_1"
            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 209.281 209.281"
            xml:space="preserve">
            <g>
              <path
                d="M207.17,99.424l-20.683-21.377l4.168-29.455c0.567-4.006-2.145-7.739-6.131-8.438l-29.298-5.137L141.285,8.739c-1.896-3.575-6.287-4.998-9.919-3.223L104.64,18.582L77.916,5.517c-3.636-1.777-8.023-0.351-9.92,3.223L54.055,35.018l-29.298,5.137c-3.985,0.698-6.698,4.432-6.131,8.438l4.167,29.455L2.11,99.424c-2.813,2.907-2.813,7.522,0,10.43l20.682,21.378l-4.167,29.456c-0.566,4.005,2.146,7.738,6.13,8.438l29.299,5.14l13.942,26.275c1.896,3.574,6.284,5,9.919,3.223l26.724-13.062l26.727,13.062c1.059,0.518,2.181,0.763,3.288,0.763c2.691,0,5.286-1.454,6.63-3.986l13.942-26.275l29.299-5.14c3.984-0.699,6.697-4.433,6.13-8.438l-4.168-29.456l20.684-21.378C209.984,106.946,209.984,102.332,207.17,99.424zM173.158,123.438c-1.608,1.662-2.359,3.975-2.035,6.266l3.665,25.902l-25.764,4.52c-2.278,0.4-4.245,1.829-5.329,3.872l-12.26,23.105l-23.502-11.486c-1.039-0.508-2.166-0.762-3.294-0.762c-1.127,0-2.254,0.254-3.293,0.762l-23.5,11.486l-12.26-23.105c-1.084-2.043-3.051-3.472-5.329-3.872l-25.764-4.52l3.664-25.902c0.324-2.29-0.427-4.603-2.036-6.265l-18.186-18.799l18.186-18.797c1.608-1.662,2.36-3.975,2.036-6.265l-3.664-25.901l25.763-4.517c2.279-0.399,4.246-1.829,5.331-3.872l12.259-23.108l23.499,11.489c2.078,1.017,4.508,1.017,6.588,0l23.501-11.489l12.26,23.108c1.084,2.043,3.051,3.473,5.33,3.872l25.763,4.517l-3.665,25.901c-0.324,2.291,0.427,4.603,2.036,6.266l18.186,18.796L173.158,123.438z" />
              <path
                d="M80.819,98.979c10.014,0,18.16-8.146,18.16-18.158c0-10.016-8.146-18.164-18.16-18.164c-10.015,0-18.162,8.148-18.162,18.164C62.657,90.834,70.805,98.979,80.819,98.979z M80.819,74.657c3.397,0,6.16,2.765,6.16,6.164c0,3.396-2.764,6.158-6.16,6.158c-3.398,0-6.162-2.763-6.162-6.158C74.657,77.422,77.421,74.657,80.819,74.657z" />
              <path
                d="M140.867,68.414c-2.342-2.343-6.143-2.344-8.484,0l-63.968,63.967c-2.343,2.343-2.343,6.142,0,8.485c1.172,1.172,2.707,1.757,4.243,1.757c1.535,0,3.071-0.586,4.243-1.757l63.967-63.967C143.21,74.556,143.21,70.757,140.867,68.414z" />
              <path
                d="M128.46,110.301c-10.013,0-18.158,8.146-18.158,18.158c0,10.016,8.146,18.164,18.158,18.164c10.016,0,18.164-8.148,18.164-18.164C146.624,118.447,138.476,110.301,128.46,110.301z M128.46,134.624c-3.395,0-6.158-2.765-6.158-6.164c0-3.395,2.763-6.158,6.158-6.158c3.398,0,6.164,2.763,6.164,6.158C134.624,131.858,131.859,134.624,128.46,134.624z" />
            </g>
          </svg>
        </span>
        <div
          class="absolute top-0 right-0 translate-x-1/2 -translate-y-1/2 bg-primary shadow-2xl shadow-transparent dark:shadow-primary w-20 h-20 rotate-45">
        </div>
      @endif
      @auth
        @if (auth()->user()->is_admin)
          <a href="javascript:void(0)" wire:click="adminsCantLike()"
            class="absolute left-8 lg:-left-8 group-hover:left-8 top-4 text-gray-400 dark:text-slate-400 hover:text-red-600 transition-all duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="feather feather-heart">
              <path
                d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
              </path>
            </svg>
          </a>
        @else
          <a href="javascript:void(0)" wire:click="select_product" data-modal="wishlist"
            class="open-modal-menu absolute left-8 lg:-left-8 group-hover:left-8 top-4 text-gray-400 dark:text-slate-400 hover:text-red-600 transition-all duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="feather feather-heart">
              <path
                d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
              </path>
            </svg>
          </a>
        @endif
      @else
        <a href="javascript:void(0)" wire:click="loginBro()"
          class="absolute left-8 lg:-left-8 group-hover:left-8 top-4 text-gray-400 dark:text-slate-400 hover:text-red-600 transition-all duration-300">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-heart">
            <path
              d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
            </path>
          </svg>
        </a>
      @endauth
      <button wire:click="add_cart_item"
        class="absolute left-16 lg:-left-8 group-hover:left-16 top-4 text-gray-400 dark:text-slate-400 hover:text-primary transition-all duration-300 group-hover:delay-0 delay-150">
        <svg xmlns="http://www.w3.org/2000/svg" wire:loading.remove.flex wire:target="add_cart_item" width="16"
          height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
          stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart">
          <circle cx="9" cy="21" r="1"></circle>
          <circle cx="20" cy="21" r="1"></circle>
          <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
        </svg>
        <span wire:loading.flex wire:target="add_cart_item" class="flex justify-center items-center">
          <x-spinner size='4' color="primary" />
        </span>
      </button>
      <div
        class="flex {{ $isBlockStyle ? 'llg:flex-row llg:justify-start llg:text-right llg:gap-8 mt-2 md:mt-0' : 'xs:flex-row xs:justify-start xs:text-right xs:gap-8 mt-2 xs:mt-0' }} gap-2 text-center flex-col justify-start items-center">
        <div class="w-20 h-20">
          <img src="{{ route('product-images', ['slug' => $product->slug]) }}" alt="product">
        </div>
        <div>
          <x-rate-star :rating="$product->avg_rate()" :total="$product->total_rates()" />
          <a href="{{ route('product', ['product' => $product->slug]) }}"
            class="text-slate-700 hover:text-primary/90 dark:text-slate-100 text-xs font-bold my-1">{{ $product->name }}</a>
          <p class="text-xs lg:text-sm whitespace-nowrap text-primary">
            {{ $product->discount ? number_format($product->price - ($product->price * $product->discount) / 100) : number_format($product->price) }}
            تومان
          </p>
          @if ($product->discount)
            <p class="text-xxs whitespace-nowrap text-gray-400 line-through">
              {{ number_format($product->price) }} تومان</p>
          @endif
        </div>
      </div>
      <div class="{{ $isBlockStyle ? '' : 'block sm:hidden' }}">
        <div class="flex justify-center items-center w-full h-full">
          <a href="{{ route('product', ['product' => $product->slug]) }}"
            class="group/arrowlink flex justify-start items-center text-xs ml-0 {{ $isBlockStyle ? 'llg:ml-4' : 'xs:ml-4' }}">
            <span
              class="ml-0 {{ $isBlockStyle ? 'llg:ml-2' : 'xs:ml-2' }} text-gray-400 group-hover/arrowlink:text-primary transition-all duration-150">بیشتر
              ببینید</span>
            <svg height="18" width="18" version="1.1"
              class="hidden {{ $isBlockStyle ? 'llg:block' : 'xs:block' }} group-hover/arrowlink:-translate-x-2 fill-gray-400 group-hover/arrowlink:fill-primary transition-all duration-150"
              xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 330 330"
              xml:space="preserve">
              <path id="XMLID_308_" d="M315,150H105V90c0-6.067-3.655-11.537-9.26-13.858c-5.606-2.322-12.058-1.038-16.347,3.252l-75,75
 c-5.858,5.858-5.858,15.355,0,21.213l75,75c2.87,2.87,6.705,4.394,10.61,4.394c1.932,0,3.881-0.374,5.737-1.142
 c5.605-2.322,9.26-7.791,9.26-13.858v-60h210c8.284,0,15-6.716,15-15C330,156.716,323.284,150,315,150z M75,203.787L36.213,165
 L75,126.213V203.787z" />
            </svg>
          </a>
        </div>
      </div>
      <div class="{{ $isBlockStyle ? 'hidden' : 'hidden sm:block' }}">
        <p class="hidden lg:block text-gray-400 text-xs max-w-96 leading-normal mt-2">
          {{ mb_strimwidth(strip_tags($product->description), 0, 160, '...') }}
        </p>
        <p class="block lg:hidden text-gray-400 text-xs max-w-96 leading-normal mt-2">
          {{ mb_strimwidth(strip_tags($product->description), 0, 100, '...') }}
        </p>
        <div class="text-end">
          <a href="{{ route('product', ['product' => $product->slug]) }}"
            class="inline-block text-base {{ $isBlockStyle ? 'llg:text-sm' : 'xs:text-sm' }} text-end text-primary">بیشتر
            ببینید</a>
        </div>
      </div>
    </div>
