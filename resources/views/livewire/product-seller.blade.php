<div
  class="group relative overflow-hidden flex llg:flex-row flex-col justify-between items-center gap-8 lg:gap-0 w-full my-2 py-8 px-8 bg-white dark:bg-slate-700 border-[1px] border-slate-400/50 rounded-sm hover:shadow-lg dark:hover:shadow-primary dark:hover:shadow-sm transition-all duration-500">
  @if ($product->discount)
    <span class="absolute top-2 right-2 w-16 h-16 z-10">
      <svg class="fill-white" height="20" width="20" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
        xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 209.281 209.281" xml:space="preserve">
        <g>
          <path d="M207.17,99.424l-20.683-21.377l4.168-29.455c0.567-4.006-2.145-7.739-6.131-8.438l-29.298-5.137L141.285,8.739
c-1.896-3.575-6.287-4.998-9.919-3.223L104.64,18.582L77.916,5.517c-3.636-1.777-8.023-0.351-9.92,3.223L54.055,35.018
l-29.298,5.137c-3.985,0.698-6.698,4.432-6.131,8.438l4.167,29.455L2.11,99.424c-2.813,2.907-2.813,7.522,0,10.43l20.682,21.378
l-4.167,29.456c-0.566,4.005,2.146,7.738,6.13,8.438l29.299,5.14l13.942,26.275c1.896,3.574,6.284,5,9.919,3.223l26.724-13.062
l26.727,13.062c1.059,0.518,2.181,0.763,3.288,0.763c2.691,0,5.286-1.454,6.63-3.986l13.942-26.275l29.299-5.14
c3.984-0.699,6.697-4.433,6.13-8.438l-4.168-29.456l20.684-21.378C209.984,106.946,209.984,102.332,207.17,99.424z
M173.158,123.438c-1.608,1.662-2.359,3.975-2.035,6.266l3.665,25.902l-25.764,4.52c-2.278,0.4-4.245,1.829-5.329,3.872
l-12.26,23.105l-23.502-11.486c-1.039-0.508-2.166-0.762-3.294-0.762c-1.127,0-2.254,0.254-3.293,0.762l-23.5,11.486l-12.26-23.105
c-1.084-2.043-3.051-3.472-5.329-3.872l-25.764-4.52l3.664-25.902c0.324-2.29-0.427-4.603-2.036-6.265l-18.186-18.799
l18.186-18.797c1.608-1.662,2.36-3.975,2.036-6.265l-3.664-25.901l25.763-4.517c2.279-0.399,4.246-1.829,5.331-3.872l12.259-23.108
l23.499,11.489c2.078,1.017,4.508,1.017,6.588,0l23.501-11.489l12.26,23.108c1.084,2.043,3.051,3.473,5.33,3.872l25.763,4.517
l-3.665,25.901c-0.324,2.291,0.427,4.603,2.036,6.266l18.186,18.796L173.158,123.438z" />
          <path d="M80.819,98.979c10.014,0,18.16-8.146,18.16-18.158c0-10.016-8.146-18.164-18.16-18.164
c-10.015,0-18.162,8.148-18.162,18.164C62.657,90.834,70.805,98.979,80.819,98.979z M80.819,74.657c3.397,0,6.16,2.765,6.16,6.164
c0,3.396-2.764,6.158-6.16,6.158c-3.398,0-6.162-2.763-6.162-6.158C74.657,77.422,77.421,74.657,80.819,74.657z" />
          <path d="M140.867,68.414c-2.342-2.343-6.143-2.344-8.484,0l-63.968,63.967c-2.343,2.343-2.343,6.142,0,8.485
c1.172,1.172,2.707,1.757,4.243,1.757c1.535,0,3.071-0.586,4.243-1.757l63.967-63.967C143.21,74.556,143.21,70.757,140.867,68.414z
" />
          <path d="M128.46,110.301c-10.013,0-18.158,8.146-18.158,18.158c0,10.016,8.146,18.164,18.158,18.164
