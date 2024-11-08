<x-app-layout>  

  <x-navigation class="border-b dark:border-blue-700/20" />
  {{-- Boxed line --}}
  <svg class="pointer-events-none z-10 absolute -inset-px h-full w-full stroke-black/10 dark:stroke-white/10 stroke-[4] [mask-image:radial-gradient(white,transparent_70%)] [stroke-dasharray:5_6] [stroke-dashoffset:10]">
    <defs>
        <pattern id="grid-pattern-215" viewBox="0 0 64 64" width="64" height="64" patternUnits="userSpaceOnUse" x="0" y="0">
            <path d="M64 0H0V64" fill="none"></path>
        </pattern>
    </defs>
    <rect width="100%" height="100%" stroke-width="0" fill="url(#grid-pattern-215)"></rect>
</svg>

  <div class="bg-white dark:bg-gray-900">
    <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-blue-500 selection:text-white">
        <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
            
            <main class="mt-6">
                <div   class="relative overflow-hidden bg-primary pt-[120px] md:pt-[130px] ">
                    <div class="container">
                      <div class="-mx-4 flex flex-wrap items-center">
                        <div class="w-full px-4">
                          <div class=" mx-auto max-w-5xl text-center" style="visibility: visible; animation-delay: 0.2s;">
                            <h1 class="mb-6 text-3xl font-extrabold font-manrope font-black leading-snug text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-pink-600 to-purple-600 sm:text-4xl lg:text-6xl  lg:leading-[1.2]">
                              Open-Source 
      
                              Livewire
                               
                               <span class="bg-gradient-to-r from-blue-600 p-1 mx-2   to-purple-600  bg-no-repeat bg-bottom text-white">Chat   </span> <br>
                               Package
                                for Laravel
                          </h1>
                          
                          <p class="mx-auto mb-9 max-w-[600px] text-base font-medium dark:text-white sm:text-lg sm:leading-[1.44]">
                            Skip the hassle of building chat from scratch—install our package and add real-time chat to your Laravel app in minutes.
                        </p>
                        
                            <ul class="mb-10 flex flex-wrap items-center justify-center gap-5">
                              <li>
                                <a href="{{route('docs')}}" class="inline-flex items-center justify-center rounded-md bg-white dark:bg-transparent  border border-blue-500 dark:border-blue-700  px-7 py-[14px] text-center text-base font-medium text-dark dark:text/80 shadow-1 transition duration-300 ease-in-out hover:bg-gray-2 hover:text-body-color">
                                  Documentation
                                </a>
                              </li>
                              <li>
                                <a href="https://github.com/namumakwembo/wirechat" target="_blank" class="flex items-center gap-4 rounded-md px-6 py-[14px] text-base font-medium dark:text-white transition duration-300 ease-in-out  bg-gray-200 dark:bg-white/[0.12] dark:hover:bg-gray-600 dark:hover:text-dark">
                                  <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_2005_10818)">
                                      <path d="M12 0.674805C5.625 0.674805 0.375 5.8498 0.375 12.2998C0.375 17.3998 3.7125 21.7498 8.3625 23.3248C8.9625 23.4373 9.15 23.0623 9.15 22.7998C9.15 22.5373 9.15 21.7873 9.1125 20.7748C5.8875 21.5248 5.2125 19.1998 5.2125 19.1998C4.6875 17.8873 3.9 17.5123 3.9 17.5123C2.85 16.7623 3.9375 16.7623 3.9375 16.7623C5.1 16.7998 5.7375 17.9623 5.7375 17.9623C6.75 19.7623 8.475 19.2373 9.1125 18.8998C9.225 18.1498 9.525 17.6248 9.8625 17.3248C7.3125 17.0623 4.575 16.0498 4.575 11.6248C4.575 10.3498 5.0625 9.3373 5.775 8.5498C5.6625 8.2873 5.25 7.0873 5.8875 5.4748C5.8875 5.4748 6.9 5.1748 9.1125 6.6748C10.05 6.4123 11.025 6.2623 12.0375 6.2623C13.05 6.2623 14.0625 6.3748 14.9625 6.6748C17.175 5.2123 18.15 5.4748 18.15 5.4748C18.7875 7.0498 18.4125 8.2873 18.2625 8.5498C19.0125 9.3373 19.4625 10.3873 19.4625 11.6248C19.4625 16.0498 16.725 17.0623 14.175 17.3248C14.5875 17.6998 14.9625 18.4498 14.9625 19.4998C14.9625 21.0748 14.925 22.3123 14.925 22.6873C14.925 22.9873 15.15 23.3248 15.7125 23.2123C20.2875 21.6748 23.625 17.3623 23.625 12.2248C23.5875 5.8498 18.375 0.674805 12 0.674805Z"></path>
                                    </g>
                                    <defs>
                                      <clipPath id="clip0_2005_10818">
                                        <rect width="24" height="24"></rect>
                                      </clipPath>
                                    </defs>
                                  </svg>
                                  Star on Github
                                </a>
                              </li>
                            </ul>
                            <div>
                              <p class="mb-4 text-center text-base font-medium text-white">
                                Built with latest technology
                              </p>
                              <div class=" flex items-center justify-center gap-4 text-center" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s;">
                               
                                {{-- alpine.js --}}
                                <a href="https://alpinejs.dev/" class=" duration-300 ease-in-out hover:text-white" target="_blank">
                                  <svg class="w-12 h-12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 128"><path fill="#77c1d2" fill-rule="evenodd" d="M98.444 35.562 126 62.997 98.444 90.432 70.889 62.997z" clip-rule="evenodd"/><path fill="#2d3441" fill-rule="evenodd" d="m29.556 35.562 57.126 56.876H31.571L2 62.997z" clip-rule="evenodd"/></svg>
                                </a>

                                {{-- Tailwind --}}
                                <a href="https://tailwindcss.com/" class="  duration-300 ease-in-out hover:text-white" target="_blank">
                                  <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 128"><path d="M64.004 25.602c-17.067 0-27.73 8.53-32 25.597 6.398-8.531 13.867-11.73 22.398-9.597 4.871 1.214 8.352 4.746 12.207 8.66C72.883 56.629 80.145 64 96.004 64c17.066 0 27.73-8.531 32-25.602-6.399 8.536-13.867 11.735-22.399 9.602-4.87-1.215-8.347-4.746-12.207-8.66-6.27-6.367-13.53-13.738-29.394-13.738zM32.004 64c-17.066 0-27.73 8.531-32 25.602C6.402 81.066 13.87 77.867 22.402 80c4.871 1.215 8.352 4.746 12.207 8.66 6.274 6.367 13.536 13.738 29.395 13.738 17.066 0 27.73-8.53 32-25.597-6.399 8.531-13.867 11.73-22.399 9.597-4.87-1.214-8.347-4.746-12.207-8.66C55.128 71.371 47.868 64 32.004 64zm0 0" fill="#38bdf8"/></svg>
                                </a>
              
                                {{-- Laravel --}}
                                <a href="https://laravel.com/" class="duration-300 ease-in-out hover:text-white" target="_blank">
                                  <svg class="h-8 w-8" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="128px" height="133px" viewBox="0 0 128 128" version="1.1">
                                    <g id="surface1">
                                    <path style=" stroke:none;fill-rule:nonzero;fill:rgb(94.117647%,32.54902%,25.098039%);fill-opacity:1;" d="M 26.027344 0.136719 C 25.824219 0.214844 20.085938 3.484375 13.28125 7.394531 C 5.035156 12.136719 0.800781 14.632812 0.574219 14.867188 C 0.394531 15.070312 0.191406 15.421875 0.128906 15.644531 C -0.0429688 16.21875 -0.0546875 100.347656 0.117188 100.953125 C 0.179688 101.1875 0.382812 101.53125 0.566406 101.722656 C 1.011719 102.191406 50.238281 130.496094 50.835938 130.632812 C 51.113281 130.699219 51.425781 130.6875 51.734375 130.601562 C 52.40625 130.433594 101.503906 102.191406 101.941406 101.730469 C 102.121094 101.53125 102.324219 101.1875 102.390625 100.953125 C 102.476562 100.675781 102.507812 96.277344 102.507812 87.015625 L 102.507812 73.480469 L 114.476562 66.605469 C 125.761719 60.117188 126.453125 59.710938 126.742188 59.265625 L 127.039062 58.785156 L 127.039062 44.207031 C 127.039062 28.335938 127.070312 29.230469 126.441406 28.65625 C 126.273438 28.507812 120.523438 25.152344 113.652344 21.195312 L 101.171875 14.015625 L 99.785156 14.015625 L 87.574219 21.027344 C 80.851562 24.894531 75.136719 28.199219 74.859375 28.378906 C 74.582031 28.5625 74.25 28.902344 74.113281 29.148438 L 73.867188 29.574219 L 73.8125 43.308594 L 73.761719 57.046875 L 63.679688 62.855469 C 58.132812 66.042969 53.515625 68.683594 53.417969 68.707031 C 53.238281 68.757812 53.226562 67.449219 53.226562 42.203125 L 53.226562 15.632812 L 52.960938 15.175781 C 52.628906 14.621094 54.121094 15.507812 39.136719 6.894531 C 26.570312 -0.332031 26.871094 -0.179688 26.027344 0.136719 Z M 37.578125 10.65625 C 42.835938 13.671875 47.136719 16.167969 47.136719 16.199219 C 47.136719 16.230469 42.527344 18.894531 36.894531 22.132812 L 26.644531 28.015625 L 16.414062 22.132812 C 10.792969 18.894531 6.1875 16.230469 6.1875 16.199219 C 6.1875 16.167969 10.785156 13.503906 16.40625 10.273438 L 26.613281 4.402344 L 27.316406 4.785156 C 27.710938 5 32.332031 7.640625 37.578125 10.65625 Z M 110.730469 24.191406 C 116.265625 27.378906 120.84375 30.011719 120.886719 30.054688 C 121.003906 30.160156 100.703125 41.828125 100.425781 41.816406 C 100.148438 41.808594 80.097656 30.246094 80.105469 30.105469 C 80.117188 29.945312 100.289062 18.339844 100.492188 18.371094 C 100.585938 18.394531 105.195312 21.015625 110.730469 24.191406 Z M 14.828125 25.875 L 24.585938 31.492188 L 24.640625 59.304688 L 24.691406 87.121094 L 24.929688 87.496094 C 25.054688 87.695312 25.289062 87.964844 25.460938 88.089844 C 25.621094 88.207031 31.050781 91.300781 37.523438 94.953125 L 49.28125 101.59375 L 49.28125 113.359375 C 49.28125 119.816406 49.238281 125.113281 49.183594 125.113281 C 49.140625 125.113281 38.976562 119.296875 26.601562 112.175781 L 4.105469 99.238281 L 4.074219 59.464844 L 4.054688 19.703125 L 4.554688 19.980469 C 4.84375 20.132812 9.460938 22.785156 14.828125 25.875 Z M 49.28125 45.453125 L 49.28125 71.082031 L 48.886719 71.339844 C 48.351562 71.679688 28.8125 82.910156 28.746094 82.910156 C 28.714844 82.910156 28.691406 71.339844 28.691406 57.195312 L 28.703125 31.492188 L 38.910156 25.621094 C 44.523438 22.390625 49.152344 19.769531 49.207031 19.789062 C 49.246094 19.8125 49.28125 31.363281 49.28125 45.453125 Z M 88.222656 39.558594 L 98.453125 45.441406 L 98.453125 57.101562 C 98.453125 68.164062 98.441406 68.757812 98.273438 68.695312 C 98.164062 68.652344 93.535156 66 87.980469 62.800781 L 77.867188 56.992188 L 77.867188 45.335938 C 77.867188 38.917969 77.898438 33.675781 77.929688 33.675781 C 77.972656 33.675781 82.601562 36.320312 88.222656 39.558594 Z M 123.09375 45.261719 C 123.09375 51.644531 123.050781 56.910156 123.007812 56.960938 C 122.933594 57.078125 102.699219 68.738281 102.570312 68.738281 C 102.539062 68.738281 102.507812 63.496094 102.507812 57.078125 L 102.507812 45.421875 L 112.714844 39.546875 C 118.335938 36.320312 122.964844 33.675781 123.007812 33.675781 C 123.0625 33.675781 123.09375 38.886719 123.09375 45.261719 Z M 86.230469 66.46875 C 94.835938 71.421875 96.320312 72.308594 96.171875 72.425781 C 96.074219 72.488281 92.8125 74.363281 88.929688 76.582031 C 85.046875 78.796875 74.988281 84.53125 66.570312 89.328125 L 51.273438 98.054688 L 50.785156 97.789062 C 47.863281 96.191406 30.910156 86.546875 30.910156 86.472656 C 30.902344 86.3125 75.765625 60.53125 75.945312 60.597656 C 76.03125 60.628906 80.660156 63.269531 86.230469 66.46875 Z M 98.433594 87.558594 L 98.398438 99.238281 L 75.914062 112.175781 C 63.542969 119.296875 53.375 125.113281 53.324219 125.113281 C 53.269531 125.113281 53.226562 120.359375 53.226562 113.359375 L 53.226562 101.59375 L 75.765625 88.742188 C 88.148438 81.675781 98.324219 75.890625 98.378906 75.878906 C 98.421875 75.878906 98.441406 81.132812 98.433594 87.558594 Z M 98.433594 87.558594 "/>
                                    </g>
                                  </svg>
                                </a>
                                
              
                                {{-- Livewire --}}
                                <a href="https://livewire.laravel.com" class="  duration-300 ease-in-out hover:text-white" target="_blank">
                                  <svg class="h-8 h-8" xmlns="http://www.w3.org/2000/svg"   viewBox="0 0 128 128"><path style="fill-rule:evenodd;fill:#fb70a9;fill-opacity:1" d="M108.566 83.547c-1.937 2.926-3.406 6.527-7.34 6.527-6.624 0-6.98-10.203-13.609-10.203-6.625 0-6.265 10.203-12.887 10.203-6.625 0-6.98-10.203-13.609-10.203-6.625 0-6.266 10.203-12.887 10.203-6.625 0-6.98-10.203-13.605-10.203-6.629 0-6.27 10.203-12.89 10.203-2.083 0-3.544-1.008-4.778-2.39-4.738-8.239-7.465-17.895-7.465-28.22 0-30.222 23.367-54.722 52.191-54.722 28.825 0 52.192 24.5 52.192 54.723 0 8.64-1.91 16.816-5.313 24.082Zm0 0"/><path style="fill-rule:evenodd;fill:#4e56a6;fill-opacity:1" d="M40.844 78.145v22.668c0 4.066-3.301 7.363-7.371 7.363a7.365 7.365 0 0 1-7.371-7.364V73.45c1.375-2.523 2.945-4.707 5.78-4.707 4.61 0 6.223 5.79 8.962 9.403Zm27.843 1.183v35.844a8.185 8.185 0 0 1-8.187 8.183c-4.523 0-8.191-3.664-8.191-8.183v-40.57c1.543-2.973 3.132-5.86 6.39-5.86 5.16 0 6.563 7.242 9.989 10.586Zm26.211-.66v26.023c0 4.067-3.3 7.364-7.37 7.364-4.071 0-7.372-3.297-7.372-7.364V72.707c1.281-2.195 2.809-3.965 5.364-3.965 4.84 0 6.375 6.38 9.378 9.926Zm0 0"/><path style="fill-rule:evenodd;fill:#000;fill-opacity:.298039" d="M40.844 85.094c-1.309-1.602-2.856-2.79-5.094-2.79-5.316 0-6.293 6.696-9.648 9.712V63.145a7.365 7.365 0 0 1 7.37-7.364c4.071 0 7.372 3.297 7.372 7.364Zm27.843.515c-1.394-1.855-3.023-3.304-5.496-3.304-5.914 0-6.457 8.285-10.882 10.578v-12.77c0-4.52 3.668-8.183 8.191-8.183a8.185 8.185 0 0 1 8.188 8.183Zm26.211-1.433c-1.136-1.117-2.48-1.871-4.265-1.871-5.73 0-6.418 7.777-10.477 10.343V66.734a7.371 7.371 0 0 1 14.742 0Zm0 0"/><path style="fill-rule:evenodd;fill:#fb70a9;fill-opacity:1" d="M108.566 83.547c-1.937 2.926-3.406 6.527-7.34 6.527-6.624 0-6.98-10.203-13.609-10.203-6.625 0-6.265 10.203-12.887 10.203-6.625 0-6.98-10.203-13.609-10.203-6.625 0-6.266 10.203-12.887 10.203-6.625 0-6.98-10.203-13.605-10.203-6.629 0-6.27 10.203-12.89 10.203-2.083 0-3.544-1.008-4.778-2.39-4.738-8.239-7.465-17.895-7.465-28.22 0-30.222 23.367-54.722 52.191-54.722 28.825 0 52.192 24.5 52.192 54.723 0 8.64-1.91 16.816-5.313 24.082Zm0 0"/><path style="fill-rule:evenodd;fill:#e24ca6;fill-opacity:1" d="M97.273 88.984c13.676-20.332 14.028-42.879 1.059-67.652 9.613 9.844 15.547 23.348 15.547 38.25 0 8.61-1.98 16.75-5.508 23.992-2.004 2.91-3.531 6.5-7.61 6.5a5.947 5.947 0 0 1-3.488-1.09Zm0 0"/><path style="fill-rule:evenodd;fill:#fff;fill-opacity:1" d="M58.89 73.117c18.15 0 25.79-10.52 25.79-25.46 0-14.942-11.547-28.692-25.79-28.692-14.245 0-25.792 13.75-25.792 28.691 0 14.942 7.64 25.461 25.793 25.461Zm0 0"/><path style="fill-rule:evenodd;fill:#030776;fill-opacity:1" d="M61.625 37.836c0 5.89-4.332 10.668-9.672 10.668-5.344 0-9.672-4.777-9.672-10.668 0-5.89 4.328-10.668 9.672-10.668 5.34 0 9.672 4.777 9.672 10.668Zm0 0"/><path style="fill-rule:evenodd;fill:#fff;fill-opacity:1" d="M55.176 35.375c0 2.719-2.164 4.922-4.836 4.922s-4.836-2.203-4.836-4.922 2.164-4.922 4.836-4.922 4.836 2.203 4.836 4.922Zm0 0"/></svg>
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
              
                        {{-- dots svg --}}
                        <div class="w-full px-4">
                          <div class="  mt-32 text-blue-700 relative z-10 mx-auto max-w-[845px]"  " style="visibility: visible; animation-delay: 0.25s;">
                            
                            <div class="absolute -left-9 bottom-0 z-[-1]  animate-pulse ">
                              <svg width="134" height="106" viewBox="0 0 134 106" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="1.66667" cy="104" r="1.66667" transform="rotate(-90 1.66667 104)"  ></circle>
                                <circle cx="16.3333" cy="104" r="1.66667" transform="rotate(-90 16.3333 104)"></circle>
                                <circle cx="31" cy="104" r="1.66667" transform="rotate(-90 31 104)"></circle>
                                <circle cx="45.6667" cy="104" r="1.66667" transform="rotate(-90 45.6667 104)"></circle>
                                <circle cx="60.3333" cy="104" r="1.66667" transform="rotate(-90 60.3333 104)"></circle>
                                <circle cx="88.6667" cy="104" r="1.66667" transform="rotate(-90 88.6667 104)"></circle>
                                <circle cx="117.667" cy="104" r="1.66667" transform="rotate(-90 117.667 104)"></circle>
                                <circle cx="74.6667" cy="104" r="1.66667" transform="rotate(-90 74.6667 104)"></circle>
                                <circle cx="103" cy="104" r="1.66667" transform="rotate(-90 103 104)"></circle>
                                <circle cx="132" cy="104" r="1.66667" transform="rotate(-90 132 104)"></circle>
                                <circle cx="1.66667" cy="89.3333" r="1.66667" transform="rotate(-90 1.66667 89.3333)"></circle>
                                <circle cx="16.3333" cy="89.3333" r="1.66667" transform="rotate(-90 16.3333 89.3333)"></circle>
                                <circle cx="31" cy="89.3333" r="1.66667" transform="rotate(-90 31 89.3333)"></circle>
                                <circle cx="45.6667" cy="89.3333" r="1.66667" transform="rotate(-90 45.6667 89.3333)"></circle>
                                <circle cx="60.3333" cy="89.3338" r="1.66667" transform="rotate(-90 60.3333 89.3338)"></circle>
                                <circle cx="88.6667" cy="89.3338" r="1.66667" transform="rotate(-90 88.6667 89.3338)"></circle>
                                <circle cx="117.667" cy="89.3338" r="1.66667" transform="rotate(-90 117.667 89.3338)"></circle>
                                <circle cx="74.6667" cy="89.3338" r="1.66667" transform="rotate(-90 74.6667 89.3338)"></circle>
                                <circle cx="103" cy="89.3338" r="1.66667" transform="rotate(-90 103 89.3338)"></circle>
                                <circle cx="132" cy="89.3338" r="1.66667" transform="rotate(-90 132 89.3338)"></circle>
                                <circle cx="1.66667" cy="74.6673" r="1.66667" transform="rotate(-90 1.66667 74.6673)"></circle>
                                <circle cx="1.66667" cy="31.0003" r="1.66667" transform="rotate(-90 1.66667 31.0003)"></circle>
                                <circle cx="16.3333" cy="74.6668" r="1.66667" transform="rotate(-90 16.3333 74.6668)"></circle>
                                <circle cx="16.3333" cy="31.0003" r="1.66667" transform="rotate(-90 16.3333 31.0003)"></circle>
                                <circle cx="31" cy="74.6668" r="1.66667" transform="rotate(-90 31 74.6668)"></circle>
                                <circle cx="31" cy="31.0003" r="1.66667" transform="rotate(-90 31 31.0003)"></circle>
                                <circle cx="45.6667" cy="74.6668" r="1.66667" transform="rotate(-90 45.6667 74.6668)"></circle>
                                <circle cx="45.6667" cy="31.0003" r="1.66667" transform="rotate(-90 45.6667 31.0003)"></circle>
                                <circle cx="60.3333" cy="74.6668" r="1.66667" transform="rotate(-90 60.3333 74.6668)"></circle>
                                <circle cx="60.3333" cy="31.0001" r="1.66667" transform="rotate(-90 60.3333 31.0001)"></circle>
                                <circle cx="88.6667" cy="74.6668" r="1.66667" transform="rotate(-90 88.6667 74.6668)"></circle>
                                <circle cx="88.6667" cy="31.0001" r="1.66667" transform="rotate(-90 88.6667 31.0001)"></circle>
                                <circle cx="117.667" cy="74.6668" r="1.66667" transform="rotate(-90 117.667 74.6668)"></circle>
                                <circle cx="117.667" cy="31.0001" r="1.66667" transform="rotate(-90 117.667 31.0001)"></circle>
                                <circle cx="74.6667" cy="74.6668" r="1.66667" transform="rotate(-90 74.6667 74.6668)"></circle>
                                <circle cx="74.6667" cy="31.0001" r="1.66667" transform="rotate(-90 74.6667 31.0001)"></circle>
                                <circle cx="103" cy="74.6668" r="1.66667" transform="rotate(-90 103 74.6668)"></circle>
                                <circle cx="103" cy="31.0001" r="1.66667" transform="rotate(-90 103 31.0001)"></circle>
                                <circle cx="132" cy="74.6668" r="1.66667" transform="rotate(-90 132 74.6668)"></circle>
                                <circle cx="132" cy="31.0001" r="1.66667" transform="rotate(-90 132 31.0001)"></circle>
                                <circle cx="1.66667" cy="60.0003" r="1.66667" transform="rotate(-90 1.66667 60.0003)"></circle>
                                <circle cx="1.66667" cy="16.3336" r="1.66667" transform="rotate(-90 1.66667 16.3336)"></circle>
                                <circle cx="16.3333" cy="60.0003" r="1.66667" transform="rotate(-90 16.3333 60.0003)"></circle>
                                <circle cx="16.3333" cy="16.3336" r="1.66667" transform="rotate(-90 16.3333 16.3336)"></circle>
                                <circle cx="31" cy="60.0003" r="1.66667" transform="rotate(-90 31 60.0003)"></circle>
                                <circle cx="31" cy="16.3336" r="1.66667" transform="rotate(-90 31 16.3336)"></circle>
                                <circle cx="45.6667" cy="60.0003" r="1.66667" transform="rotate(-90 45.6667 60.0003)"></circle>
                                <circle cx="45.6667" cy="16.3336" r="1.66667" transform="rotate(-90 45.6667 16.3336)"></circle>
                                <circle cx="60.3333" cy="60.0003" r="1.66667" transform="rotate(-90 60.3333 60.0003)"></circle>
                                <circle cx="60.3333" cy="16.3336" r="1.66667" transform="rotate(-90 60.3333 16.3336)"></circle>
                                <circle cx="88.6667" cy="60.0003" r="1.66667" transform="rotate(-90 88.6667 60.0003)"></circle>
                                <circle cx="88.6667" cy="16.3336" r="1.66667" transform="rotate(-90 88.6667 16.3336)"></circle>
                                <circle cx="117.667" cy="60.0003" r="1.66667" transform="rotate(-90 117.667 60.0003)"></circle>
                                <circle cx="117.667" cy="16.3336" r="1.66667" transform="rotate(-90 117.667 16.3336)"></circle>
                                <circle cx="74.6667" cy="60.0003" r="1.66667" transform="rotate(-90 74.6667 60.0003)"></circle>
                                <circle cx="74.6667" cy="16.3336" r="1.66667" transform="rotate(-90 74.6667 16.3336)"></circle>
                                <circle cx="103" cy="60.0003" r="1.66667" transform="rotate(-90 103 60.0003)"></circle>
                                <circle cx="103" cy="16.3336" r="1.66667" transform="rotate(-90 103 16.3336)"></circle>
                                <circle cx="132" cy="60.0003" r="1.66667" transform="rotate(-90 132 60.0003)"></circle>
                                <circle cx="132" cy="16.3336" r="1.66667" transform="rotate(-90 132 16.3336)"></circle>
                                <circle cx="1.66667" cy="45.3336" r="1.66667" transform="rotate(-90 1.66667 45.3336)"></circle>
                                <circle cx="1.66667" cy="1.66683" r="1.66667" transform="rotate(-90 1.66667 1.66683)"></circle>
                                <circle cx="16.3333" cy="45.3336" r="1.66667" transform="rotate(-90 16.3333 45.3336)"></circle>
                                <circle cx="16.3333" cy="1.66683" r="1.66667" transform="rotate(-90 16.3333 1.66683)"></circle>
                                <circle cx="31" cy="45.3336" r="1.66667" transform="rotate(-90 31 45.3336)"></circle>
                                <circle cx="31" cy="1.66683" r="1.66667" transform="rotate(-90 31 1.66683)"></circle>
                                <circle cx="45.6667" cy="45.3336" r="1.66667" transform="rotate(-90 45.6667 45.3336)"></circle>
                                <circle cx="45.6667" cy="1.66683" r="1.66667" transform="rotate(-90 45.6667 1.66683)"></circle>
                                <circle cx="60.3333" cy="45.3338" r="1.66667" transform="rotate(-90 60.3333 45.3338)"></circle>
                                <circle cx="60.3333" cy="1.66707" r="1.66667" transform="rotate(-90 60.3333 1.66707)"></circle>
                                <circle cx="88.6667" cy="45.3338" r="1.66667" transform="rotate(-90 88.6667 45.3338)"></circle>
                                <circle cx="88.6667" cy="1.66707" r="1.66667" transform="rotate(-90 88.6667 1.66707)"></circle>
                                <circle cx="117.667" cy="45.3338" r="1.66667" transform="rotate(-90 117.667 45.3338)"></circle>
                                <circle cx="117.667" cy="1.66707" r="1.66667" transform="rotate(-90 117.667 1.66707)"></circle>
                                <circle cx="74.6667" cy="45.3338" r="1.66667" transform="rotate(-90 74.6667 45.3338)"></circle>
                                <circle cx="74.6667" cy="1.66707" r="1.66667" transform="rotate(-90 74.6667 1.66707)"></circle>
                                <circle cx="103" cy="45.3338" r="1.66667" transform="rotate(-90 103 45.3338)"></circle>
                                <circle cx="103" cy="1.66707" r="1.66667" transform="rotate(-90 103 1.66707)"></circle>
                                <circle cx="132" cy="45.3338" r="1.66667" transform="rotate(-90 132 45.3338)"></circle>
                                <circle cx="132" cy="1.66707" r="1.66667" transform="rotate(-90 132 1.66707)"></circle>
                              </svg>
                            </div>
                            <div class="absolute   -right-6 -top-6 z-[-1]">
                              <svg width="134" height="106" viewBox="0 0 134 106" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="1.66667" cy="104" r="1.66667" transform="rotate(-90 1.66667 104)"></circle>
                                <circle cx="16.3333" cy="104" r="1.66667" transform="rotate(-90 16.3333 104)"></circle>
                                <circle cx="31" cy="104" r="1.66667" transform="rotate(-90 31 104)"></circle>
                                <circle cx="45.6667" cy="104" r="1.66667" transform="rotate(-90 45.6667 104)"></circle>
                                <circle cx="60.3333" cy="104" r="1.66667" transform="rotate(-90 60.3333 104)"></circle>
                                <circle cx="88.6667" cy="104" r="1.66667" transform="rotate(-90 88.6667 104)"></circle>
                                <circle cx="117.667" cy="104" r="1.66667" transform="rotate(-90 117.667 104)"></circle>
                                <circle cx="74.6667" cy="104" r="1.66667" transform="rotate(-90 74.6667 104)"></circle>
                                <circle cx="103" cy="104" r="1.66667" transform="rotate(-90 103 104)"></circle>
                                <circle cx="132" cy="104" r="1.66667" transform="rotate(-90 132 104)"></circle>
                                <circle cx="1.66667" cy="89.3333" r="1.66667" transform="rotate(-90 1.66667 89.3333)"></circle>
                                <circle cx="16.3333" cy="89.3333" r="1.66667" transform="rotate(-90 16.3333 89.3333)"></circle>
                                <circle cx="31" cy="89.3333" r="1.66667" transform="rotate(-90 31 89.3333)"></circle>
                                <circle cx="45.6667" cy="89.3333" r="1.66667" transform="rotate(-90 45.6667 89.3333)"></circle>
                                <circle cx="60.3333" cy="89.3338" r="1.66667" transform="rotate(-90 60.3333 89.3338)"></circle>
                                <circle cx="88.6667" cy="89.3338" r="1.66667" transform="rotate(-90 88.6667 89.3338)"></circle>
                                <circle cx="117.667" cy="89.3338" r="1.66667" transform="rotate(-90 117.667 89.3338)"></circle>
                                <circle cx="74.6667" cy="89.3338" r="1.66667" transform="rotate(-90 74.6667 89.3338)"></circle>
                                <circle cx="103" cy="89.3338" r="1.66667" transform="rotate(-90 103 89.3338)"></circle>
                                <circle cx="132" cy="89.3338" r="1.66667" transform="rotate(-90 132 89.3338)"></circle>
                                <circle cx="1.66667" cy="74.6673" r="1.66667" transform="rotate(-90 1.66667 74.6673)"></circle>
                                <circle cx="1.66667" cy="31.0003" r="1.66667" transform="rotate(-90 1.66667 31.0003)"></circle>
                                <circle cx="16.3333" cy="74.6668" r="1.66667" transform="rotate(-90 16.3333 74.6668)"></circle>
                                <circle cx="16.3333" cy="31.0003" r="1.66667" transform="rotate(-90 16.3333 31.0003)"></circle>
                                <circle cx="31" cy="74.6668" r="1.66667" transform="rotate(-90 31 74.6668)"></circle>
                                <circle cx="31" cy="31.0003" r="1.66667" transform="rotate(-90 31 31.0003)"></circle>
                                <circle cx="45.6667" cy="74.6668" r="1.66667" transform="rotate(-90 45.6667 74.6668)"></circle>
                                <circle cx="45.6667" cy="31.0003" r="1.66667" transform="rotate(-90 45.6667 31.0003)"></circle>
                                <circle cx="60.3333" cy="74.6668" r="1.66667" transform="rotate(-90 60.3333 74.6668)"></circle>
                                <circle cx="60.3333" cy="31.0001" r="1.66667" transform="rotate(-90 60.3333 31.0001)"></circle>
                                <circle cx="88.6667" cy="74.6668" r="1.66667" transform="rotate(-90 88.6667 74.6668)"></circle>
                                <circle cx="88.6667" cy="31.0001" r="1.66667" transform="rotate(-90 88.6667 31.0001)"></circle>
                                <circle cx="117.667" cy="74.6668" r="1.66667" transform="rotate(-90 117.667 74.6668)"></circle>
                                <circle cx="117.667" cy="31.0001" r="1.66667" transform="rotate(-90 117.667 31.0001)"></circle>
                                <circle cx="74.6667" cy="74.6668" r="1.66667" transform="rotate(-90 74.6667 74.6668)"></circle>
                                <circle cx="74.6667" cy="31.0001" r="1.66667" transform="rotate(-90 74.6667 31.0001)"></circle>
                                <circle cx="103" cy="74.6668" r="1.66667" transform="rotate(-90 103 74.6668)"></circle>
                                <circle cx="103" cy="31.0001" r="1.66667" transform="rotate(-90 103 31.0001)"></circle>
                                <circle cx="132" cy="74.6668" r="1.66667" transform="rotate(-90 132 74.6668)"></circle>
                                <circle cx="132" cy="31.0001" r="1.66667" transform="rotate(-90 132 31.0001)"></circle>
                                <circle cx="1.66667" cy="60.0003" r="1.66667" transform="rotate(-90 1.66667 60.0003)"></circle>
                                <circle cx="1.66667" cy="16.3336" r="1.66667" transform="rotate(-90 1.66667 16.3336)"></circle>
                                <circle cx="16.3333" cy="60.0003" r="1.66667" transform="rotate(-90 16.3333 60.0003)"></circle>
                                <circle cx="16.3333" cy="16.3336" r="1.66667" transform="rotate(-90 16.3333 16.3336)"></circle>
                                <circle cx="31" cy="60.0003" r="1.66667" transform="rotate(-90 31 60.0003)"></circle>
                                <circle cx="31" cy="16.3336" r="1.66667" transform="rotate(-90 31 16.3336)"></circle>
                                <circle cx="45.6667" cy="60.0003" r="1.66667" transform="rotate(-90 45.6667 60.0003)"></circle>
                                <circle cx="45.6667" cy="16.3336" r="1.66667" transform="rotate(-90 45.6667 16.3336)"></circle>
                                <circle cx="60.3333" cy="60.0003" r="1.66667" transform="rotate(-90 60.3333 60.0003)"></circle>
                                <circle cx="60.3333" cy="16.3336" r="1.66667" transform="rotate(-90 60.3333 16.3336)"></circle>
                                <circle cx="88.6667" cy="60.0003" r="1.66667" transform="rotate(-90 88.6667 60.0003)"></circle>
                                <circle cx="88.6667" cy="16.3336" r="1.66667" transform="rotate(-90 88.6667 16.3336)"></circle>
                                <circle cx="117.667" cy="60.0003" r="1.66667" transform="rotate(-90 117.667 60.0003)"></circle>
                                <circle cx="117.667" cy="16.3336" r="1.66667" transform="rotate(-90 117.667 16.3336)"></circle>
                                <circle cx="74.6667" cy="60.0003" r="1.66667" transform="rotate(-90 74.6667 60.0003)"></circle>
                                <circle cx="74.6667" cy="16.3336" r="1.66667" transform="rotate(-90 74.6667 16.3336)"></circle>
                                <circle cx="103" cy="60.0003" r="1.66667" transform="rotate(-90 103 60.0003)"></circle>
                                <circle cx="103" cy="16.3336" r="1.66667" transform="rotate(-90 103 16.3336)"></circle>
                                <circle cx="132" cy="60.0003" r="1.66667" transform="rotate(-90 132 60.0003)"></circle>
                                <circle cx="132" cy="16.3336" r="1.66667" transform="rotate(-90 132 16.3336)"></circle>
                                <circle cx="1.66667" cy="45.3336" r="1.66667" transform="rotate(-90 1.66667 45.3336)"></circle>
                                <circle cx="1.66667" cy="1.66683" r="1.66667" transform="rotate(-90 1.66667 1.66683)"></circle>
                                <circle cx="16.3333" cy="45.3336" r="1.66667" transform="rotate(-90 16.3333 45.3336)"></circle>
                                <circle cx="16.3333" cy="1.66683" r="1.66667" transform="rotate(-90 16.3333 1.66683)"></circle>
                                <circle cx="31" cy="45.3336" r="1.66667" transform="rotate(-90 31 45.3336)"></circle>
                                <circle cx="31" cy="1.66683" r="1.66667" transform="rotate(-90 31 1.66683)"></circle>
                                <circle cx="45.6667" cy="45.3336" r="1.66667" transform="rotate(-90 45.6667 45.3336)"></circle>
                                <circle cx="45.6667" cy="1.66683" r="1.66667" transform="rotate(-90 45.6667 1.66683)"></circle>
                                <circle cx="60.3333" cy="45.3338" r="1.66667" transform="rotate(-90 60.3333 45.3338)"></circle>
                                <circle cx="60.3333" cy="1.66707" r="1.66667" transform="rotate(-90 60.3333 1.66707)"></circle>
                                <circle cx="88.6667" cy="45.3338" r="1.66667" transform="rotate(-90 88.6667 45.3338)"></circle>
                                <circle cx="88.6667" cy="1.66707" r="1.66667" transform="rotate(-90 88.6667 1.66707)"></circle>
                                <circle cx="117.667" cy="45.3338" r="1.66667" transform="rotate(-90 117.667 45.3338)"></circle>
                                <circle cx="117.667" cy="1.66707" r="1.66667" transform="rotate(-90 117.667 1.66707)"></circle>
                                <circle cx="74.6667" cy="45.3338" r="1.66667" transform="rotate(-90 74.6667 45.3338)"></circle>
                                <circle cx="74.6667" cy="1.66707" r="1.66667" transform="rotate(-90 74.6667 1.66707)"></circle>
                                <circle cx="103" cy="45.3338" r="1.66667" transform="rotate(-90 103 45.3338)"></circle>
                                <circle cx="103" cy="1.66707" r="1.66667" transform="rotate(-90 103 1.66707)"></circle>
                                <circle cx="132" cy="45.3338" r="1.66667" transform="rotate(-90 132 45.3338)"></circle>
                                <circle cx="132" cy="1.66707" r="1.66667" transform="rotate(-90 132 1.66707)"></circle>
                              </svg>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </main>

         <footer class="py-16 text-center text-sm text-black dark:text-white/70">
            © Copyright {{ date('Y') }}. All Rights Reserved.
        </footer>

        </div>
    </div>
</div>
</x-app-layout>