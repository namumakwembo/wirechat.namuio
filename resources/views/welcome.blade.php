<x-app-layout>

    {{-- Boxed line --}}
    <svg
        class="pointer-events-none z-10 absolute hidden -inset-px h-full w-full stroke-black/20 dark:stroke-white/10 stroke-[4] [mask-image:radial-gradient(white,transparent_70%)] [stroke-dasharray:5_6] [stroke-dashoffset:10]">
        <defs>
            <pattern id="grid-pattern-215" viewBox="0 0 64 64" width="64" height="64" patternUnits="userSpaceOnUse"
                x="0" y="0">
                <path d="M64 0H0V64" fill="none"></path>
            </pattern>
        </defs>
        <rect width="100%" height="100%" stroke-width="0" fill="url(#grid-pattern-215)"></rect>
    </svg>
    {{-- light gradien --}}
    <span class="absolute opacity-60 dark:opacity-100 z-1 -top-52 inset-x-0 hidden">

        <svg   class="w-full" height="1140" viewBox="0 0 1512 1140" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g filter="url(#filter0_f_2_4068)">
                <ellipse cx="1145" cy="-137.5" rx="465" ry="465.5" fill="#DB2777"
                    fill-opacity="0.4" />
            </g>
            <g filter="url(#filter1_f_2_4068)">
                <ellipse cx="659" cy="-144.5" rx="465" ry="465.5" fill="#4A76F4" />
            </g>
            <g filter="url(#filter2_f_2_4068)">
                <circle cx="979.5" cy="7.5" r="465.5" fill="#3B82F6" fill-opacity="0.5" />
            </g>
            <defs>
                <filter id="filter0_f_2_4068" x="13.0826" y="-1269.92" width="2263.83" height="2264.83"
                    filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix" />
                    <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
                    <feGaussianBlur stdDeviation="333.459" result="effect1_foregroundBlur_2_4068" />
                </filter>
                <filter id="filter1_f_2_4068" x="-472.917" y="-1276.92" width="2263.83" height="2264.83"
                    filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix" />
                    <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
                    <feGaussianBlur stdDeviation="333.459" result="effect1_foregroundBlur_2_4068" />
                </filter>
                <filter id="filter2_f_2_4068" x="-152.917" y="-1124.92" width="2264.83" height="2264.83"
                    filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix" />
                    <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
                    <feGaussianBlur stdDeviation="333.459" result="effect1_foregroundBlur_2_4068" />
                </filter>
            </defs>
        </svg>


        {{-- <div class="w-[1000px] h-[1000px] relative">
          <div class="w-[930px] h-[931px] left-[486px] top-[7px] absolute bg-pink-600/40 rounded-full blur-[666.92px]"></div>
          <div class="w-[930px] h-[931px] left-0 top-0 absolute bg-[#4a76f4] rounded-full blur-[666.92px]"></div>
          <div class="w-[931px] h-[931px] left-[14px] top-[433px] absolute bg-blue-500/50 rounded-full blur-[666.92px]"></div>
        </div> --}}
    </span>
    {{-- Sparkles --}}
    <span class="hidden md:block absolute z-1 top-52 left-24">
      <svg xmlns="http://www.w3.org/2000/svg" width="112" height="95" viewBox="0 0 112 95" fill="none">
        <g filter="url(#filter0_d_1_7998)">
        <ellipse cx="68.6417" cy="81.0184" rx="2.48163" ry="2.48163" fill="url(#paint0_radial_1_7998)"/>
        </g>
        <g filter="url(#filter1_d_1_7998)">
        <ellipse cx="76.0863" cy="66.1283" rx="2.48163" ry="2.48163" fill="url(#paint1_radial_1_7998)"/>
        </g>
        <g filter="url(#filter2_d_1_7998)">
        <ellipse cx="97.1751" cy="35.1088" rx="3.72245" ry="3.72244" fill="url(#paint2_radial_1_7998)"/>
        </g>
        <g filter="url(#filter3_d_1_7998)">
        <ellipse cx="20.2463" cy="15.2554" rx="3.72245" ry="3.72244" fill="url(#paint3_radial_1_7998)"/>
        </g>
        <g filter="url(#filter4_d_1_7998)">
        <ellipse cx="16.5223" cy="61.1652" rx="4.96327" ry="4.96325" fill="url(#paint4_radial_1_7998)"/>
        </g>
        <g filter="url(#filter5_d_1_7998)">
        <ellipse cx="38.8589" cy="81.0184" rx="2.48163" ry="2.48163" fill="url(#paint5_radial_1_7998)"/>
        </g>
        <g filter="url(#filter6_d_1_7998)">
        <ellipse cx="38.8589" cy="58.6833" rx="2.48163" ry="2.48163" fill="url(#paint6_radial_1_7998)"/>
        </g>
        <defs>
        <filter id="filter0_d_1_7998" x="55.4874" y="67.8641" width="26.3086" height="26.3086" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
        <feOffset/>
        <feGaussianBlur stdDeviation="5.33633"/>
        <feComposite in2="hardAlpha" operator="out"/>
        <feColorMatrix type="matrix" values="0 0 0 0 1 0 0 0 0 1 0 0 0 0 1 0 0 0 0.38 0"/>
        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1_7998"/>
        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1_7998" result="shape"/>
        </filter>
        <filter id="filter1_d_1_7998" x="62.932" y="52.974" width="26.3086" height="26.3086" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
        <feOffset/>
        <feGaussianBlur stdDeviation="5.33633"/>
        <feComposite in2="hardAlpha" operator="out"/>
        <feColorMatrix type="matrix" values="0 0 0 0 1 0 0 0 0 1 0 0 0 0 1 0 0 0 0.38 0"/>
        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1_7998"/>
        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1_7998" result="shape"/>
        </filter>
        <filter id="filter2_d_1_7998" x="82.78" y="20.7137" width="28.7902" height="28.7902" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
        <feOffset/>
        <feGaussianBlur stdDeviation="5.33633"/>
        <feComposite in2="hardAlpha" operator="out"/>
        <feColorMatrix type="matrix" values="0 0 0 0 1 0 0 0 0 1 0 0 0 0 1 0 0 0 0.38 0"/>
        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1_7998"/>
        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1_7998" result="shape"/>
        </filter>
        <filter id="filter3_d_1_7998" x="5.85114" y="0.86027" width="28.7902" height="28.7902" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
        <feOffset/>
        <feGaussianBlur stdDeviation="5.33633"/>
        <feComposite in2="hardAlpha" operator="out"/>
        <feColorMatrix type="matrix" values="0 0 0 0 1 0 0 0 0 1 0 0 0 0 1 0 0 0 0.38 0"/>
        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1_7998"/>
        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1_7998" result="shape"/>
        </filter>
        <filter id="filter4_d_1_7998" x="0.886423" y="45.5293" width="31.2718" height="31.2718" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
        <feOffset/>
        <feGaussianBlur stdDeviation="5.33633"/>
        <feComposite in2="hardAlpha" operator="out"/>
        <feColorMatrix type="matrix" values="0 0 0 0 1 0 0 0 0 1 0 0 0 0 1 0 0 0 0.38 0"/>
        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1_7998"/>
        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1_7998" result="shape"/>
        </filter>
        <filter id="filter5_d_1_7998" x="25.7046" y="67.8641" width="26.3086" height="26.3086" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
        <feOffset/>
        <feGaussianBlur stdDeviation="5.33633"/>
        <feComposite in2="hardAlpha" operator="out"/>
        <feColorMatrix type="matrix" values="0 0 0 0 1 0 0 0 0 1 0 0 0 0 1 0 0 0 0.38 0"/>
        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1_7998"/>
        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1_7998" result="shape"/>
        </filter>
        <filter id="filter6_d_1_7998" x="25.7046" y="45.529" width="26.3086" height="26.3086" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
        <feOffset/>
        <feGaussianBlur stdDeviation="5.33633"/>
        <feComposite in2="hardAlpha" operator="out"/>
        <feColorMatrix type="matrix" values="0 0 0 0 1 0 0 0 0 1 0 0 0 0 1 0 0 0 0.38 0"/>
        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1_7998"/>
        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1_7998" result="shape"/>
        </filter>
        <radialGradient id="paint0_radial_1_7998" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(68.6417 81.0184) rotate(90) scale(2.48163 2.48163)">
        <stop stop-color="#CADEFF"/>
        <stop offset="1" stop-color="#3B82F6"/>
        </radialGradient>
        <radialGradient id="paint1_radial_1_7998" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(76.0862 66.1283) rotate(90) scale(2.48163 2.48163)">
        <stop stop-color="#CADEFF"/>
        <stop offset="1" stop-color="#3B82F6"/>
        </radialGradient>
        <radialGradient id="paint2_radial_1_7998" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(97.1751 35.1088) rotate(90) scale(3.72244 3.72245)">
        <stop stop-color="#CADEFF"/>
        <stop offset="1" stop-color="#3B82F6"/>
        </radialGradient>
        <radialGradient id="paint3_radial_1_7998" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(20.2463 15.2554) rotate(90) scale(3.72244 3.72245)">
        <stop stop-color="#CADEFF"/>
        <stop offset="1" stop-color="#3B82F6"/>
        </radialGradient>
        <radialGradient id="paint4_radial_1_7998" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(16.5223 61.1652) rotate(90) scale(4.96325 4.96327)">
        <stop stop-color="#CADEFF"/>
        <stop offset="1" stop-color="#3B82F6"/>
        </radialGradient>
        <radialGradient id="paint5_radial_1_7998" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(38.8589 81.0184) rotate(90) scale(2.48163 2.48163)">
        <stop stop-color="#CADEFF"/>
        <stop offset="1" stop-color="#3B82F6"/>
        </radialGradient>
        <radialGradient id="paint6_radial_1_7998" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(38.8589 58.6833) rotate(90) scale(2.48163 2.48163)">
        <stop stop-color="#CADEFF"/>
        <stop offset="1" stop-color="#3B82F6"/>
        </radialGradient>
        </defs>
        </svg>
    </span>

    <div class="w-full max-w-screen-xl container mx-auto">

        <x-navigation class="border-b border-blue-700/20 sticky top-0" />

        <div >
            <div
                class="relative min-h-screen flex flex-col items-center justify-center selection:bg-blue-500 selection:text-white">
                <div class="relative w-full  px-6 lg:max-w-7xl">

                    <main class="mt-3">
                      <div class="relative overflow-hidden  pt-[40px]  ">
                        <div class="lg:container mx-auto">
                              <div class="flex flex-wrap items-center">

                                  {{-- Hero info  --}}
                                    <div class=" mx-auto max-w-5xl text-center"
                                        style="visibility: visible; animation-delay: 0.2s;">
                                        <h1 class="mb-6 text-3xl  sm:text-6xl  max-w-xl mx-auto  py-2 font-bold font-manrope font-black leading-snug text-transparent bg-clip-text  bg-gradient-to-r from-blue-500 dark:from-blue-600  via-stone-40  dark:via-stone-1000 to-zinc-500 dark:to-zinc-200  ">
                                            A Scalable Livewire
                                            Chat
                                            Package
                                        </h1>

                                        <p
                                            class="mx-auto mb-9 max-w-[600px] text-sm  font-normal text-gray-800 dark:text-white sm:text-lg sm:leading-[1.44]">
                                            Building a chat system can be a time-consuming process. With Wirechat, you can easily add real-time messaging to your Laravel app in minutes.
                                        </p>

                                        {{--  CTAs --}}
                                        <div class="  my-6 justify-center items-center gap-9 flex w-full sm:max-w-full  px-3 flex-col sm:flex-row mx-auto">

                                            <x-button tag="a"  class=" w-full sm:w-auto px-4 dark:bg-zinc-800 " href="{{ route('docs') }}">
                                                Documentation
                                            </x-button>
                                          


                                            <a href="https://github.com/namumakwembo/wirechat" class="border border-gray-600 flex hover:scale-105 w-full sm:w-auto justify-center transition-all items-center gap-3 px-3 p-2.5 -mb-1.5 rounded-lg dark:border-gray-700" target="_blank">
                                                Star on Github
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 sm:size-6 ">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                                                  </svg>
                                                  
                                            </a>

                                        </div>

                                    
                                    </div>

                                    {{-- Image previews --}}
                                    <x-card shadow="lg" class="max-w-5xl w-full dark:ring    ring-gray-300/30  mt-10  dark:ring-gray-700/40 mx-auto z-10 rounded-xl overflow-hidden ">

                                      <img class="w-full h-full hidden dark:flex  " src="{{asset('/assets/preview-dark-2.png')}}" alt="preview">
                                      <img class="w-full h-full dark:hidden  " src="{{asset('/assets/preview-light.png')}}" alt="preview">

                                    </x-card>

                                    {{-- dots svg --}}
                                <div class="w-full px-4">
                                        <div class="  mt-32 text-blue-700 relative z-10 mx-auto max-w-[845px]" >
                            
                                      <div class="absolute -left-9 bottom-0 z-[-1]   ">
                                        <svg width="134" height="106" viewBox="0 0 134 106" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
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

                <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                    © Copyright {{ date('Y') }}. All Rights Reserved.
                </footer>

            </div>
        </div>
    </div>
    </div>

</x-app-layout>
