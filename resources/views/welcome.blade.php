<x-app-layout>

    {{-- Boxed line --}}
    <svg
        class="pointer-events-none z-10 absolute -inset-px h-full w-full stroke-black/20 dark:stroke-white/10 stroke-[4] [mask-image:radial-gradient(white,transparent_70%)] [stroke-dasharray:5_6] [stroke-dashoffset:10]">
        <defs>
            <pattern id="grid-pattern-215" viewBox="0 0 64 64" width="64" height="64" patternUnits="userSpaceOnUse"
                x="0" y="0">
                <path d="M64 0H0V64" fill="none"></path>
            </pattern>
        </defs>
        <rect width="100%" height="100%" stroke-width="0" fill="url(#grid-pattern-215)"></rect>
    </svg>
    {{-- light gradien --}}
    <span class="absolute opacity-60 dark:opacity-100 z-1 -top-52 inset-x-0">

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
    <span class="absolute z-1 top-52 left-24 ">
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

    <div class="w-full max-w-screen-2xl mx-auto">

        <x-navigation class="border-b border-blue-700/20" />

        <div class="bg-white dark:bg-gray-900">
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
                                        <h1 class="mb-6  text-5xl md:text-6xl lg:text-7xl   py-2 l font-bold font-manrope font-black leading-snug text-transparent bg-clip-text  bg-gradient-to-r from-blue-500 dark:from-blue-600  via-stone-40  dark:via-stone-1000 to-zinc-500 dark:to-zinc-200  ">
                                            Livewire-Powered, Scalable
                                            Chat
                                            Package
                                            for Laravel
                                        </h1>


                                        <p
                                            class="mx-auto mb-9 max-w-[600px] text-sm  font-normal text-gray-800 dark:text-white sm:text-lg sm:leading-[1.44]">
                                            Skip the hassle of building chat from scratch—install Wirechat package and
                                            add
                                            real-time chat to your Laravel app in minutes.
                                        </p>

                                        {{--  CTAs --}}
                                        <div class="  my-6 justify-center items-center gap-9 flex  px-3 flex-col sm:flex-row mx-auto">
                                            <a href="{{ route('docs') }}"class="w-full sm:w-[142px]  h-12 ring flex relative bg-gradient-to-r from-[#4a75f4] to-[#3fb3ed] rounded-lg">

                                                <div class="w-full h-12 top-[16px] absolute opacity-60 bg-[#487bf3] rounded-[100px] blur-2xl">
                                                </div>
                                                 
                                                <div class="justify-center text-white text-base font-semibold  font-['Manrope'] leading-normal items-center m-auto inline-flex">
                                                  Documentation
                                                </div>
                                            </a>

                                            <a href="https://github.com/namumakwembo/wirechat" target="_blank"
                                                class=" h-12 px-4  shrink-0  w-full sm:w-auto   py-3 bg-gradient-to-b from-white to-white rounded-lg shadow border justify-center items-center flex">
                                                    <div class="flex w-full justify-center gap-2 text-center text-[#0a0e18] text-base font-semibold font-['Manrope'] leading-normal">
                                                        <svg class="fill-current" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <g clip-path="url(#clip0_2005_10818)">
                                                                <path
                                                                    d="M12 0.674805C5.625 0.674805 0.375 5.8498 0.375 12.2998C0.375 17.3998 3.7125 21.7498 8.3625 23.3248C8.9625 23.4373 9.15 23.0623 9.15 22.7998C9.15 22.5373 9.15 21.7873 9.1125 20.7748C5.8875 21.5248 5.2125 19.1998 5.2125 19.1998C4.6875 17.8873 3.9 17.5123 3.9 17.5123C2.85 16.7623 3.9375 16.7623 3.9375 16.7623C5.1 16.7998 5.7375 17.9623 5.7375 17.9623C6.75 19.7623 8.475 19.2373 9.1125 18.8998C9.225 18.1498 9.525 17.6248 9.8625 17.3248C7.3125 17.0623 4.575 16.0498 4.575 11.6248C4.575 10.3498 5.0625 9.3373 5.775 8.5498C5.6625 8.2873 5.25 7.0873 5.8875 5.4748C5.8875 5.4748 6.9 5.1748 9.1125 6.6748C10.05 6.4123 11.025 6.2623 12.0375 6.2623C13.05 6.2623 14.0625 6.3748 14.9625 6.6748C17.175 5.2123 18.15 5.4748 18.15 5.4748C18.7875 7.0498 18.4125 8.2873 18.2625 8.5498C19.0125 9.3373 19.4625 10.3873 19.4625 11.6248C19.4625 16.0498 16.725 17.0623 14.175 17.3248C14.5875 17.6998 14.9625 18.4498 14.9625 19.4998C14.9625 21.0748 14.925 22.3123 14.925 22.6873C14.925 22.9873 15.15 23.3248 15.7125 23.2123C20.2875 21.6748 23.625 17.3623 23.625 12.2248C23.5875 5.8498 18.375 0.674805 12 0.674805Z">
                                                                </path>
                                                            </g>
                                                            <defs>
                                                                <clipPath id="clip0_2005_10818">
                                                                    <rect width="24" height="24"></rect>
                                                                </clipPath>
                                                            </defs>
                                                        </svg>
                                                        Star on Github
                                                    </div>
                                            </a>
                                        </div>

                                    
                                    </div>

                                    {{-- Image previews --}}
                                    <div class="max-w-4xl w-full  ring ring-gray-300/30    dark:ring-gray-700/40 mx-auto z-10 rounded-xl overflow-hidden ">

                                      <img class="w-full h-full hidden dark:flex  " src="{{asset('/assets/preview-dark-2.png')}}" alt="preview">
                                      <img class="w-full h-full dark:hidden  " src="{{asset('/assets/preview-light.png')}}" alt="preview">

                                    </div>

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
