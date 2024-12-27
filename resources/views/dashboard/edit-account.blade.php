<x-dashboard-layout header="ویرایش حساب">
  @vite(['resources/js/colorPicker.js', 'resources/js/uploadAvatar.js'])
  @vite('resources/css/croppie.css')
  <form action="/user/edit" method="POST" id="main-form" class="sm:grid flex flex-col grid-cols-5 w-full gap-6 mb-8"
    enctype="multipart/form-data">
    @csrf
    @method('put')
    <x-modal header="آپــلود تــصویــر" modal="upload-avatar">
      <div class="relative z-0">
        <div id="upload-box">
          <input type="file" accept="image/*" name="avatar" id="avatar" class="hidden">
          <input type="hidden" name="base64_image" id="base64-image">

          <label for="avatar"
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
        <button type="button" id="boxes-toggler"
          class="absolute top-3 left-3 flex justify-center items-center p-[10px] border-[1px] border-dashed rounded-full border-gray-400 fill-gray-400 hover:fill-primary text-gray-400 hover:text-primary hover:border-primary hover:border-solid transition-all duration-200">
          <label for="toggle-boxes" class="absolute w-full h-full opacity-0 cursor-pointer z-50"></label>
          <svg id="open-theme-box-icon" class="w-5 h-5 opacity-100 visible" height="18" width="18" version="1.1"
            id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
            viewBox="0 0 324.99 324.99" xml:space="preserve">
            <g>
              <path
                d="M307.6,129.885c-11.453-11.447-23.783-16.778-38.805-16.778c-6.189,0-12.056,0.858-17.729,1.688c-5.094,0.745-9.905,1.449-14.453,1.45c-8.27,0-14.197-2.397-19.82-8.017c-10.107-10.101-8.545-20.758-6.569-34.25c2.357-16.096,5.291-36.127-15.101-56.508C183.578,5.932,167.848,0.081,148.372,0.081c-37.296,0-78.367,21.546-99.662,42.829C17.398,74.205,0.1,115.758,0,159.917c-0.1,44.168,17.018,85.656,48.199,116.82c31.077,31.061,72.452,48.168,116.504,48.171c0.005,0,0.007,0,0.013,0c44.315,0,86.02-17.289,117.428-48.681c17.236-17.226,32.142-44.229,38.9-70.471C329.291,173.738,324.517,146.793,307.6,129.885z M309.424,202.764c-6.16,23.915-20.197,49.42-35.763,64.976c-29.145,29.129-67.833,45.17-108.946,45.169c-0.002,0-0.009,0-0.011,0c-40.849-0.003-79.211-15.863-108.023-44.659C27.777,239.36,11.908,200.896,12,159.944c0.092-40.962,16.142-79.512,45.191-108.545c19.071-19.061,57.508-39.317,91.18-39.317c16.18,0,29.056,4.669,38.269,13.877c16.127,16.118,13.981,30.769,11.71,46.28c-2.067,14.116-4.41,30.115,9.96,44.478c7.871,7.866,16.864,11.529,28.304,11.528c5.421-0.001,10.895-0.802,16.189-1.576c5.248-0.768,10.676-1.562,15.992-1.562c7.938,0,18.557,1.508,30.322,13.267C317.724,156.971,313.562,186.699,309.424,202.764z" />
              <path
                d="M142.002,43.531c-1.109,0-2.233,0.065-3.342,0.192c-15.859,1.824-27.33,16.199-25.571,32.042c1.613,14.631,13.93,25.665,28.647,25.665c1.105,0,2.226-0.065,3.332-0.191c15.851-1.823,27.326-16.191,25.581-32.031C169.032,54.57,156.716,43.531,142.002,43.531z M143.7,89.317c-0.652,0.075-1.313,0.113-1.963,0.113c-8.59,0-15.778-6.441-16.721-14.985c-1.032-9.296,5.704-17.729,15.016-18.8c0.655-0.075,1.317-0.114,1.971-0.114c8.587,0,15.775,6.446,16.72,14.993C159.747,79.816,153.006,88.247,143.7,89.317z" />
              <path
                d="M102.997,113.64c-1.72-7.512-6.261-13.898-12.784-17.984c-4.597-2.881-9.889-4.404-15.304-4.404c-10.051,0-19.254,5.079-24.618,13.587c-4.14,6.566-5.472,14.34-3.75,21.888c1.715,7.52,6.261,13.92,12.799,18.018c4.596,2.88,9.888,4.402,15.303,4.402c10.051,0,19.255-5.078,24.624-13.593C103.401,128.975,104.726,121.193,102.997,113.64zM89.111,129.16c-3.153,5.001-8.563,7.986-14.469,7.986c-3.158,0-6.246-0.889-8.93-2.57c-3.817-2.393-6.471-6.128-7.472-10.518c-1.008-4.417-0.227-8.97,2.2-12.819c3.153-5.001,8.562-7.987,14.468-7.987c3.158,0,6.246,0.89,8.933,2.573c3.806,2.384,6.454,6.11,7.458,10.493C92.312,120.743,91.534,125.306,89.111,129.16z" />
              <path
                d="M70.131,173.25c-3.275,0-6.516,0.557-9.63,1.654c-15.055,5.301-23.05,21.849-17.821,36.892c4.032,11.579,14.984,19.358,27.254,19.358c3.276,0,6.517-0.556,9.637-1.652c15.065-5.301,23.053-21.854,17.806-36.896C93.346,181.029,82.397,173.25,70.131,173.25z M75.589,218.182c-1.836,0.646-3.738,0.973-5.655,0.973c-7.168,0-13.566-4.543-15.921-11.302c-3.063-8.814,1.636-18.518,10.476-21.63c1.83-0.645,3.729-0.973,5.643-0.973c7.165,0,13.56,4.542,15.914,11.304C89.12,205.37,84.429,215.072,75.589,218.182z" />
              <path
                d="M140.817,229.415c-3.071-1.066-6.266-1.606-9.496-1.606c-12.307,0-23.328,7.804-27.431,19.429c-2.566,7.317-2.131,15.185,1.229,22.151c3.349,6.943,9.204,12.163,16.486,14.696c3.075,1.071,6.274,1.614,9.51,1.614c12.3,0,23.314-7.811,27.409-19.439c2.574-7.31,2.143-15.175-1.216-22.145C153.958,237.165,148.103,231.945,140.817,229.415zM147.206,262.275c-2.407,6.834-8.873,11.425-16.091,11.425c-1.888,0-3.759-0.318-5.563-0.947c-4.253-1.48-7.67-4.524-9.623-8.575c-1.965-4.074-2.219-8.68-0.718-12.957c2.408-6.825,8.883-11.411,16.11-11.411c1.888,0,3.759,0.317,5.561,0.942c4.248,1.475,7.663,4.52,9.616,8.573C148.46,253.399,148.711,257.998,147.206,262.275z" />
              <path
                d="M212.332,213.811c-5.466,0-10.81,1.55-15.448,4.479c-13.525,8.521-17.652,26.427-9.193,39.927c5.315,8.445,14.463,13.488,24.469,13.488c5.458,0,10.796-1.545,15.434-4.464c13.541-8.507,17.663-26.419,9.19-39.926C231.486,218.86,222.345,213.811,212.332,213.811z M221.205,257.082c-2.725,1.715-5.853,2.622-9.045,2.622c-5.857,0-11.207-2.946-14.307-7.87c-4.947-7.896-2.513-18.39,5.433-23.395c2.724-1.72,5.852-2.629,9.047-2.629c5.854,0,11.192,2.944,14.283,7.878C231.577,241.597,229.151,252.09,221.205,257.082z" />
              <path
                d="M255.384,141.998c-1.06-0.117-2.134-0.176-3.194-0.176c-14.772,0-27.174,11.068-28.846,25.747c-0.876,7.698,1.297,15.266,6.118,21.311c4.812,6.03,11.686,9.821,19.369,10.676c1.053,0.114,2.12,0.173,3.175,0.173c14.754,0,27.164-11.067,28.869-25.748c0.886-7.688-1.277-15.247-6.091-21.288C269.97,146.651,263.082,142.853,255.384,141.998zM268.955,172.602c-1.001,8.624-8.287,15.127-16.948,15.127c-0.621,0-1.251-0.034-1.86-0.101c-4.48-0.498-8.494-2.712-11.303-6.231c-2.819-3.534-4.089-7.963-3.575-12.47c0.98-8.611,8.255-15.104,16.922-15.104c0.623,0,1.256,0.035,1.875,0.104c4.498,0.499,8.523,2.717,11.334,6.244C268.209,163.697,269.472,168.114,268.955,172.602z" />
            </g>
          </svg>
          <svg id="close-theme-box-icon" class="absolute w-5 h-5 opacity-0 invisible" xmlns="http://www.w3.org/2000/svg"
            width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
          </svg>
        </button>

        <input type="checkbox" id="toggle-boxes" class="peer hidden">

        <div
          class="flex flex-col justify-center items-center p-4 visible opacity-100 peer-checked:invisible peer-checked:opacity-0 transition-all duration-200"
          id="user-details-box">
          <a href="javascript:void(0)" data-modal="upload-avatar"
            class="open-modal-menu block group relative rounded-full w-24 h-24 overflow-hidden">
            <img src="{{ route('user-avatar', ['user' => $user->id]) }}" id="avatar-image" alt="avatar" class="w-24 h-24 mb-2">
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
            @error('avatar')
              <p class="text-center text-red-600 text-sm my-1">{{ $message }}</p>
            @enderror
            <p class="text-slate-800 dark:text-slate-200 font-semibold">
              {{ $user->name() }}
            </p>
            <p class="text-xs text-gray-400">{{ $user->email }}</p>
          </div>
          <div class="py-4">
            <button class="bubbly-button">ذخیره
              تغییرات</button>
          </div>
        </div>
        <div
          class="absolute flex justify-center h-full overflow-hidden invisible opacity-0 peer-checked:visible peer-checked:opacity-100 transition-all duration-200"
          id="personalization-box">
          <div class="flex flex-col justify-center items-center h-full text-center py-4">
            <p class="text-start text-gray-400 text-sm mb-2">رنگ مورد نظر خود را انتخاب کنید:</p>
            <div class="grid grid-cols-[repeat(6,28px)] grid-rows-[repeat(3,28px)] gap-[6px]" id="swatch-grid">
              <button type="button" value="default"
                class="relative rounded-md bg-default block dark:hidden swatch border-2 hover:border-gray-500 border-gray-400 default:border-gray-500 transition-all duration-150">
                <span
                  class="invisible opacity-0 default:visible default:opacity-100 absolute top-0 left-0 flex justify-center items-center h-full w-full bg-slate-200/30 text-black transition-all duration-150">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"></polyline>
                  </svg>
                </span>
              </button>
              <button type="button" value="default-light"
                class="relative rounded-md bg-default-light hidden dark:block swatch border-2 hover:border-gray-500 border-gray-400 default-light:border-gray-500 transition-all duration-150">
                <span
                  class="invisible opacity-0 default-light:visible default-light:opacity-100 absolute top-0 left-0 flex justify-center items-center h-full w-full bg-slate-200/30 text-black transition-all duration-150">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"></polyline>
                  </svg>
                </span>
              </button>
              <button type="button" value="sea"
                class="relative rounded-md bg-sea swatch border-2 hover:border-gray-500 border-gray-400 sea:border-gray-500 transition-all duration-150">
                <span
                  class="invisible opacity-0 sea:visible sea:opacity-100 absolute top-0 left-0 flex justify-center items-center h-full w-full bg-slate-200/30 text-black transition-all duration-150">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"></polyline>
                  </svg>
                </span>
              </button>
              <button type="button" value="aquamarine"
                class="relative rounded-md bg-aquamarine swatch border-2 hover:border-gray-500 border-gray-400 aquamarine:border-gray-500 transition-all duration-150">
                <span
                  class="invisible opacity-0 aquamarine:visible aquamarine:opacity-100 absolute top-0 left-0 flex justify-center items-center h-full w-full bg-slate-200/30 text-black transition-all duration-150">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"></polyline>
                  </svg>
                </span>
              </button>
              <button type="button" value="purpley"
                class="relative rounded-md bg-purpley swatch border-2 hover:border-gray-500 border-gray-400 purpley:border-gray-500 transition-all duration-150">
                <span
                  class="invisible opacity-0 purpley:visible purpley:opacity-100 absolute top-0 left-0 flex justify-center items-center h-full w-full bg-slate-200/30 text-black transition-all duration-150">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"></polyline>
                  </svg>
                </span>
              </button>
              <button type="button" value="livery"
                class="relative rounded-md bg-livery swatch border-2 hover:border-gray-500 border-gray-400 livery:border-gray-500 transition-all duration-150">
                <span
                  class="invisible opacity-0 livery:visible livery:opacity-100 absolute top-0 left-0 flex justify-center items-center h-full w-full bg-slate-200/30 text-black transition-all duration-150">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"></polyline>
                  </svg>
                </span>
              </button>
              <button type="button" value="majorelle-blue"
                class="relative rounded-md bg-majorelle-blue swatch border-2 hover:border-gray-500 border-gray-400 majorelle-blue:border-gray-500 transition-all duration-150">
                <span
                  class="invisible opacity-0 majorelle-blue:visible majorelle-blue:opacity-100 absolute top-0 left-0 flex justify-center items-center h-full w-full bg-slate-200/30 text-black transition-all duration-150">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"></polyline>
                  </svg>
                </span>
              </button>
              <button type="button" value="muddy"
                class="relative rounded-md bg-muddy swatch border-2 hover:border-gray-500 border-gray-400 muddy:border-gray-500 transition-all duration-150">
                <span
                  class="invisible opacity-0 muddy:visible muddy:opacity-100 absolute top-0 left-0 flex justify-center items-center h-full w-full bg-slate-200/30 text-black transition-all duration-150">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"></polyline>
                  </svg>
                </span>
              </button>
              <button type="button" value="greeny"
                class="relative rounded-md bg-greeny swatch border-2 hover:border-gray-500 border-gray-400 greeny:border-gray-500 transition-all duration-150">
                <span
                  class="invisible opacity-0 greeny:visible greeny:opacity-100 absolute top-0 left-0 flex justify-center items-center h-full w-full bg-slate-200/30 text-black transition-all duration-150">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"></polyline>
                  </svg>
                </span>
              </button>
              <button type="button" value="sandy"
                class="relative rounded-md bg-sandy swatch border-2 hover:border-gray-500 border-gray-400 sandy:border-gray-500 transition-all duration-150">
                <span
                  class="invisible opacity-0 sandy:visible sandy:opacity-100 absolute top-0 left-0 flex justify-center items-center h-full w-full bg-slate-200/30 text-black transition-all duration-150">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"></polyline>
                  </svg>
                </span>
              </button>
              <button type="button" value="grown"
                class="relative rounded-md bg-grown swatch border-2 hover:border-gray-500 border-gray-400 grown:border-gray-500 transition-all duration-150">
                <span
                  class="invisible opacity-0 grown:visible grown:opacity-100 absolute top-0 left-0 flex justify-center items-center h-full w-full bg-slate-200/30 text-black transition-all duration-150">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"></polyline>
                  </svg>
                </span>
              </button>
              <button type="button" value="beige"
                class="relative rounded-md bg-beige swatch border-2 hover:border-gray-500 border-gray-400 beige:border-gray-500 transition-all duration-150">
                <span
                  class="invisible opacity-0 beige:visible beige:opacity-100 absolute top-0 left-0 flex justify-center items-center h-full w-full bg-slate-200/30 text-black transition-all duration-150">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"></polyline>
                  </svg>
                </span>
              </button>
              <button type="button" value="gold"
                class="relative rounded-md bg-gold swatch border-2 hover:border-gray-500 border-gray-400 gold:border-gray-500 transition-all duration-150">
                <span
                  class="invisible opacity-0 gold:visible gold:opacity-100 absolute top-0 left-0 flex justify-center items-center h-full w-full bg-slate-200/30 text-black transition-all duration-150">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"></polyline>
                  </svg>
                </span>
              </button>
              <button type="button" value="orangey"
                class="relative rounded-md bg-orangey swatch border-2 hover:border-gray-500 border-gray-400 orangey:border-gray-500 transition-all duration-150">
                <span
                  class="invisible opacity-0 orangey:visible orangey:opacity-100 absolute top-0 left-0 flex justify-center items-center h-full w-full bg-slate-200/30 text-black transition-all duration-150">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"></polyline>
                  </svg>
                </span>
              </button>
              <button type="button" value="tawny"
                class="relative rounded-md bg-tawny swatch border-2 hover:border-gray-500 border-gray-400 tawny:border-gray-500 transition-all duration-150">
                <span
                  class="invisible opacity-0 tawny:visible tawny:opacity-100 absolute top-0 left-0 flex justify-center items-center h-full w-full bg-slate-200/30 text-black transition-all duration-150">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"></polyline>
                  </svg>
                </span>
              </button>
              <button type="button" value="redy"
                class="relative rounded-md bg-redy swatch border-2 hover:border-gray-500 border-gray-400 redy:border-gray-500 transition-all duration-150">
                <span
                  class="invisible opacity-0 redy:visible redy:opacity-100 absolute top-0 left-0 flex justify-center items-center h-full w-full bg-slate-200/30 text-black transition-all duration-150">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"></polyline>
                  </svg>
                </span>
              </button>
              <button type="button" value="withered-purple"
                class="relative rounded-md bg-withered-purple swatch border-2 hover:border-gray-500 border-gray-400 withered-purple:border-gray-500 transition-all duration-150">
                <span
                  class="invisible opacity-0 withered-purple:visible withered-purple:opacity-100 absolute top-0 left-0 flex justify-center items-center h-full w-full bg-slate-200/30 text-black transition-all duration-150">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"></polyline>
                  </svg>
                </span>
              </button>
              <button type="button" value="pinky"
                class="relative rounded-md bg-pinky swatch border-2 hover:border-gray-500 border-gray-400 pinky:border-gray-500 transition-all duration-150">
                <span
                  class="invisible opacity-0 pinky:visible pinky:opacity-100 absolute top-0 left-0 flex justify-center items-center h-full w-full bg-slate-200/30 text-black transition-all duration-150">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"></polyline>
                  </svg>
                </span>
              </button>
              <button type="button" value="black"
                class="relative rounded-md bg-black swatch border-2 hover:border-gray-500 border-gray-400 black:border-gray-500 transition-all duration-150">
                <span
                  class="invisible opacity-0 black:visible black:opacity-100 absolute top-0 left-0 flex justify-center items-center h-full w-full bg-slate-50/5 text-white transition-all duration-150">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"></polyline>
                  </svg>
                </span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="flex flex-col col-span-3 gap-6">
      <div
        class="flex flex-col justify-start bg-white dark:bg-slate-800 rounded-sm hover:drop-shadow-xl w-full transition-all duration-300">
        <div class="flex flex-col justify-start bg-slate-50 dark:bg-slate-700/40 border-b-[1px] border-b-gray-400/50">
          <div class="flex justify-between items-center p-4 py-3">
            <p class="text-sm text-gray-500 font-extrabold">جزئــیات حــساب کاربــری</p>
            <a href="/dashboard/" class="group/arrowlink flex justify-start items-center text-xs ml-0 xs:ml-4">
              <span
                class="ml-2 text-gray-400 group-hover/arrowlink:text-primary transition-all duration-150">بازگشت</span>
              <svg height="18" width="18" version="1.1"
                class="group-hover/arrowlink:-translate-x-2 fill-gray-400 group-hover/arrowlink:fill-primary transition-all duration-150"
                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 330 330"
                xml:space="preserve">
                <path id="XMLID_308_"
                  d="M315,150H105V90c0-6.067-3.655-11.537-9.26-13.858c-5.606-2.322-12.058-1.038-16.347,3.252l-75,75c-5.858,5.858-5.858,15.355,0,21.213l75,75c2.87,2.87,6.705,4.394,10.61,4.394c1.932,0,3.881-0.374,5.737-1.142c5.605-2.322,9.26-7.791,9.26-13.858v-60h210c8.284,0,15-6.716,15-15C330,156.716,323.284,150,315,150z M75,203.787L36.213,165L75,126.213V203.787z" />
              </svg>
            </a>
          </div>
        </div>
        <div class="flex sm:flex-row flex-col p-4 py-6 relative overflow-hidden">
          <div class="sm:w-1/2 w-full">
            <div class="pe-4">
              <div class="flex justify-between">
                <label for="f_name"
                  class="block text-right text-sm text-slate-600 dark:text-gray-400 mb-1 font-semibold">نام</label>
                @error('f_name')
                  <p class="text-xs text-red-600">{{ $message }}</p>
                @enderror
              </div>
              <div class="relative text-right w-full">
                <input type="text" autocomplete="off" name="f_name" id="f_name"
                  value="{{ old('f_name') ?? $user->f_name }}"
                  class="peer outline-none rounded-sm @error('f_name') border-red-600 @else dark:border-gray-700 focus:dark:border-gray-300 border-gray-300 hover:border-gray-400 focus:border-gray-700 @enderror dark:bg-slate-800 dark:text-slate-200 border-[1px] w-full py-1 pe-2 ps-2 transition-all duration-200">
              </div>
            </div>
            <div class="mt-4 pe-4">
              <div class="flex justify-between">
                <label for="email"
                  class="block text-right text-sm text-slate-600 dark:text-gray-400 mb-1 font-semibold">ایمیل</label>
                @error('email')
                  <p class="text-xs text-red-600">{{ $message }}</p>
                @enderror
              </div>
              <div class="relative text-right w-full">
                <input type="email" autocomplete="off" name="email" id="email"
                  value="{{ old('email') ?? $user->email }}"
                  class="peer outline-none rounded-sm @error('email') border-red-600 @else dark:border-gray-700 focus:dark:border-gray-300 border-gray-300 hover:border-gray-400 focus:border-gray-700 @enderror dark:bg-slate-800 dark:text-slate-200 border-[1px] w-full py-1 pe-2 ps-2 transition-all duration-200">
              </div>
            </div>
          </div>
          <div class="sm:w-1/2 w-full">
            <div class="pe-4">
              <div class="flex justify-between">
                <label for="l_name"
                  class="block text-right text-sm text-slate-600 dark:text-gray-400 mb-1 font-semibold">نام
                  خانوادگی</label>
                @error('l_name')
                  <p class="text-xs text-red-600">{{ $message }}</p>
                @enderror
              </div>
              <div class="relative text-right w-full">
                <input type="text" autocomplete="off" name="l_name" id="l_name"
                  value="{{ old('l_name') ?? $user->l_name }}"
                  class="peer outline-none rounded-sm @error('l_name') border-red-600 @else dark:border-gray-700 focus:dark:border-gray-300 border-gray-300 hover:border-gray-400 focus:border-gray-700 @enderror dark:bg-slate-800 dark:text-slate-200 border-[1px] w-full py-1 pe-2 ps-2 transition-all duration-200">
              </div>
            </div>
            <div class="mt-4 pe-4">
              <div class="flex justify-between">
                <label for="phone"
                  class="block text-right text-sm text-slate-600 dark:text-gray-400 mb-1 font-semibold">تلفن
                  همراه</label>
                @error('phone')
                  <p class="text-xs text-red-600">{{ $message }}</p>
                @enderror
              </div>
              <div class="relative text-right w-full">
                <input type="text" autocomplete="off" name="phone" id="phone"
                  value="{{ old('phone') ?? $user->phone }}"
                  class="peer outline-none rounded-sm @error('phone') border-red-600 @else dark:border-gray-700 focus:dark:border-gray-300 border-gray-300 hover:border-gray-400 focus:border-gray-700 @enderror dark:bg-slate-800 dark:text-slate-200 border-[1px] w-full py-1 pe-2 ps-2 transition-all duration-200">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div
        class="flex flex-col justify-start bg-white dark:bg-slate-800 rounded-sm hover:drop-shadow-xl w-full transition-all duration-300">
        <div class="flex flex-col justify-start bg-slate-50 dark:bg-slate-700/40 border-b-[1px] border-b-gray-400/50">
          <div class="flex justify-start items-center p-4 py-5">
            <p class="text-sm text-gray-500 font-extrabold">آدرس شــما</p>
          </div>
        </div>
        <div class="flex sm:flex-row flex-col p-4 py-6">
          <div class="sm:w-1/2 w-full">
            <div class="pe-4">
              <div class="flex justify-between">
                <label for="province"
                  class="block text-right text-sm text-slate-600 dark:text-gray-400 mb-1 font-semibold">استان</label>
                @error('province')
                  <p class="text-xs text-red-600">{{ $message }}</p>
                @enderror
              </div>
              <div class="relative text-right w-full">
                <input type="text" autocomplete="off" name="province" id="province"
                  value="{{ old('province') ?? $user->province }}"
                  class="peer outline-none rounded-sm @error('province') border-red-600 @else dark:border-gray-700 focus:dark:border-gray-300 border-gray-300 hover:border-gray-400 focus:border-gray-700 @enderror dark:bg-slate-800 dark:text-slate-200 border-[1px] w-full py-1 pe-2 ps-2 transition-all duration-200">
              </div>
            </div>
            <div class="mt-4 pe-4">
              <div class="flex justify-between">
                <label for="street"
                  class="block text-right text-sm text-slate-600 dark:text-gray-400 mb-1 font-semibold">خیابان</label>
                @error('street')
                  <p class="text-xs text-red-600">{{ $message }}</p>
                @enderror
              </div>
              <div class="relative text-right w-full">
                <input type="text" autocomplete="off" name="street" id="street"
                  value="{{ old('street') ?? $user->street }}"
                  class="peer outline-none rounded-sm @error('street') border-red-600 @else dark:border-gray-700 focus:dark:border-gray-300 border-gray-300 hover:border-gray-400 focus:border-gray-700 @enderror dark:bg-slate-800 dark:text-slate-200 border-[1px] w-full py-1 pe-2 ps-2 transition-all duration-200">
              </div>
            </div>
            <div class="mt-4 pe-4">
              <div class="flex justify-between">
                <label for="plaque"
                  class="block text-right text-sm text-slate-600 dark:text-gray-400 mb-1 font-semibold">پلاک</label>
                @error('plaque')
                  <p class="text-xs text-red-600">{{ $message }}</p>
                @enderror
              </div>
              <div class="relative text-right w-full">
                <input type="text" autocomplete="off" name="plaque" id="plaque"
                  value="{{ old('plaque') ?? $user->plaque }}"
                  class="peer outline-none rounded-sm @error('plaque') border-red-600 @else dark:border-gray-700 focus:dark:border-gray-300 border-gray-300 hover:border-gray-400 focus:border-gray-700 @enderror dark:bg-slate-800 dark:text-slate-200 border-[1px] w-full py-1 pe-2 ps-2 transition-all duration-200">
              </div>
            </div>
          </div>
          <div class="sm:w-1/2 w-full">
            <div class="pe-4">
              <div class="flex justify-between">
                <label for="city"
                  class="block text-right text-sm text-slate-600 dark:text-gray-400 mb-1 font-semibold">شهر</label>
                @error('city')
                  <p class="text-xs text-red-600">{{ $message }}</p>
                @enderror
              </div>
              <div class="relative text-right w-full">
                <input type="text" autocomplete="off" name="city" id="city"
                  value="{{ old('city') ?? $user->city }}"
                  class="peer outline-none rounded-sm @error('city') border-red-600 @else dark:border-gray-700 focus:dark:border-gray-300 border-gray-300 hover:border-gray-400 focus:border-gray-700 @enderror dark:bg-slate-800 dark:text-slate-200 border-[1px] w-full py-1 pe-2 ps-2 transition-all duration-200">
              </div>
            </div>
            <div class="mt-4 pe-4">
              <div class="flex justify-between">
                <label for="alley"
                  class="block text-right text-sm text-slate-600 dark:text-gray-400 mb-1 font-semibold">کوچه</label>
                @error('alley')
                  <p class="text-xs text-red-600">{{ $message }}</p>
                @enderror
              </div>
              <div class="relative text-right w-full">
                <input type="text" autocomplete="off" name="alley" id="alley"
                  value="{{ old('alley') ?? $user->alley }}"
                  class="peer outline-none rounded-sm @error('alley') border-red-600 @else dark:border-gray-700 focus:dark:border-gray-300 border-gray-300 hover:border-gray-400 focus:border-gray-700 @enderror dark:bg-slate-800 dark:text-slate-200 border-[1px] w-full py-1 pe-2 ps-2 transition-all duration-200">
              </div>
            </div>
            <div class="mt-4 pe-4">
              <div class="flex justify-between">
                <label for="post_code"
                  class="block text-right text-sm text-slate-600 dark:text-gray-400 mb-1 font-semibold">کد
                  پستی</label>
                @error('post_code')
                  <p class="text-xs text-red-600">{{ $message }}</p>
                @enderror
              </div>
              <div class="relative text-right w-full">
                <input type="text" autocomplete="off" name="post_code" id="post_code"
                  value="{{ old('post_code') ?? $user->post_code }}"
                  class="peer outline-none rounded-sm @error('post_code') border-red-600 @else dark:border-gray-700 focus:dark:border-gray-300 border-gray-300 hover:border-gray-400 focus:border-gray-700 @enderror dark:bg-slate-800 dark:text-slate-200 border-[1px] w-full py-1 pe-2 ps-2 transition-all duration-200">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</x-dashboard-layout>
