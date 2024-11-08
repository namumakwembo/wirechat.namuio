
<section x-data="{ sideBarFloating: false }"   {{$attributes->merge(['class'=>"  w-full px-8 text-gray-700 bg-white dark:bg-gray-900 body-font"])}} >
    {{-- small screen background overlay --}}
    <div @click="sideBarFloating=false" x-cloak x-show="sideBarFloating" class="absolute z-10 lg:hidden inset-0 bg-black/30"> </div>

   
   <div class="  flex items-center justify-between py-5 mx-auto ">
       <a href="/" class="flex items-center gap-2 w-auto text-lg lg:text-2xl font-extrabold leading-none text-black dark:text-white  ">
           {{-- <img class="rounded-xl w-9 h-9 lg:h-11 lg:w-11 " src="{{ asset('assets/wirechat.svg') }}" alt="Alerts"> --}}

           <svg class=" w-9 h-9 lg:h-11 lg:w-11" id="OBJECTS" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 500 500">
            <defs>
              <style>
                .cls-1 {
                  fill: url(#linear-gradient-2);
                }
          
                .cls-2 {
                  fill: url(#linear-gradient-3);
                }
          
                .cls-3 {
                  fill: url(#linear-gradient);
                }
              </style>
              <linearGradient id="linear-gradient" x1="209.91" y1="371.24" x2="212.31" y2="457.93" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#3070f9"/>
                <stop offset="1" stop-color="#00c0ee"/>
              </linearGradient>
              <linearGradient id="linear-gradient-2" x1="209.91" y1="371.24" x2="212.31" y2="457.93" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#3070f9"/>
                <stop offset="1" stop-color="#00c2ee"/>
              </linearGradient>
              <linearGradient id="linear-gradient-3" x1="310.43" y1="421.16" x2="187.02" y2="16.84" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#3dc2ec"/>
                <stop offset=".13" stop-color="#40afee"/>
                <stop offset=".34" stop-color="#4493f1"/>
                <stop offset=".56" stop-color="#487ff3"/>
                <stop offset=".78" stop-color="#4a73f4"/>
                <stop offset="1" stop-color="#4b70f5"/>
              </linearGradient>
            </defs>
            <path class="cls-3" d="M353.96,360.5v86.07c0,9.98-10.33,16.61-19.4,12.47l-129.76-59.31-140.23-64.09,145.4,12.49c-.56,3.3.57,6.69,3.06,8.99,4.05,3.78,10.41,3.55,14.19-.5l6.06-6.5,120.68,10.37Z"/>
            <path class="cls-1" d="M353.96,360.5v86.07c0,9.98-10.33,16.61-19.4,12.47l-129.76-59.31-140.23-64.09,145.4,12.49c-.56,3.3.57,6.69,3.06,8.99,4.05,3.78,10.41,3.55,14.19-.5l6.06-6.5,120.68,10.37Z"/>
            <path class="cls-2" d="M449.45,103.03c-3.43-32.95-30.15-58.67-63.21-60.72-78.73-4.88-199.9-5.3-274.22-.62-33.98,2.13-61.28,28.99-63.59,62.95-5.29,78.06-5.74,154.28-.53,228.32,2.38,33.71,29.01,60.77,62.72,63.12,27.19,1.88,59.87,3.11,94.18,3.66,50.25.82,104.01.18,149.16-1.9,11.79-.55,22.99-1.2,33.38-1.94,32.67-2.32,58.99-27.8,62.49-60.35,8.21-76.49,7.77-154.04-.38-232.51ZM367.8,205.99l-134.53,144.14-6.06,6.5c-3.78,4.05-10.14,4.28-14.19.5-2.48-2.31-3.62-5.69-3.06-8.99.05-.34.13-.68.22-1.02l26.67-97.76h-97.31c-5.54,0-10.04-4.5-10.04-10.05,0-2.55.96-4.99,2.7-6.85l140.59-150.62c3.15-3.37,8.19-4.16,12.21-1.92,4.04,2.25,6.02,6.95,4.81,11.41l-26.67,97.78h97.31c5.54,0,10.04,4.5,10.04,10.04,0,2.55-.97,4.99-2.7,6.85Z"/>
          </svg>
           Wirechat
       </a>

       <nav class=" gap-5 hidden lg:flex items-center justify-center w-full h-full">
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
           <button x-cloak @click="sideBarFloating = !sideBarFloating" type="button" class="text-gray-500 dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400 focus:outline-none focus:text-gray-600 dark:focus:text-gray-400" aria-label="toggle menu">
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
           <img class="rounded-xl w-9 h-9 lg:h-11 lg:w-11 " src="{{ asset('assets/wirechat.svg') }}" alt="Alerts">
        
        Wirechat
    </a>

    <nav  class=" gap-5 flex flex-col ">
        <a href="{{route('docs')}}" class=" font-medium   px-1 py-px rounded-xl text-gray-600 dark:text-gray-200 transition duration-150 ease-out hover:text-gray-900 hover:dark:text-gray-300 {{ request()->routeIs('docs')?'dark:bg-blue-400/60 bg-blue-500/60 hover:text-white text-white ':'' }}">
             Documentation
        </a>

         <a href="https://github.com/namumakwembo/wirechat" class=" font-medium   px-1 py-px rounded-xl text-gray-600 dark:text-gray-200 transition duration-150 ease-out hover:text-gray-900 hover:dark:text-gray-300">
             Github
        </a>

    </nav>
   </div>

   {{ $slot }}



   {{-- <x-sidebar/> --}}
</aside>


  
</section>
