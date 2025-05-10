<div>
    <div
        class="relative min-h-screen flex flex-col items-center justify-center selection:bg-blue-500 selection:text-white">
        <div class="relative w-full">

            <main class="mt-3">
                <div class="relative   pt-[40px]  ">
                    <div class=" mx-auto">
                        <div class="flex flex-col items-center">

                            {{-- Hero info  --}}
                            <div class=" mx-auto max-w-5xl text-center"
                                style="visibility: visible; animation-delay: 0.2s;">
                                <h1
                                    class="mb-6 text-3xl  sm:text-6xl  max-w-xl mx-auto  py-2 font-bold font-manrope font-black leading-snug text-transparent bg-clip-text  bg-linear-to-r from-blue-500 dark:from-blue-600  via-stone-40  dark:via-stone-1000 to-zinc-500 dark:to-zinc-200  ">
                                    A Scalable Livewire
                                    Chat
                                    Package
                                </h1>

                                <p
                                    class="mx-auto mb-9 max-w-[600px] text-sm  font-normal text-gray-800 dark:text-white sm:text-lg sm:leading-[1.44]">
                                    Building a chat system can be a time-consuming process. With Wirechat, you
                                    can easily add real-time messaging to your Laravel app in minutes.
                                </p>

                                {{--  CTAs --}}
                                <div
                                    class="  my-6 justify-center items-center gap-9 flex w-full sm:max-w-full  px-3 flex-col sm:flex-row mx-auto">

                                    <x-button tag="a" class=" w-full sm:w-auto px-4 dark:bg-zinc-800 "
                                        href="{{ route('installation') }}">
                                        Documentation
                                    </x-button>



                                    <x-button tag="a"
                                        class=" w-full flex items-center gap-4 sm:w-auto px-4 dark:bg-zinc-800 "
                                        href="https://github.com/namumakwembo/wirechat">
                                        Star on Github

                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-github w-6 h-6"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8" />
                                        </svg>

                                    </x-button>


                                    {{-- <a href="https://github.com/namumakwembo/wirechat" class="border border-gray-600 flex hover:scale-105 w-full sm:w-auto justify-center transition-all items-center gap-3 px-3 p-2.5 -mb-1.5 rounded-lg dark:border-gray-700" target="_blank">
                                        Star on Github
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 sm:size-6 ">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                                          </svg>
                                          
                                    </a> --}}

                                </div>


                            </div>

                            {{-- Image previews --}}
                            <div 
                                class=" w-full ring-4     ring-zinc-200/30  mt-10  dark:ring-zinc-700/40 mx-auto overflow-hidden rounded-xl  ">

                                <img class="w-full h-full hidden dark:flex  "
                                    src="{{ asset('/assets/preview-2-dark.png') }}" alt="preview">
                                <img class="w-full h-full dark:hidden  "
                                    src="{{ asset('/assets/preview-2-light.png') }}" alt="preview">

                            </div>

                            {{-- dots svg --}}
                            <div class="w-full px-4">
                                <div class="  mt-32 text-blue-700 relative z-10 mx-auto max-w-[845px]">

                                    <div class="absolute -left-9 bottom-0 z-[-1]   ">
                                        <svg width="134" height="106" viewBox="0 0 134 106"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="1.66667" cy="104" r=" 1.66667"
                                                transform="rotate(-90 1.66667 104)">
                                            </circle>
                                            <circle cx="16.3333" cy="104" r="1.66667"
                                                transform="rotate(-90 16.3333 104)"></circle>
                                            <circle cx="31" cy="104" r="1.66667"
                                                transform="rotate(-90 31 104)"></circle>
                                            <circle cx="45.6667" cy="104" r="1.66667"
                                                transform="rotate(-90 45.6667 104)"></circle>
                                            <circle cx="60.3333" cy="104" r="1.66667"
                                                transform="rotate(-90 60.3333 104)"></circle>
                                            <circle cx="88.6667" cy="104" r="1.66667"
                                                transform="rotate(-90 88.6667 104)"></circle>
                                            <circle cx="117.667" cy="104" r="1.66667"
                                                transform="rotate(-90 117.667 104)"></circle>
                                            <circle cx="74.6667" cy="104" r="1.66667"
                                                transform="rotate(-90 74.6667 104)"></circle>
                                            <circle cx="103" cy="104" r="1.66667"
                                                transform="rotate(-90 103 104)"></circle>
                                            <circle cx="132" cy="104" r="1.66667"
                                                transform="rotate(-90 132 104)"></circle>
                                            <circle cx="1.66667" cy="89.3333" r="1.66667"
                                                transform="rotate(-90 1.66667 89.3333)"></circle>
                                            <circle cx="16.3333" cy="89.3333" r="1.66667"
                                                transform="rotate(-90 16.3333 89.3333)"></circle>
                                            <circle cx="31" cy="89.3333" r="1.66667"
                                                transform="rotate(-90 31 89.3333)"></circle>
                                            <circle cx="45.6667" cy="89.3333" r="1.66667"
                                                transform="rotate(-90 45.6667 89.3333)"></circle>
                                            <circle cx="60.3333" cy="89.3338" r="1.66667"
                                                transform="rotate(-90 60.3333 89.3338)"></circle>
                                            <circle cx="88.6667" cy="89.3338" r="1.66667"
                                                transform="rotate(-90 88.6667 89.3338)"></circle>
                                            <circle cx="117.667" cy="89.3338" r="1.66667"
                                                transform="rotate(-90 117.667 89.3338)"></circle>
                                            <circle cx="74.6667" cy="89.3338" r="1.66667"
                                                transform="rotate(-90 74.6667 89.3338)"></circle>
                                            <circle cx="103" cy="89.3338" r="1.66667"
                                                transform="rotate(-90 103 89.3338)"></circle>
                                            <circle cx="132" cy="89.3338" r="1.66667"
                                                transform="rotate(-90 132 89.3338)"></circle>
                                            <circle cx="1.66667" cy="74.6673" r="1.66667"
                                                transform="rotate(-90 1.66667 74.6673)"></circle>
                                            <circle cx="1.66667" cy="31.0003" r="1.66667"
                                                transform="rotate(-90 1.66667 31.0003)"></circle>
                                            <circle cx="16.3333" cy="74.6668" r="1.66667"
                                                transform="rotate(-90 16.3333 74.6668)"></circle>
                                            <circle cx="16.3333" cy="31.0003" r="1.66667"
                                                transform="rotate(-90 16.3333 31.0003)"></circle>
                                            <circle cx="31" cy="74.6668" r="1.66667"
                                                transform="rotate(-90 31 74.6668)"></circle>
                                            <circle cx="31" cy="31.0003" r="1.66667"
                                                transform="rotate(-90 31 31.0003)"></circle>
                                            <circle cx="45.6667" cy="74.6668" r="1.66667"
                                                transform="rotate(-90 45.6667 74.6668)"></circle>
                                            <circle cx="45.6667" cy="31.0003" r="1.66667"
                                                transform="rotate(-90 45.6667 31.0003)"></circle>
                                            <circle cx="60.3333" cy="74.6668" r="1.66667"
                                                transform="rotate(-90 60.3333 74.6668)"></circle>
                                            <circle cx="60.3333" cy="31.0001" r="1.66667"
                                                transform="rotate(-90 60.3333 31.0001)"></circle>
                                            <circle cx="88.6667" cy="74.6668" r="1.66667"
                                                transform="rotate(-90 88.6667 74.6668)"></circle>
                                            <circle cx="88.6667" cy="31.0001" r="1.66667"
                                                transform="rotate(-90 88.6667 31.0001)"></circle>
                                            <circle cx="117.667" cy="74.6668" r="1.66667"
                                                transform="rotate(-90 117.667 74.6668)"></circle>
                                            <circle cx="117.667" cy="31.0001" r="1.66667"
                                                transform="rotate(-90 117.667 31.0001)"></circle>
                                            <circle cx="74.6667" cy="74.6668" r="1.66667"
                                                transform="rotate(-90 74.6667 74.6668)"></circle>
                                            <circle cx="74.6667" cy="31.0001" r="1.66667"
                                                transform="rotate(-90 74.6667 31.0001)"></circle>
                                            <circle cx="103" cy="74.6668" r="1.66667"
                                                transform="rotate(-90 103 74.6668)"></circle>
                                            <circle cx="103" cy="31.0001" r="1.66667"
                                                transform="rotate(-90 103 31.0001)"></circle>
                                            <circle cx="132" cy="74.6668" r="1.66667"
                                                transform="rotate(-90 132 74.6668)"></circle>
                                            <circle cx="132" cy="31.0001" r="1.66667"
                                                transform="rotate(-90 132 31.0001)"></circle>
                                            <circle cx="1.66667" cy="60.0003" r="1.66667"
                                                transform="rotate(-90 1.66667 60.0003)"></circle>
                                            <circle cx="1.66667" cy="16.3336" r="1.66667"
                                                transform="rotate(-90 1.66667 16.3336)"></circle>
                                            <circle cx="16.3333" cy="60.0003" r="1.66667"
                                                transform="rotate(-90 16.3333 60.0003)"></circle>
                                            <circle cx="16.3333" cy="16.3336" r="1.66667"
                                                transform="rotate(-90 16.3333 16.3336)"></circle>
                                            <circle cx="31" cy="60.0003" r="1.66667"
                                                transform="rotate(-90 31 60.0003)"></circle>
                                            <circle cx="31" cy="16.3336" r="1.66667"
                                                transform="rotate(-90 31 16.3336)"></circle>
                                            <circle cx="45.6667" cy="60.0003" r="1.66667"
                                                transform="rotate(-90 45.6667 60.0003)"></circle>
                                            <circle cx="45.6667" cy="16.3336" r="1.66667"
                                                transform="rotate(-90 45.6667 16.3336)"></circle>
                                            <circle cx="60.3333" cy="60.0003" r="1.66667"
                                                transform="rotate(-90 60.3333 60.0003)"></circle>
                                            <circle cx="60.3333" cy="16.3336" r="1.66667"
                                                transform="rotate(-90 60.3333 16.3336)"></circle>
                                            <circle cx="88.6667" cy="60.0003" r="1.66667"
                                                transform="rotate(-90 88.6667 60.0003)"></circle>
                                            <circle cx="88.6667" cy="16.3336" r="1.66667"
                                                transform="rotate(-90 88.6667 16.3336)"></circle>
                                            <circle cx="117.667" cy="60.0003" r="1.66667"
                                                transform="rotate(-90 117.667 60.0003)"></circle>
                                            <circle cx="117.667" cy="16.3336" r="1.66667"
                                                transform="rotate(-90 117.667 16.3336)"></circle>
                                            <circle cx="74.6667" cy="60.0003" r="1.66667"
                                                transform="rotate(-90 74.6667 60.0003)"></circle>
                                            <circle cx="74.6667" cy="16.3336" r="1.66667"
                                                transform="rotate(-90 74.6667 16.3336)"></circle>
                                            <circle cx="103" cy="60.0003" r="1.66667"
                                                transform="rotate(-90 103 60.0003)"></circle>
                                            <circle cx="103" cy="16.3336" r="1.66667"
                                                transform="rotate(-90 103 16.3336)"></circle>
                                            <circle cx="132" cy="60.0003" r="1.66667"
                                                transform="rotate(-90 132 60.0003)"></circle>
                                            <circle cx="132" cy="16.3336" r="1.66667"
                                                transform="rotate(-90 132 16.3336)"></circle>
                                            <circle cx="1.66667" cy="45.3336" r="1.66667"
                                                transform="rotate(-90 1.66667 45.3336)"></circle>
                                            <circle cx="1.66667" cy="1.66683" r="1.66667"
                                                transform="rotate(-90 1.66667 1.66683)"></circle>
                                            <circle cx="16.3333" cy="45.3336" r="1.66667"
                                                transform="rotate(-90 16.3333 45.3336)"></circle>
                                            <circle cx="16.3333" cy="1.66683" r="1.66667"
                                                transform="rotate(-90 16.3333 1.66683)"></circle>
                                            <circle cx="31" cy="45.3336" r="1.66667"
                                                transform="rotate(-90 31 45.3336)"></circle>
                                            <circle cx="31" cy="1.66683" r="1.66667"
                                                transform="rotate(-90 31 1.66683)"></circle>
                                            <circle cx="45.6667" cy="45.3336" r="1.66667"
                                                transform="rotate(-90 45.6667 45.3336)"></circle>
                                            <circle cx="45.6667" cy="1.66683" r="1.66667"
                                                transform="rotate(-90 45.6667 1.66683)"></circle>
                                            <circle cx="60.3333" cy="45.3338" r="1.66667"
                                                transform="rotate(-90 60.3333 45.3338)"></circle>
                                            <circle cx="60.3333" cy="1.66707" r="1.66667"
                                                transform="rotate(-90 60.3333 1.66707)"></circle>
                                            <circle cx="88.6667" cy="45.3338" r="1.66667"
                                                transform="rotate(-90 88.6667 45.3338)"></circle>
                                            <circle cx="88.6667" cy="1.66707" r="1.66667"
                                                transform="rotate(-90 88.6667 1.66707)"></circle>
                                            <circle cx="117.667" cy="45.3338" r="1.66667"
                                                transform="rotate(-90 117.667 45.3338)"></circle>
                                            <circle cx="117.667" cy="1.66707" r="1.66667"
                                                transform="rotate(-90 117.667 1.66707)"></circle>
                                            <circle cx="74.6667" cy="45.3338" r="1.66667"
                                                transform="rotate(-90 74.6667 45.3338)"></circle>
                                            <circle cx="74.6667" cy="1.66707" r="1.66667"
                                                transform="rotate(-90 74.6667 1.66707)"></circle>
                                            <circle cx="103" cy="45.3338" r="1.66667"
                                                transform="rotate(-90 103 45.3338)"></circle>
                                            <circle cx="103" cy="1.66707" r="1.66667"
                                                transform="rotate(-90 103 1.66707)"></circle>
                                            <circle cx="132" cy="45.3338" r="1.66667"
                                                transform="rotate(-90 132 45.3338)"></circle>
                                            <circle cx="132" cy="1.66707" r="1.66667"
                                                transform="rotate(-90 132 1.66707)"></circle>
                                        </svg>
                                    </div>
                                    <div class="absolute   -right-6 -top-6 z-[-1]">
                                        <svg width="134" height="106" viewBox="0 0 134 106"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="1.66667" cy="104" r="1.66667"
                                                transform="rotate(-90 1.66667 104)"></circle>
                                            <circle cx="16.3333" cy="104" r="1.66667"
                                                transform="rotate(-90 16.3333 104)"></circle>
                                            <circle cx="31" cy="104" r="1.66667"
                                                transform="rotate(-90 31 104)"></circle>
                                            <circle cx="45.6667" cy="104" r="1.66667"
                                                transform="rotate(-90 45.6667 104)"></circle>
                                            <circle cx="60.3333" cy="104" r="1.66667"
                                                transform="rotate(-90 60.3333 104)"></circle>
                                            <circle cx="88.6667" cy="104" r="1.66667"
                                                transform="rotate(-90 88.6667 104)"></circle>
                                            <circle cx="117.667" cy="104" r="1.66667"
                                                transform="rotate(-90 117.667 104)"></circle>
                                            <circle cx="74.6667" cy="104" r="1.66667"
                                                transform="rotate(-90 74.6667 104)"></circle>
                                            <circle cx="103" cy="104" r="1.66667"
                                                transform="rotate(-90 103 104)"></circle>
                                            <circle cx="132" cy="104" r="1.66667"
                                                transform="rotate(-90 132 104)"></circle>
                                            <circle cx="1.66667" cy="89.3333" r="1.66667"
                                                transform="rotate(-90 1.66667 89.3333)"></circle>
                                            <circle cx="16.3333" cy="89.3333" r="1.66667"
                                                transform="rotate(-90 16.3333 89.3333)"></circle>
                                            <circle cx="31" cy="89.3333" r="1.66667"
                                                transform="rotate(-90 31 89.3333)"></circle>
                                            <circle cx="45.6667" cy="89.3333" r="1.66667"
                                                transform="rotate(-90 45.6667 89.3333)"></circle>
                                            <circle cx="60.3333" cy="89.3338" r="1.66667"
                                                transform="rotate(-90 60.3333 89.3338)"></circle>
                                            <circle cx="88.6667" cy="89.3338" r="1.66667"
                                                transform="rotate(-90 88.6667 89.3338)"></circle>
                                            <circle cx="117.667" cy="89.3338" r="1.66667"
                                                transform="rotate(-90 117.667 89.3338)"></circle>
                                            <circle cx="74.6667" cy="89.3338" r="1.66667"
                                                transform="rotate(-90 74.6667 89.3338)"></circle>
                                            <circle cx="103" cy="89.3338" r="1.66667"
                                                transform="rotate(-90 103 89.3338)"></circle>
                                            <circle cx="132" cy="89.3338" r="1.66667"
                                                transform="rotate(-90 132 89.3338)"></circle>
                                            <circle cx="1.66667" cy="74.6673" r="1.66667"
                                                transform="rotate(-90 1.66667 74.6673)"></circle>
                                            <circle cx="1.66667" cy="31.0003" r="1.66667"
                                                transform="rotate(-90 1.66667 31.0003)"></circle>
                                            <circle cx="16.3333" cy="74.6668" r="1.66667"
                                                transform="rotate(-90 16.3333 74.6668)"></circle>
                                            <circle cx="16.3333" cy="31.0003" r="1.66667"
                                                transform="rotate(-90 16.3333 31.0003)"></circle>
                                            <circle cx="31" cy="74.6668" r="1.66667"
                                                transform="rotate(-90 31 74.6668)"></circle>
                                            <circle cx="31" cy="31.0003" r="1.66667"
                                                transform="rotate(-90 31 31.0003)"></circle>
                                            <circle cx="45.6667" cy="74.6668" r="1.66667"
                                                transform="rotate(-90 45.6667 74.6668)"></circle>
                                            <circle cx="45.6667" cy="31.0003" r="1.66667"
                                                transform="rotate(-90 45.6667 31.0003)"></circle>
                                            <circle cx="60.3333" cy="74.6668" r="1.66667"
                                                transform="rotate(-90 60.3333 74.6668)"></circle>
                                            <circle cx="60.3333" cy="31.0001" r="1.66667"
                                                transform="rotate(-90 60.3333 31.0001)"></circle>
                                            <circle cx="88.6667" cy="74.6668" r="1.66667"
                                                transform="rotate(-90 88.6667 74.6668)"></circle>
                                            <circle cx="88.6667" cy="31.0001" r="1.66667"
                                                transform="rotate(-90 88.6667 31.0001)"></circle>
                                            <circle cx="117.667" cy="74.6668" r="1.66667"
                                                transform="rotate(-90 117.667 74.6668)"></circle>
                                            <circle cx="117.667" cy="31.0001" r="1.66667"
                                                transform="rotate(-90 117.667 31.0001)"></circle>
                                            <circle cx="74.6667" cy="74.6668" r="1.66667"
                                                transform="rotate(-90 74.6667 74.6668)"></circle>
                                            <circle cx="74.6667" cy="31.0001" r="1.66667"
                                                transform="rotate(-90 74.6667 31.0001)"></circle>
                                            <circle cx="103" cy="74.6668" r="1.66667"
                                                transform="rotate(-90 103 74.6668)"></circle>
                                            <circle cx="103" cy="31.0001" r="1.66667"
                                                transform="rotate(-90 103 31.0001)"></circle>
                                            <circle cx="132" cy="74.6668" r="1.66667"
                                                transform="rotate(-90 132 74.6668)"></circle>
                                            <circle cx="132" cy="31.0001" r="1.66667"
                                                transform="rotate(-90 132 31.0001)"></circle>
                                            <circle cx="1.66667" cy="60.0003" r="1.66667"
                                                transform="rotate(-90 1.66667 60.0003)"></circle>
                                            <circle cx="1.66667" cy="16.3336" r="1.66667"
                                                transform="rotate(-90 1.66667 16.3336)"></circle>
                                            <circle cx="16.3333" cy="60.0003" r="1.66667"
                                                transform="rotate(-90 16.3333 60.0003)"></circle>
                                            <circle cx="16.3333" cy="16.3336" r="1.66667"
                                                transform="rotate(-90 16.3333 16.3336)"></circle>
                                            <circle cx="31" cy="60.0003" r="1.66667"
                                                transform="rotate(-90 31 60.0003)"></circle>
                                            <circle cx="31" cy="16.3336" r="1.66667"
                                                transform="rotate(-90 31 16.3336)"></circle>
                                            <circle cx="45.6667" cy="60.0003" r="1.66667"
                                                transform="rotate(-90 45.6667 60.0003)"></circle>
                                            <circle cx="45.6667" cy="16.3336" r="1.66667"
                                                transform="rotate(-90 45.6667 16.3336)"></circle>
                                            <circle cx="60.3333" cy="60.0003" r="1.66667"
                                                transform="rotate(-90 60.3333 60.0003)"></circle>
                                            <circle cx="60.3333" cy="16.3336" r="1.66667"
                                                transform="rotate(-90 60.3333 16.3336)"></circle>
                                            <circle cx="88.6667" cy="60.0003" r="1.66667"
                                                transform="rotate(-90 88.6667 60.0003)"></circle>
                                            <circle cx="88.6667" cy="16.3336" r="1.66667"
                                                transform="rotate(-90 88.6667 16.3336)"></circle>
                                            <circle cx="117.667" cy="60.0003" r="1.66667"
                                                transform="rotate(-90 117.667 60.0003)"></circle>
                                            <circle cx="117.667" cy="16.3336" r="1.66667"
                                                transform="rotate(-90 117.667 16.3336)"></circle>
                                            <circle cx="74.6667" cy="60.0003" r="1.66667"
                                                transform="rotate(-90 74.6667 60.0003)"></circle>
                                            <circle cx="74.6667" cy="16.3336" r="1.66667"
                                                transform="rotate(-90 74.6667 16.3336)"></circle>
                                            <circle cx="103" cy="60.0003" r="1.66667"
                                                transform="rotate(-90 103 60.0003)"></circle>
                                            <circle cx="103" cy="16.3336" r="1.66667"
                                                transform="rotate(-90 103 16.3336)"></circle>
                                            <circle cx="132" cy="60.0003" r="1.66667"
                                                transform="rotate(-90 132 60.0003)"></circle>
                                            <circle cx="132" cy="16.3336" r="1.66667"
                                                transform="rotate(-90 132 16.3336)"></circle>
                                            <circle cx="1.66667" cy="45.3336" r="1.66667"
                                                transform="rotate(-90 1.66667 45.3336)"></circle>
                                            <circle cx="1.66667" cy="1.66683" r="1.66667"
                                                transform="rotate(-90 1.66667 1.66683)"></circle>
                                            <circle cx="16.3333" cy="45.3336" r="1.66667"
                                                transform="rotate(-90 16.3333 45.3336)"></circle>
                                            <circle cx="16.3333" cy="1.66683" r="1.66667"
                                                transform="rotate(-90 16.3333 1.66683)"></circle>
                                            <circle cx="31" cy="45.3336" r="1.66667"
                                                transform="rotate(-90 31 45.3336)"></circle>
                                            <circle cx="31" cy="1.66683" r="1.66667"
                                                transform="rotate(-90 31 1.66683)"></circle>
                                            <circle cx="45.6667" cy="45.3336" r="1.66667"
                                                transform="rotate(-90 45.6667 45.3336)"></circle>
                                            <circle cx="45.6667" cy="1.66683" r="1.66667"
                                                transform="rotate(-90 45.6667 1.66683)"></circle>
                                            <circle cx="60.3333" cy="45.3338" r="1.66667"
                                                transform="rotate(-90 60.3333 45.3338)"></circle>
                                            <circle cx="60.3333" cy="1.66707" r="1.66667"
                                                transform="rotate(-90 60.3333 1.66707)"></circle>
                                            <circle cx="88.6667" cy="45.3338" r="1.66667"
                                                transform="rotate(-90 88.6667 45.3338)"></circle>
                                            <circle cx="88.6667" cy="1.66707" r="1.66667"
                                                transform="rotate(-90 88.6667 1.66707)"></circle>
                                            <circle cx="117.667" cy="45.3338" r="1.66667"
                                                transform="rotate(-90 117.667 45.3338)"></circle>
                                            <circle cx="117.667" cy="1.66707" r="1.66667"
                                                transform="rotate(-90 117.667 1.66707)"></circle>
                                            <circle cx="74.6667" cy="45.3338" r="1.66667"
                                                transform="rotate(-90 74.6667 45.3338)"></circle>
                                            <circle cx="74.6667" cy="1.66707" r="1.66667"
                                                transform="rotate(-90 74.6667 1.66707)"></circle>
                                            <circle cx="103" cy="45.3338" r="1.66667"
                                                transform="rotate(-90 103 45.3338)"></circle>
                                            <circle cx="103" cy="1.66707" r="1.66667"
                                                transform="rotate(-90 103 1.66707)"></circle>
                                            <circle cx="132" cy="45.3338" r="1.66667"
                                                transform="rotate(-90 132 45.3338)"></circle>
                                            <circle cx="132" cy="1.66707" r="1.66667"
                                                transform="rotate(-90 132 1.66707)"></circle>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

   
        </div>
    </div>
</div>
