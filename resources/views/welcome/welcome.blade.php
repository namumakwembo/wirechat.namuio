<x-app-layout class="pb-20">
    <div x-data="{ scrolled: false }" x-init="window.addEventListener('scroll', () => {
        scrolled = window.scrollY > 10;
    });"
        :class="{ 'bg-white  dark:bg-zinc-900 border-b dark:border-gray-700 transition-all duration-200 ': scrolled }"
        class=" sticky top-0 z-500 ">

        <x-navigation class="  w-full max-w-(--breakpoint-xl)   sm:px-14  container mx-auto  " />

    </div>


    {{-- Boxed line --}}
    <svg
        class="pointer-events-none z-10 absolute hidden -inset-px h-full w-full stroke-black/20 dark:stroke-white/10 stroke-4 [mask-image:radial-gradient(white,transparent_70%)] [stroke-dasharray:5_6] [stroke-dashoffset:10]">
        <defs>
            <pattern id="grid-pattern-215" viewBox="0 0 64 64" width="64" height="64" patternUnits="userSpaceOnUse"
                x="0" y="0">
                <path d="M64 0H0V64" fill="none"></path>
            </pattern>
        </defs>
        <rect width="100%" height="100%" stroke-width="0" fill="url(#grid-pattern-215)"></rect>
    </svg>

    {{-- light gradient --}}
    <span class="absolute opacity-60 dark:opacity-100 -z-1 -top-52 inset-x-0  hidden">

        <svg class="w-full" height="1140" viewBox="0 0 1512 1140" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                <ellipse cx="68.6417" cy="81.0184" rx="2.48163" ry="2.48163"
                    fill="url(#paint0_radial_1_7998)" />
            </g>
            <g filter="url(#filter1_d_1_7998)">
                <ellipse cx="76.0863" cy="66.1283" rx="2.48163" ry="2.48163"
                    fill="url(#paint1_radial_1_7998)" />
            </g>
            <g filter="url(#filter2_d_1_7998)">
                <ellipse cx="97.1751" cy="35.1088" rx="3.72245" ry="3.72244"
                    fill="url(#paint2_radial_1_7998)" />
            </g>
            <g filter="url(#filter3_d_1_7998)">
                <ellipse cx="20.2463" cy="15.2554" rx="3.72245" ry="3.72244"
                    fill="url(#paint3_radial_1_7998)" />
            </g>
            <g filter="url(#filter4_d_1_7998)">
                <ellipse cx="16.5223" cy="61.1652" rx="4.96327" ry="4.96325"
                    fill="url(#paint4_radial_1_7998)" />
            </g>
            <g filter="url(#filter5_d_1_7998)">
                <ellipse cx="38.8589" cy="81.0184" rx="2.48163" ry="2.48163"
                    fill="url(#paint5_radial_1_7998)" />
            </g>
            <g filter="url(#filter6_d_1_7998)">
                <ellipse cx="38.8589" cy="58.6833" rx="2.48163" ry="2.48163"
                    fill="url(#paint6_radial_1_7998)" />
            </g>
            <defs>
                <filter id="filter0_d_1_7998" x="55.4874" y="67.8641" width="26.3086" height="26.3086"
                    filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix" />
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                        result="hardAlpha" />
                    <feOffset />
                    <feGaussianBlur stdDeviation="5.33633" />
                    <feComposite in2="hardAlpha" operator="out" />
                    <feColorMatrix type="matrix" values="0 0 0 0 1 0 0 0 0 1 0 0 0 0 1 0 0 0 0.38 0" />
                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1_7998" />
                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1_7998" result="shape" />
                </filter>
                <filter id="filter1_d_1_7998" x="62.932" y="52.974" width="26.3086" height="26.3086"
                    filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix" />
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                        result="hardAlpha" />
                    <feOffset />
                    <feGaussianBlur stdDeviation="5.33633" />
                    <feComposite in2="hardAlpha" operator="out" />
                    <feColorMatrix type="matrix" values="0 0 0 0 1 0 0 0 0 1 0 0 0 0 1 0 0 0 0.38 0" />
                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1_7998" />
                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1_7998" result="shape" />
                </filter>
                <filter id="filter2_d_1_7998" x="82.78" y="20.7137" width="28.7902" height="28.7902"
                    filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix" />
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                        result="hardAlpha" />
                    <feOffset />
                    <feGaussianBlur stdDeviation="5.33633" />
                    <feComposite in2="hardAlpha" operator="out" />
                    <feColorMatrix type="matrix" values="0 0 0 0 1 0 0 0 0 1 0 0 0 0 1 0 0 0 0.38 0" />
                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1_7998" />
                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1_7998" result="shape" />
                </filter>
                <filter id="filter3_d_1_7998" x="5.85114" y="0.86027" width="28.7902" height="28.7902"
                    filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix" />
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                        result="hardAlpha" />
                    <feOffset />
                    <feGaussianBlur stdDeviation="5.33633" />
                    <feComposite in2="hardAlpha" operator="out" />
                    <feColorMatrix type="matrix" values="0 0 0 0 1 0 0 0 0 1 0 0 0 0 1 0 0 0 0.38 0" />
                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1_7998" />
                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1_7998" result="shape" />
                </filter>
                <filter id="filter4_d_1_7998" x="0.886423" y="45.5293" width="31.2718" height="31.2718"
                    filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix" />
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                        result="hardAlpha" />
                    <feOffset />
                    <feGaussianBlur stdDeviation="5.33633" />
                    <feComposite in2="hardAlpha" operator="out" />
                    <feColorMatrix type="matrix" values="0 0 0 0 1 0 0 0 0 1 0 0 0 0 1 0 0 0 0.38 0" />
                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1_7998" />
                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1_7998" result="shape" />
                </filter>
                <filter id="filter5_d_1_7998" x="25.7046" y="67.8641" width="26.3086" height="26.3086"
                    filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix" />
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                        result="hardAlpha" />
                    <feOffset />
                    <feGaussianBlur stdDeviation="5.33633" />
                    <feComposite in2="hardAlpha" operator="out" />
                    <feColorMatrix type="matrix" values="0 0 0 0 1 0 0 0 0 1 0 0 0 0 1 0 0 0 0.38 0" />
                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1_7998" />
                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1_7998" result="shape" />
                </filter>
                <filter id="filter6_d_1_7998" x="25.7046" y="45.529" width="26.3086" height="26.3086"
                    filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix" />
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                        result="hardAlpha" />
                    <feOffset />
                    <feGaussianBlur stdDeviation="5.33633" />
                    <feComposite in2="hardAlpha" operator="out" />
                    <feColorMatrix type="matrix" values="0 0 0 0 1 0 0 0 0 1 0 0 0 0 1 0 0 0 0.38 0" />
                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1_7998" />
                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1_7998" result="shape" />
                </filter>
                <radialGradient id="paint0_radial_1_7998" cx="0" cy="0" r="1"
                    gradientUnits="userSpaceOnUse"
                    gradientTransform="translate(68.6417 81.0184) rotate(90) scale(2.48163 2.48163)">
                    <stop stop-color="#CADEFF" />
                    <stop offset="1" stop-color="#3B82F6" />
                </radialGradient>
                <radialGradient id="paint1_radial_1_7998" cx="0" cy="0" r="1"
                    gradientUnits="userSpaceOnUse"
                    gradientTransform="translate(76.0862 66.1283) rotate(90) scale(2.48163 2.48163)">
                    <stop stop-color="#CADEFF" />
                    <stop offset="1" stop-color="#3B82F6" />
                </radialGradient>
                <radialGradient id="paint2_radial_1_7998" cx="0" cy="0" r="1"
                    gradientUnits="userSpaceOnUse"
                    gradientTransform="translate(97.1751 35.1088) rotate(90) scale(3.72244 3.72245)">
                    <stop stop-color="#CADEFF" />
                    <stop offset="1" stop-color="#3B82F6" />
                </radialGradient>
                <radialGradient id="paint3_radial_1_7998" cx="0" cy="0" r="1"
                    gradientUnits="userSpaceOnUse"
                    gradientTransform="translate(20.2463 15.2554) rotate(90) scale(3.72244 3.72245)">
                    <stop stop-color="#CADEFF" />
                    <stop offset="1" stop-color="#3B82F6" />
                </radialGradient>
                <radialGradient id="paint4_radial_1_7998" cx="0" cy="0" r="1"
                    gradientUnits="userSpaceOnUse"
                    gradientTransform="translate(16.5223 61.1652) rotate(90) scale(4.96325 4.96327)">
                    <stop stop-color="#CADEFF" />
                    <stop offset="1" stop-color="#3B82F6" />
                </radialGradient>
                <radialGradient id="paint5_radial_1_7998" cx="0" cy="0" r="1"
                    gradientUnits="userSpaceOnUse"
                    gradientTransform="translate(38.8589 81.0184) rotate(90) scale(2.48163 2.48163)">
                    <stop stop-color="#CADEFF" />
                    <stop offset="1" stop-color="#3B82F6" />
                </radialGradient>
                <radialGradient id="paint6_radial_1_7998" cx="0" cy="0" r="1"
                    gradientUnits="userSpaceOnUse"
                    gradientTransform="translate(38.8589 58.6833) rotate(90) scale(2.48163 2.48163)">
                    <stop stop-color="#CADEFF" />
                    <stop offset="1" stop-color="#3B82F6" />
                </radialGradient>
            </defs>
        </svg>
    </span>


    {{-- Wave --}}
    <span class="absolute opacity-5 hidden inset-0 h-full w-full">

        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
            xmlns:svgjs="http://svgjs.dev/svgjs" viewBox="0 0 1422 800">
            <defs>
                <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="oooscillate-grad">
                    <stop stop-color="hsl(206, 24%, 66%)" stop-opacity="1" offset="0%"></stop>
                    <stop stop-color="hsl(272, 29%, 24%)" stop-opacity="1" offset="100%"></stop>
                </linearGradient>
            </defs>
            <g stroke-width="2" stroke="url(#oooscillate-grad)" fill="none" stroke-linecap="round">
                <path d="M 0 1419 Q 355.5 100 711 400 Q 1066.5 700 1422 1419" opacity="0.05"></path>
                <path d="M 0 1386 Q 355.5 100 711 400 Q 1066.5 700 1422 1386" opacity="0.07"></path>
                <path d="M 0 1353 Q 355.5 100 711 400 Q 1066.5 700 1422 1353" opacity="0.10"></path>
                <path d="M 0 1320 Q 355.5 100 711 400 Q 1066.5 700 1422 1320" opacity="0.12"></path>
                <path d="M 0 1287 Q 355.5 100 711 400 Q 1066.5 700 1422 1287" opacity="0.14"></path>
                <path d="M 0 1254 Q 355.5 100 711 400 Q 1066.5 700 1422 1254" opacity="0.16"></path>
                <path d="M 0 1221 Q 355.5 100 711 400 Q 1066.5 700 1422 1221" opacity="0.19"></path>
                <path d="M 0 1188 Q 355.5 100 711 400 Q 1066.5 700 1422 1188" opacity="0.21"></path>
                <path d="M 0 1155 Q 355.5 100 711 400 Q 1066.5 700 1422 1155" opacity="0.23"></path>
                <path d="M 0 1122 Q 355.5 100 711 400 Q 1066.5 700 1422 1122" opacity="0.25"></path>
                <path d="M 0 1089 Q 355.5 100 711 400 Q 1066.5 700 1422 1089" opacity="0.28"></path>
                <path d="M 0 1056 Q 355.5 100 711 400 Q 1066.5 700 1422 1056" opacity="0.30"></path>
                <path d="M 0 1023 Q 355.5 100 711 400 Q 1066.5 700 1422 1023" opacity="0.32"></path>
                <path d="M 0 990 Q 355.5 100 711 400 Q 1066.5 700 1422 990" opacity="0.34"></path>
                <path d="M 0 957 Q 355.5 100 711 400 Q 1066.5 700 1422 957" opacity="0.37"></path>
                <path d="M 0 924 Q 355.5 100 711 400 Q 1066.5 700 1422 924" opacity="0.39"></path>
                <path d="M 0 891 Q 355.5 100 711 400 Q 1066.5 700 1422 891" opacity="0.41"></path>
                <path d="M 0 858 Q 355.5 100 711 400 Q 1066.5 700 1422 858" opacity="0.43"></path>
                <path d="M 0 825 Q 355.5 100 711 400 Q 1066.5 700 1422 825" opacity="0.46"></path>
                <path d="M 0 792 Q 355.5 100 711 400 Q 1066.5 700 1422 792" opacity="0.48"></path>
                <path d="M 0 759 Q 355.5 100 711 400 Q 1066.5 700 1422 759" opacity="0.50"></path>
                <path d="M 0 726 Q 355.5 100 711 400 Q 1066.5 700 1422 726" opacity="0.53"></path>
                <path d="M 0 693 Q 355.5 100 711 400 Q 1066.5 700 1422 693" opacity="0.55"></path>
                <path d="M 0 660 Q 355.5 100 711 400 Q 1066.5 700 1422 660" opacity="0.57"></path>
                <path d="M 0 627 Q 355.5 100 711 400 Q 1066.5 700 1422 627" opacity="0.59"></path>
                <path d="M 0 594 Q 355.5 100 711 400 Q 1066.5 700 1422 594" opacity="0.62"></path>
                <path d="M 0 561 Q 355.5 100 711 400 Q 1066.5 700 1422 561" opacity="0.64"></path>
                <path d="M 0 528 Q 355.5 100 711 400 Q 1066.5 700 1422 528" opacity="0.66"></path>
                <path d="M 0 495 Q 355.5 100 711 400 Q 1066.5 700 1422 495" opacity="0.68"></path>
                <path d="M 0 462 Q 355.5 100 711 400 Q 1066.5 700 1422 462" opacity="0.71"></path>
                <path d="M 0 429 Q 355.5 100 711 400 Q 1066.5 700 1422 429" opacity="0.73"></path>
                <path d="M 0 396 Q 355.5 100 711 400 Q 1066.5 700 1422 396" opacity="0.75"></path>
                <path d="M 0 363 Q 355.5 100 711 400 Q 1066.5 700 1422 363" opacity="0.77"></path>
                <path d="M 0 330 Q 355.5 100 711 400 Q 1066.5 700 1422 330" opacity="0.80"></path>
                <path d="M 0 297 Q 355.5 100 711 400 Q 1066.5 700 1422 297" opacity="0.82"></path>
                <path d="M 0 264 Q 355.5 100 711 400 Q 1066.5 700 1422 264" opacity="0.84"></path>
                <path d="M 0 231 Q 355.5 100 711 400 Q 1066.5 700 1422 231" opacity="0.86"></path>
                <path d="M 0 198 Q 355.5 100 711 400 Q 1066.5 700 1422 198" opacity="0.89"></path>
                <path d="M 0 165 Q 355.5 100 711 400 Q 1066.5 700 1422 165" opacity="0.91"></path>
                <path d="M 0 132 Q 355.5 100 711 400 Q 1066.5 700 1422 132" opacity="0.93"></path>
                <path d="M 0 99 Q 355.5 100 711 400 Q 1066.5 700 1422 99" opacity="0.95"></path>
                <path d="M 0 66 Q 355.5 100 711 400 Q 1066.5 700 1422 66" opacity="0.98"></path>
            </g>
        </svg>
    </span>

    <span class="absolute opacity-10  inset-0 h-full w-full">
        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
            xmlns:svgjs="http://svgjs.dev/svgjs" viewBox="0 0 800 800" opacity="0.76">
            <defs>
                <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="ggglitch-grad">
                    <stop stop-color="hsla(184, 12%, 67%, 1.00)" stop-opacity="1" offset="45%"></stop>
                    <stop stop-color="hsla(242, 8%, 62%, 1.00)" stop-opacity="1" offset="100%"></stop>
                </linearGradient>
                <clipPath id="SvgjsClipPath1024">
                    <rect width="66.66666666666667" height="800" x="0" y="0"></rect>
                    <rect width="66.66666666666667" height="800" x="133.33333333333334" y="0"></rect>
                    <rect width="66.66666666666667" height="800" x="266.6666666666667" y="0"></rect>
                    <rect width="66.66666666666667" height="800" x="400" y="0"></rect>
                    <rect width="66.66666666666667" height="800" x="533.3333333333334" y="0"></rect>
                    <rect width="66.66666666666667" height="800" x="666.6666666666667" y="0"></rect>
                    <rect width="66.66666666666667" height="800" x="800" y="0"></rect>
                    <rect width="66.66666666666667" height="800" x="933.3333333333334" y="0"></rect>
                    <rect width="66.66666666666667" height="800" x="1066.6666666666667" y="0"></rect>
                    <rect width="66.66666666666667" height="800" x="1200" y="0"></rect>
                    <rect width="66.66666666666667" height="800" x="1333.3333333333335" y="0"></rect>
                    <rect width="66.66666666666667" height="800" x="1466.6666666666667" y="0"></rect>
                    <rect width="66.66666666666667" height="800" x="1600" y="0"></rect>
                </clipPath>
                <clipPath id="SvgjsClipPath1025">
                    <rect width="66.66666666666667" height="800" x="66.66666666666667" y="0"></rect>
                    <rect width="66.66666666666667" height="800" x="200" y="0"></rect>
                    <rect width="66.66666666666667" height="800" x="333.3333333333333" y="0"></rect>
                    <rect width="66.66666666666667" height="800" x="466.6666666666667" y="0"></rect>
                    <rect width="66.66666666666667" height="800" x="600.0000000000001" y="0"></rect>
                    <rect width="66.66666666666667" height="800" x="733.3333333333334" y="0"></rect>
                    <rect width="66.66666666666667" height="800" x="866.6666666666667" y="0"></rect>
                    <rect width="66.66666666666667" height="800" x="1000.0000000000001" y="0"></rect>
                    <rect width="66.66666666666667" height="800" x="1133.3333333333333" y="0"></rect>
                    <rect width="66.66666666666667" height="800" x="1266.6666666666667" y="0"></rect>
                    <rect width="66.66666666666667" height="800" x="1400" y="0"></rect>
                    <rect width="66.66666666666667" height="800" x="1533.3333333333333" y="0"></rect>
                </clipPath>
            </defs>
            <g stroke-width="44" stroke="url(#ggglitch-grad)" fill="none">
                <polygon points="-22,22 22,-22 822,778 778,822" stroke="none" fill="url(#ggglitch-grad)"
                    clip-path="url(&quot;#SvgjsClipPath1024&quot;)" opacity="0.25" transform="translate(0 -669)">
                </polygon>
                <polygon points="-22,22 22,-22 822,778 778,822" stroke="none" fill="url(#ggglitch-grad)"
                    clip-path="url(&quot;#SvgjsClipPath1025&quot;)" transform="translate(0 -694)"></polygon>
                <polygon points="-22,22 22,-22 822,778 778,822" stroke="none" fill="url(#ggglitch-grad)"
                    clip-path="url(&quot;#SvgjsClipPath1024&quot;)" opacity="0.25" transform="translate(0 -549)">
                </polygon>
                <polygon points="-22,22 22,-22 822,778 778,822" stroke="none" fill="url(#ggglitch-grad)"
                    clip-path="url(&quot;#SvgjsClipPath1025&quot;)" transform="translate(0 -574)"></polygon>
                <polygon points="-22,22 22,-22 822,778 778,822" stroke="none" fill="url(#ggglitch-grad)"
                    clip-path="url(&quot;#SvgjsClipPath1024&quot;)" opacity="0.25" transform="translate(0 -429)">
                </polygon>
                <polygon points="-22,22 22,-22 822,778 778,822" stroke="none" fill="url(#ggglitch-grad)"
                    clip-path="url(&quot;#SvgjsClipPath1025&quot;)" transform="translate(0 -454)"></polygon>
                <polygon points="-22,22 22,-22 822,778 778,822" stroke="none" fill="url(#ggglitch-grad)"
                    clip-path="url(&quot;#SvgjsClipPath1024&quot;)" opacity="0.25" transform="translate(0 -309)">
                </polygon>
                <polygon points="-22,22 22,-22 822,778 778,822" stroke="none" fill="url(#ggglitch-grad)"
                    clip-path="url(&quot;#SvgjsClipPath1025&quot;)" transform="translate(0 -334)"></polygon>
                <polygon points="-22,22 22,-22 822,778 778,822" stroke="none" fill="url(#ggglitch-grad)"
                    clip-path="url(&quot;#SvgjsClipPath1024&quot;)" opacity="0.25" transform="translate(0 -189)">
                </polygon>
                <polygon points="-22,22 22,-22 822,778 778,822" stroke="none" fill="url(#ggglitch-grad)"
                    clip-path="url(&quot;#SvgjsClipPath1025&quot;)" transform="translate(0 -214)"></polygon>
            </g>
        </svg>
    </span>



    <main class="w-full max-w-(--breakpoint-xl)  sm:px-14 flex flex-col gap-14 p-8 container mx-auto relative z-10">

        {{-- hero --}}
        @include('welcome.partials.hero')


        {{-- Components --}}
        @include('welcome.partials.components')


        <center class="my-7">

            <x-button tag="a" class=" w-full sm:w-auto px-4 dark:bg-zinc-800 " href="{{ route('installation') }}">
                Get Started
            </x-button>
        </center>


        @include('welcome.partials.theme')



        <footer class="py-16 text-center text-sm text-black dark:text-white/70">
            © Copyright {{ date('Y') }}. All Rights Reserved.
        </footer>

    </main>

</x-app-layout>
