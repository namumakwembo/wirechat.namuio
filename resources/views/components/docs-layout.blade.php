@extends('layouts.app')

@section('content')
    <div class=" max-w-screen-xl mx-auto  ">


        <x-navigation>
            <x-sidebar />
        </x-navigation>


        <div class= "h-[calc(100vh_-_5.1rem)] overflow-y-hidden flex justify-between dark:bg-gray-900 ">
            <aside
                class="w-[350px]    hidden lg:flex  flex-col gap-5 bg-white dark:bg-gray-900  h-full p-8 px-9 top-0  pt-10  inset-x-0 z-[50] px-6  py-4 transition-all duration-300 ease-in-out">

                <x-sidebar />
            </aside>



            <main x-data x-scroll-group  class="w-full lg:grid lg:grid-cols-12 pt-10 ">

                <div x-scroll-scrollable class="lg:col-span-9 w-full pb-14 h-full px-8 md:px-10    overflow-y-auto"
                    style="contain: conent">

                    <x-prose class=" mx-auto w-full dark:text-white/90 rounded-lg text-gray-900">
                        {{ $slot }}
                    </x-prose>
                </div>

                <aside class="hidden lg:grid lg:col-span-3   h-full grid overflow-y-auto p-4">


                    @if ($subNavigation ?? false)
                        {{ $subNavigation }}
                    @endif



                    <div class="mt-auto flex flex-col gap-4 overflow-x-visible">



                        <template x-teleport="body">
                            <div x-data={show:false} class=" hidden md:grid space-y-2 dark:bg-gray-900 w-52 lg:w-72 bg-white fixed inset-x-auto bottom-10 right-10 z-[50] group">
                            
                              
                                {{-- Content --}}
                                <div x-cloak x-show="show"  class=" grid  gap-y-2 border dark:border-gray-700 p-5 shadow-sm rounded-lg">

                                    <h5 class="dark:text-white">Need Help?</h5>
                                    <p class="text-sm">
                                        Check out existing discussions or reported issues , your problem may already have a solution.  
                                        If not, feel free to open a new issue.
                                    </p>
                                    
                                    <hr class="dark:border-gray-700">
                                    <a href="https://github.com/namumakwembo/wirechat/issues" class="dark:bg-gray-800 bg-gray-100 text-black rounded-lg w-full dark:text-white flex items-center gap-3 text-xs text-center self-center px-3 py-2 my-2 mx-2">
                                        <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                                            <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8"/>
                                          </svg>
                                        </span>

                                         Github Issues
                                    </a>

                                    <a href="https://github.com/namumakwembo/wirechat/discussions" class="bg-black rounded-lg w-full text-white flex items-center gap-3 text-xs text-center self-center px-3 py-2 my-2 mx-2">
                                        <span>

                                          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 0 1-.825-.242m9.345-8.334a2.126 2.126 0 0 0-.476-.095 48.64 48.64 0 0 0-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0 0 11.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
                                          </svg>
                                          
                                        </span>

                                          Discussions
                                    </a>

                                    <span class="mx-auto">or</span>


                                    <a href="https://buymeacoffee.com/namuio/e/366303" target="_blank" class="rounded-lg w-full border dark:border-gray-700 dark:text-white flex items-center gap-2 text-xs text-center self-center px-3 py-2 my-2 mx-2">
                                        <span>

                                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
                                          </svg>
                                          
                                          
                                        </span>

                                        Contact the creator of WireChat
                                    </a>

                                </div>

                                <button @click="show =! show " class="ml-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
                                      </svg>
                                      
                                    </button>
                           </div>
                        </template>
                        {{-- <a href="https://buymeacoffee.com/namuio/e/366303" title="Book an appointment Namu" target="_blank">
                            <img src="{{ asset('assets/support.jpeg') }}" class=" w-full rounded-xl" alt="book appointment">
                        </a> --}}
                    </div>
                </aside>
            </main>




        </div>

    </div>
@endsection
