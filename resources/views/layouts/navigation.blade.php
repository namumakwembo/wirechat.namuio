
<section x-data="{ sideBarFloating: false }"   class=" z-50  w-full px-8 text-gray-700 bg-white dark:bg-zinc-950 body-font" >
     {{-- small screen background overlay --}}
     <div @click="sideBarFloating=false" x-cloak x-show="sideBarFloating" class="absolute lg:hidden inset-0 bg-black/30"> </div>

    
    <div class="  flex items-center justify-between py-5 mx-auto ">
        <a href="/" class="flex items-center w-auto text-lg lg:text-2xl font-extrabold leading-none text-black dark:text-white  ">
            <img class="rounded-xl w-10 h-10 lg:h-12 lg:w-12" src="{{ asset('assets/wirechat-logo.png') }}" alt="Alerts">
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
    class="w-[350px] md:w-[400px] lg:hidden flex-col gap-5 bg-white dark:bg-gray-900  border-r border-gray-200 dark:border-gray-700 h-full p-8 px-9 absolute top-0   inset-x-0 z-[50] px-6 py-4 transition-all duration-300 ease-in-out" >

     {{-- small screen menu details --}}
    <div x-cloak x-show="sideBarFloating" class="flex lg:hidden flex-col gap-5 px-3 ">
     <a href="/" class="relative z-10 flex items-center w-auto text-lg lg:text-2xl font-extrabold leading-none text-black dark:text-white  ">
         <img class="rounded-xl w-10 h-10 lg:h-12 lg:w-12" src="{{ asset('assets/wirechat-logo.png') }}" alt="Alerts">
         Wirechat
     </a>

     <nav  class=" gap-5 flex flex-col ">
         <a href="{{route('docs')}}" class=" font-medium   px-3 py-px rounded-xl text-gray-600 dark:text-gray-200 transition duration-150 ease-out hover:text-gray-900 hover:dark:text-gray-300 {{ request()->routeIs('docs')?'dark:bg-blue-400/60 bg-blue-500/60 hover:text-white text-white ':'' }}">
              Documentation
         </a>

          <a href="https://github.com/namumakwembo/wirechat" class=" font-medium   px-3 py-px rounded-xl text-gray-600 dark:text-gray-200 transition duration-150 ease-out hover:text-gray-900 hover:dark:text-gray-300">
              Github
         </a>

     </nav>
    </div>

    {{ $slot }}



    {{-- <x-sidebar/> --}}
</aside>


   
</section>
