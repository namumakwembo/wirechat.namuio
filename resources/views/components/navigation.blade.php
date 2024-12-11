
<section x-data="{ sideBarFloating: false }"   {{$attributes->merge(['class'=>" z-50  w-full px-8 text-gray-700 bg-white dark:bg-gray-900 body-font"])}} >
    {{-- small screen background overlay --}}
    <div @click="sideBarFloating=false" x-cloak x-show="sideBarFloating" class="absolute z-10 lg:hidden inset-0 bg-black/30"> </div>

   
   <div class="  flex items-center justify-between py-5 mx-auto ">
       <a href="/" class="flex items-center gap-2 w-auto text-lg lg:text-2xl font-extrabold leading-none text-black dark:text-white  ">
           {{-- <img class="rounded-xl w-9 h-9 lg:h-11 lg:w-11 " src="{{ asset('assets/wirechat.svg') }}" alt="Alerts"> --}}

           
          <svg class=" w-9 h-9 lg:h-10 lg:w-10" id="OBJECTS" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 500 500">
            <defs>
              <style>
                .cls-1 {
                  fill: url(#linear-gradient-2);
                }
          
                .cls-2 {
                  fill: #fff;
                }
          
                .cls-3 {
                  fill: url(#linear-gradient-3);
                }
          
                .cls-4 {
                  fill: url(#linear-gradient);
                }
              </style>
              <linearGradient id="linear-gradient" x1="205.38" y1="385.01" x2="208.06" y2="481.49" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#3070f9"/>
                <stop offset="1" stop-color="#00c0ee"/>
              </linearGradient>
              <linearGradient id="linear-gradient-2" x1="205.38" y1="385.01" x2="208.06" y2="481.49" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#3070f9"/>
                <stop offset="1" stop-color="#00c2ee"/>
              </linearGradient>
              <linearGradient id="linear-gradient-3" x1="317.25" y1="440.57" x2="179.91" y2="-9.43" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#3dc2ec"/>
                <stop offset=".13" stop-color="#40afee"/>
                <stop offset=".34" stop-color="#4493f1"/>
                <stop offset=".56" stop-color="#487ff3"/>
                <stop offset=".78" stop-color="#4a73f4"/>
                <stop offset="1" stop-color="#4b70f5"/>
              </linearGradient>
            </defs>
            <rect class="cls-2" fill="currentColor" x="101.66" y="59.36" width="321.49" height="321.49"/>
            <g>
              <path class="cls-4" d="M365.7,373.06v95.79c0,11.11-11.5,18.48-21.59,13.88l-144.42-66.01-156.07-71.32,161.83,13.9c-.62,3.67.64,7.44,3.4,10.01,4.51,4.21,11.58,3.95,15.79-.55l6.75-7.23,134.31,11.54Z"/>
              <path class="cls-1" d="M365.7,373.06v95.79c0,11.11-11.5,18.48-21.59,13.88l-144.42-66.01-156.07-71.32,161.83,13.9c-.62,3.67.64,7.44,3.4,10.01,4.51,4.21,11.58,3.95,15.79-.55l6.75-7.23,134.31,11.54Z"/>
              <path class="cls-3" d="M471.97,86.5c-3.81-36.67-33.55-65.3-70.34-67.58-87.63-5.43-222.48-5.9-305.2-.7C58.61,20.59,28.22,50.48,25.66,88.28c-5.88,86.88-6.39,171.71-.6,254.12,2.65,37.52,32.29,67.64,69.81,70.25,30.26,2.09,66.63,3.45,104.82,4.06,55.93.91,115.76.2,166.01-2.11,13.12-.61,25.58-1.33,37.15-2.15,36.35-2.58,65.65-30.94,69.55-67.17,9.14-85.13,8.65-171.44-.43-258.78ZM381.1,201.1l-149.72,160.42-6.74,7.23c-4.21,4.51-11.29,4.76-15.79.55-2.77-2.56-4.03-6.33-3.41-10.01.06-.38.14-.75.24-1.13l29.68-108.8h-108.3c-6.17,0-11.17-5-11.17-11.18,0-2.84,1.06-5.56,3.01-7.63L275.36,62.91c3.51-3.75,9.12-4.63,13.6-2.14,4.49,2.51,6.7,7.74,5.36,12.7l-29.69,108.83h108.31c6.16,0,11.17,5.01,11.17,11.17,0,2.84-1.08,5.56-3.01,7.63Z"/>
              <path class="cls-2" d="M384.11,193.47c0,2.84-1.08,5.56-3.01,7.63l-149.72,160.42-6.74,7.23c-4.21,4.51-11.29,4.76-15.79.55-2.77-2.56-4.03-6.33-3.41-10.01.06-.38.14-.75.24-1.13l29.68-108.8h-108.3c-6.17,0-11.17-5-11.17-11.18,0-2.84,1.06-5.56,3.01-7.63L275.36,62.91c3.51-3.75,9.12-4.63,13.6-2.14,4.49,2.51,6.7,7.74,5.36,12.7l-29.69,108.83h108.31c6.16,0,11.17,5.01,11.17,11.17Z"/>
            </g>
          </svg>
           Wirechat 

           <span class="border p-1 px-3 dark:text-gray-300 dark:font-medium dark:border-gray-700  max-w-fit max-h-fit rounded-lg text-xs"> Beta</span>
       </a>

       <nav class=" gap-5 hidden lg:flex items-center justify-center ml-auto pr-10">
           <a href="{{route('docs')}}" class="relative font-medium   px-3 py-px rounded-xl text-gray-600 dark:text-gray-200 transition duration-150 ease-out hover:text-gray-900 hover:dark:text-gray-300 {{ request()->routeIs('introduction')?'dark:bg-blue-400/60 bg-blue-500/60 text-white ':'' }}">
                Documentation
           </a>

            <a href="https://github.com/namumakwembo/wirechat" class="relative font-medium   px-3 py-px rounded-xl text-gray-600 dark:text-gray-200 transition duration-150 ease-out hover:text-gray-900 hover:dark:text-gray-300">
                Github
           </a>
          
       </nav>

       {{-- Dark mode --}}
       <div class=" flex gap-3 items-center">
       <x-toggle-theme/>
       <div class="flex lg:hidden">
           <button x-cloak @click="sideBarFloating = !sideBarFloating" type="button" class="text-gray-500 z-10 dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400 focus:outline-none focus:text-gray-600 dark:focus:text-gray-400" aria-label="toggle menu">
               <svg x-show="!sideBarFloating" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                   <path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16" />
               </svg>
       
               <svg x-show="sideBarFloating" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                   <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
               </svg>
           </button>
       </div>
            
       </div>
   </div>


<aside x-cloak :class="[sideBarFloating ? 'translate-x-0 opacity-100 flex ' : ' opacity-0  -translate-x-full']"
   class="w-[300px] md:w-[400px] lg:hidden flex-col gap-5 bg-white dark:bg-gray-900  border-r border-gray-200 dark:border-gray-700 h-full p-8 px-9 absolute top-0   inset-x-0 z-[50] px-6 py-4 transition-all duration-300 ease-in-out" >

    {{-- small screen menu details --}}
   <div x-cloak x-show="sideBarFloating" class="flex lg:hidden flex-col gap-5 px-3 ">
    <a href="/" class="relative z-10 flex gap-2 items-center w-auto text-lg lg:text-2xl font-extrabold leading-none text-black dark:text-white  ">
           <img class="rounded-xl w-9 h-9 lg:h-11 lg:w-11 " src="{{ asset('assets/wirechat-fill.svg') }}" alt="Alerts">
        
        Wirechat
    </a>

    <nav  class=" gap-5 flex flex-col ">
        <a href="{{route('docs')}}" class=" font-medium   px-1 py-px rounded-xl text-gray-900 dark:text-gray-200 transition duration-150 ease-out hover:text-gray-900 hover:dark:text-gray-300 {{ request()->routeIs('docs')?'dark:bg-blue-400/60 bg-blue-500/60 hover:text-white text-white ':'' }}">
             Documentation
        </a>

         <a href="https://github.com/namumakwembo/wirechat" class=" font-medium   px-1 py-px rounded-xl text-gray-900 dark:text-gray-200 transition duration-150 ease-out hover:text-gray-900 hover:dark:text-gray-300">
             Github
        </a>

    </nav>
   </div>

   {{ $slot }}



   {{-- <x-sidebar/> --}}
</aside>


  
</section>