c10.016,0,18.164-8.148,18.164-18.164C146.624,118.447,138.476,110.301,128.46,110.301z M128.46,134.624
c-3.395,0-6.158-2.765-6.158-6.164c0-3.395,2.763-6.158,6.158-6.158c3.398,0,6.164,2.763,6.164,6.158
C134.624,131.858,131.859,134.624,128.46,134.624z" />
        </g>
      </svg>
    </span>
    <div
      class="absolute top-0 right-0 translate-x-1/2 -translate-y-1/2 bg-primary shadow-2xl shadow-transparent dark:shadow-primary w-20 h-20 rotate-45">
    </div>
  @endif
  <button type="button" wire:click="delete_product('{{ $product->slug }}')" wire:loading.attr="disabled"
    wire:target="delete_product"
    class="absolute left-8 lg:-left-8 group-hover:left-8 top-4 text-gray-400 dark:text-slate-400 hover:text-redy transition-all duration-300">
    <svg wire:loading.remove.block wire:target="delete_product" xmlns="http://www.w3.org/2000/svg" width="18"
      height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
      stroke-linejoin="round" class="feather feather-trash-2">
      <polyline points="3 6 5 6 21 6"></polyline>
      <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
      <line x1="10" y1="11" x2="10" y2="17"></line>
      <line x1="14" y1="11" x2="14" y2="17"></line>
    </svg>
    <div wire:loading.block wire:target="delete_product"
      class="h-[18px] w-[18px] animate-spin rounded-full border-4 border-solid border-current border-e-transparent align-[-0.125em] text-redy motion-reduce:animate-[spin_1.5s_linear_infinite]"
      role="status">
      <span
        class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">صبر
        کنید...</span>
    </div>
  </button>
  <a href="{{ route('edit-product', ['product' => $product->slug]) }}"
    class="absolute left-16 lg:-left-8 group-hover:left-16 top-4 fill-gray-400 dark:fill-slate-400 hover:fill-primary transition-all duration-300 group-hover:delay-0 delay-150">
    <svg width="18" height="18" viewBox="0 0 494.936 494.936" stroke="currentColor" stroke-width="2"
      stroke-linecap="round" stroke-linejoin="round">
      <g>
        <g>
          <path d="M389.844,182.85c-6.743,0-12.21,5.467-12.21,12.21v222.968c0,23.562-19.174,42.735-42.736,42.735H67.157
               c-23.562,0-42.736-19.174-42.736-42.735V150.285c0-23.562,19.174-42.735,42.736-42.735h267.741c6.743,0,12.21-5.467,12.21-12.21
               s-5.467-12.21-12.21-12.21H67.157C30.126,83.13,0,113.255,0,150.285v267.743c0,37.029,30.126,67.155,67.157,67.155h267.741
               c37.03,0,67.156-30.126,67.156-67.155V195.061C402.054,188.318,396.587,182.85,389.844,182.85z" />
          <path d="M483.876,20.791c-14.72-14.72-38.669-14.714-53.377,0L221.352,229.944c-0.28,0.28-3.434,3.559-4.251,5.396l-28.963,65.069
               c-2.057,4.619-1.056,10.027,2.521,13.6c2.337,2.336,5.461,3.576,8.639,3.576c1.675,0,3.362-0.346,4.96-1.057l65.07-28.963
               c1.83-0.815,5.114-3.97,5.396-4.25L483.876,74.169c7.131-7.131,11.06-16.61,11.06-26.692
               C494.936,37.396,491.007,27.915,483.876,20.791z M466.61,56.897L257.457,266.05c-0.035,0.036-0.055,0.078-0.089,0.107
               l-33.989,15.131L238.51,247.3c0.03-0.036,0.071-0.055,0.107-0.09L447.765,38.058c5.038-5.039,13.819-5.033,18.846,0.005
               c2.518,2.51,3.905,5.855,3.905,9.414C470.516,51.036,469.127,54.38,466.61,56.897z" />
        </g>
      </g>
    </svg>
  </a>
  <div
    class="flex llg:flex-row llg:justify-start llg:text-right llg:gap-8 gap-2 w-full text-center flex-col justify-start items-center">
    <div class="w-20 h-20">
      <img src="{{ route('product-images', ['slug' => $product->slug]) }}" alt="product">
    </div>
    <div class="sm:w-auto w-full">
      <x-rate-star :rating="$product->avg_rate()" :total="$product->total_rates()" />
      <div class="flex sm:block w-full sm:w-auto justify-between items-center">
        <div class="text-right sm:text-center lg:text-right">
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
        <div class="flex sm:hidden justify-center items-center">
          <a href="{{ route('product', ['product' => $product->slug]) }}"
            class="flex justify-center items-center p-1 border border-primary rounded-full hover:bg-primary text-primary hover:text-white">
            <i class="fad fa-arrow-left w-5 h-5 text-sm"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="xl:flex hidden justify-end items-center w-full h-full">
    <a href="{{ route('product', ['product' => $product->slug]) }}"
      class="group/arrowlink flex justify-start items-center text-xs ml-0 llg:ml-4">
      <span class="ml-0 llg:ml-2 text-gray-400 group-hover/arrowlink:text-primary transition-all duration-150">بیشتر
        ببینید</span>
      <svg height="18" width="18" version="1.1"
        class="hidden llg:block group-hover/arrowlink:-translate-x-2 fill-gray-400 group-hover/arrowlink:fill-primary transition-all duration-150"
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
