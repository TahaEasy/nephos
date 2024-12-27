<x-dashboard-layout header="ویرایش کالا">
  <div>
    @vite('resources/js/uploadProductImage.js')
    @vite('resources/js/priceFormatter.js')
    @vite('resources/css/croppie.css')
    <form action="{{ route('update-product', ['slug' => $product->slug]) }}" method="POST" id="main-form"
      class="sm:grid flex flex-col grid-cols-5 w-full gap-6 mb-8" enctype="multipart/form-data">
      @csrf
      @method('put')
      <x-modal header="آپــلود تــصویــر" modal="upload-product-image">
        <div class="relative z-0">
          <div id="upload-box">
            <input type="file" accept="image/*" name="image" id="image" class="hidden">
            <input type="hidden" name="base64_image" id="base64-image">

            <label for="image"
              class="group flex justify-center items-center py-6 px-2 sm:px-28 w-full min-h-72 border-2 border-gray-400 border-dashed cursor-pointer">
              <div>
                <div class="croppie-container">
                  <img src="/img/illustrations/profile.svg" alt="upload-image" id="item"
                    class="w-64 h-32 opacity-45 grayscale group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-500">
                </div>
                <div>
                  <p class="text-center text-gray-400">برای آپلود تصویر</p>
                  <p class="text-center text-gray-400">اینجا را کلیک کنید.</p>
                </div>
              </div>
            </label>
          </div>
          <div id="setup-box" class="hidden w-full h-full">
            <div>
              <img src="" alt="preview" id="preview">
            </div>
            <div class="flex xs:flex-row flex-col justify-center items-center gap-4">
              <button id="destroy-image" type="button"
                class="block py-3 px-8 w-fit text-sm text-white bg-primary hover:bg-primary/80 hover:shadow-xl shadow-white rounded-full transition-all duration-300">تعویض
                تصویر</button>
              <button id="save-image" type="button"
                class="block py-3 px-8 w-fit text-sm text-white bg-submit hover:bg-submit/80 hover:shadow-xl shadow-white rounded-full transition-all duration-300">استفاده
                از
                تصویر</button>
            </div>
          </div>
        </div>
      </x-modal>
      <div class="col-span-2">
        <div
          class="relative flex flex-col justify-start items-center gap-4 bg-white dark:bg-slate-800 text-center rounded-sm hover:drop-shadow-xl w-full transition-all duration-300">
          <div class="flex flex-col justify-center items-center p-4 transition-all duration-200" id="user-details-box">
            <a href="javascript:void(0)" data-modal="upload-product-image"
              class="open-modal-menu block group relative w-24 h-24 overflow-hidden">
              <img src="{{ route('product-images', ['slug' => $product->slug]) }}" id="product-image"
                alt="product-image" class="w-24 h-24 mb-2">
              <div
                class="absolute top-0 right-0 flex justify-center items-center text-primary w-full h-full opacity-0 group-hover:opacity-100 bg-slate-200/40 transition-all duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="feather feather-plus upload-icon" aria-hidden="true">
                  <line x1="12" y1="5" x2="12" y2="19"></line>
                  <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
              </div>
            </a>
            <div class="my-1">
              @error('image')
                <p class="text-center text-red-600 text-sm my-1">{{ $message }}</p>
              @enderror
              <p class="text-xs text-gray-400">لطفا یک عکس انتخاب کنید</p>
            </div>
            <div class="py-4">
              <button class="bubbly-button">ثبت تغییرات</button>
            </div>
          </div>
        </div>
        <div
          class="relative mt-4 pb-4 bg-white dark:bg-slate-800 text-center rounded-sm hover:drop-shadow-xl w-full transition-all duration-300">
          <div class="flex flex-col justify-start bg-slate-50 dark:bg-slate-700/40 border-b-[1px] border-b-gray-400/50">
            <div class="flex justify-between items-center p-4 py-3">
              <p class="text-sm text-gray-500 font-extrabold">اعمال تخفیف</p>
            </div>
          </div>
          <div class="flex justify-center w-full">
            <div class="px-4 mt-4">
              <div class="flex justify-between">
                <label for="discount"
                  class="block text-right text-sm text-slate-600 dark:text-gray-400 mb-1 font-semibold">درصد
                  تخفیف</label>
              </div>
              <div class="relative text-right w-full">
                <input type="number" min="0" max="100" name="discount" id="discount"
                  value="{{ old('discount') ?? $product->discount }}"
                  class="peer outline-none rounded-sm @error('discount') border-red-600 @else dark:border-gray-700 focus:dark:border-gray-300 border-gray-300 hover:border-gray-400 focus:border-gray-700 @enderror dark:bg-slate-800 dark:text-slate-200 border-[1px] w-52 py-1 pe-2 ps-2 transition-all duration-200">
              </div>
              @error('discount')
                <div class="mt-2">
                  <p class="text-xs text-red-600">{{ $message }}</p>
                </div>
              @enderror
            </div>
          </div>
        </div>
      </div>
      <div class="flex flex-col col-span-3 gap-6">
        <div
          class="flex flex-col justify-start bg-white dark:bg-slate-800 rounded-sm hover:drop-shadow-xl w-full transition-all duration-300">
          <div class="flex flex-col justify-start bg-slate-50 dark:bg-slate-700/40 border-b-[1px] border-b-gray-400/50">
            <div class="flex justify-between items-center p-4 py-3">
              <p class="text-sm text-gray-500 font-extrabold">اطلاعات محصول</p>
              <a href="{{ route('create-product') }}"
                class="group/arrowlink flex justify-start items-center text-xs ml-0 xs:ml-4">
                <span
                  class="ml-2 text-gray-400 group-hover/arrowlink:text-primary transition-all duration-150">بازگشت</span>
                <svg height="18" width="18" version="1.1"
                  class="group-hover/arrowlink:-translate-x-2 fill-gray-400 group-hover/arrowlink:fill-primary transition-all duration-150"
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
          <div class="flex sm:flex-row flex-col gap-4 sm:gap-0 p-4 py-6 relative overflow-hidden">
            <div class="sm:w-1/2 w-full">
              <div class="pe-4">
                <div class="flex justify-between">
                  <label for="name"
                    class="block text-right text-sm text-slate-600 dark:text-gray-400 mb-1 font-semibold">نام
                    محصول</label>
                  @error('name')
                    <p class="text-xs text-red-600">{{ $message }}</p>
                  @enderror
                </div>
                <div class="relative text-right w-full">
                  <input type="text" autocomplete="off" name="name" id="name"
                    value="{{ old('name') ?? $product->name }}"
                    class="peer outline-none rounded-sm @error('name') border-red-600 @else dark:border-gray-700 focus:dark:border-gray-300 border-gray-300 hover:border-gray-400 focus:border-gray-700 @enderror dark:bg-slate-800 dark:text-slate-200 border-[1px] w-full py-1 pe-2 ps-2 transition-all duration-200">
                </div>
              </div>
            </div>
            <div class="sm:w-1/2 w-full">
              <div>
                <div class="flex justify-between">
                  <label for="price"
                    class="block text-right text-sm text-slate-600 dark:text-gray-400 mb-1 font-semibold">قیمت
                    محصول</label>
                  @error('price')
                    <p class="text-xs text-red-600">{{ $message }}</p>
                  @enderror
                </div>
                <div class="relative text-right w-full">
                  <input type="number" step="500" name="price" id="price"
                    value="{{ old('price') ?? $product->price }}"
                    class="peer outline-none rounded-sm @error('price') border-red-600 @else dark:border-gray-700 focus:dark:border-gray-300 border-gray-300 hover:border-gray-400 focus:border-gray-700 @enderror dark:bg-slate-800 dark:text-slate-200 border-[1px] w-full py-1 pe-2 ps-2 transition-all duration-200">
                </div>
                <p class="mt-1 text-xs text-gray-400 font-bold" id="currency-output"></p>
              </div>
            </div>
          </div>
          <div class="px-4">
            <div class="flex justify-between">
              <label for="description"
                class="block text-right text-sm text-slate-600 dark:text-gray-400 mb-1 font-semibold">توضیحات
                محصول</label>
              @error('description')
                <p class="text-xs text-red-600">{{ $message }}</p>
              @enderror
            </div>
            <div class="relative text-right w-full">
              <textarea name="description" id="description" rows="6"
                class="w-full resize-none text-sm peer outline-none rounded-sm @error('description') border-red-600 @else dark:border-gray-700 focus:dark:border-gray-300 border-gray-300 hover:border-gray-400 focus:border-gray-700 @enderror dark:bg-slate-800 dark:text-slate-200 border-[1px] py-1 pe-2 ps-2 transition-all duration-200">{{ old('description') ?? $product->description }}</textarea>
            </div>
          </div>
          <div class="px-4 mt-2">
            <div class="flex justify-between mb-2">
              <p class="block text-right text-sm text-slate-600 dark:text-gray-400 mb-1 font-semibold">دسته بندی
                محصول</p>
              @error('category')
                <p class="text-xs text-red-600">{{ $message }}</p>
              @enderror
            </div>
            <div class="flex justify-around items-center flex-wrap">
              <div class="relative flex flex-col justify-center items-center mx-2 mb-2">
                <input type="radio" name="category" id="category-house" value="house"
                  @if (old('category') == 'house' || $product->category == 'house') checked @endif
                  class="peer opacity-0 absolute top-0 left-0 w-full h-full cursor-pointer">
                <span
                  class="hidden fill-gray-400 peer-hover:fill-primary peer-checked:fill-primary peer-focus:fill-primary transition-all duration-200">
                </span>
                <x-product-logo type='house'
                  class="fill-gray-400 peer-hover:fill-primary peer-checked:fill-primary peer-focus:fill-primary transition-all duration-200" />
                <p
                  class="text-xs text-gray-400 mt-2 peer-hover:text-primary peer-checked:text-primary transition-all duration-200">
                  منزل</p>
              </div>
              <div class="relative flex flex-col justify-center items-center mx-2 mb-2">
                <input type="radio" name="category" id="category-office" value="office"
                  @if (old('category') == 'office' || $product->category == 'office') checked @endif
                  class="peer opacity-0 absolute top-0 left-0 w-full h-full cursor-pointer">
                <span
                  class="hidden fill-gray-400 peer-hover:fill-primary peer-checked:fill-primary peer-focus:fill-primary transition-all duration-200">
                </span>
                <x-product-logo type='office'
                  class="fill-gray-400 peer-hover:fill-primary peer-checked:fill-primary peer-focus:fill-primary transition-all duration-200" />
                <p
                  class="text-xs text-gray-400 mt-2 peer-hover:text-primary peer-checked:text-primary transition-all duration-200">
                  محل کار</p>
              </div>
              <div class="relative flex flex-col justify-center items-center mx-2 mb-2">
                <input type="radio" name="category" id="category-kids" value="kids"
                  @if (old('category') == 'kids' || $product->category == 'kids') checked @endif
                  class="peer opacity-0 absolute top-0 left-0 w-full h-full cursor-pointer">
                <span
                  class="hidden fill-gray-400 peer-hover:fill-primary peer-checked:fill-primary peer-focus:fill-primary transition-all duration-200">
                </span>
                <x-product-logo type='kids'
                  class="fill-gray-400 peer-hover:fill-primary peer-checked:fill-primary peer-focus:fill-primary transition-all duration-200" />
                <p
                  class="text-xs text-gray-400 mt-2 peer-hover:text-primary peer-checked:text-primary transition-all duration-200">
                  کودکان</p>
              </div>
              <div class="relative flex flex-col justify-center items-center mx-2 mb-2">
                <input type="radio" name="category" id="category-kitchen" value="kitchen"
                  @if (old('category') == 'kitchen' || $product->category == 'kitchen') checked @endif
                  class="peer opacity-0 absolute top-0 left-0 w-full h-full cursor-pointer">
                <span
                  class="hidden fill-gray-400 peer-hover:fill-primary peer-checked:fill-primary peer-focus:fill-primary transition-all duration-200">
                </span>
                <x-product-logo type='kitchen'
                  class="fill-gray-400 peer-hover:fill-primary peer-checked:fill-primary peer-focus:fill-primary transition-all duration-200" />
                <p
                  class="text-xs text-gray-400 mt-2 peer-hover:text-primary peer-checked:text-primary transition-all duration-200">
                  آشپزخانه</p>
              </div>
              <div class="relative flex flex-col justify-center items-center mx-2 mb-2">
                <input type="radio" name="category" id="category-accessories" value="accessories"
                  @if (old('category') == 'accessories' || $product->category == 'accessories') checked @endif
                  class="peer opacity-0 absolute top-0 left-0 w-full h-full cursor-pointer">
                <span
                  class="hidden fill-gray-400 peer-hover:fill-primary peer-checked:fill-primary peer-focus:fill-primary transition-all duration-200">
                </span>
                <x-product-logo type='accessories'
                  class="fill-gray-400 peer-hover:fill-primary peer-checked:fill-primary peer-focus:fill-primary transition-all duration-200" />
                <p
                  class="text-xs text-gray-400 mt-2 peer-hover:text-primary peer-checked:text-primary transition-all duration-200">
                  لوازم جانبی</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</x-dashboard-layout>
